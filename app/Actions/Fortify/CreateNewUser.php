<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Country;
use App\Models\Setting;
use App\Mail\NewNotification;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use stdClass;

use Carbon\Carbon;

use App\Libraries\MobiusTrader;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;


    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            // 'name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'phone' => ['required', 'string',],
            'account_type' => ['required', 'string',],
            'address' => ['required', 'string',],
            'town' => ['required', 'string',],
            'state' => ['required', 'string',],
            'zip_code' => ['required', 'string',],
            'country' => ['required', 'string',],
            // 'g-recaptcha-response' => 'required|captcha',
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        $data = [
            'name' => $input['first_name'],
            'lastName' => $input['last_name'],
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'account_type' => $input['account_type'],
            'address' => $input['address'],
            'town' => $input['town'],
            'state' => $input['state'],
            'zip_code' => $input['zip_code'],
            'country_id' => $input['country'],
            'status' => 'active',
            'password' => $input['password'],
        ];

        $mobiusResp = $this->createTrader($data);

        if($mobiusResp['status'] === MobiusTrader::STATUS_OK) {
            // hash the password before creating the user
            $data['password'] = Hash::make($data['password']);
            $data['account_number'] = $mobiusResp['data']['Id'];
            $user = User::create($data);

            // send verification email
            $this->notifyUser($user);

            return $user;
        } else{
            throw ValidationException::withMessages([$mobiusResp['data']]);
        }
    }


    protected function notifyUser($user)
    {
        $site_name = Setting::getValue('site_name');
        $objDemo = new stdClass();
        $hash = sha1($user->email);
        $link = route('verification.verify', [
            'id' =>  $user->id,
            'hash' => $hash,
        ]);
        $objDemo->message = "\r Hi $user->name, \r\n
        \r\n This is to inform you that you have successfully registered on $site_name. \r\n ";
        $objDemo->sender = "$site_name";
        $objDemo->date = Carbon::Now();
        $objDemo->subject = "Welcome To Sky Gold Markets, Get more freedom in the markets.";
        $mail = new NewNotification($objDemo);
        $mail->subject = "Welcome To Sky Gold Markets, Get more freedom in the markets.";
        Mail::mailer('smtp')->bcc($user->email)->send($mail);
    }


    protected function createTrader($data)
    {
        $country = Country::find($data['country_id']);
        $m7 = new MobiusTrader(config('mobius'));

        // create the account
        $resp = $m7->create_account(
            $data['email'],
            $data['name'],
            null,
            $country->name,
            $data['town'],
            $data['address'],
            $data['phone'],
            $data['zip_code'],
            $data['state'],
            'SKG-Creation'
        );

        // set password
        if($resp['status'] == MobiusTrader::STATUS_OK) {
            $account = $resp['data'];
            $login = $account['Email'];
            $account_id = $account['Id'];
            $password = $data['password'];

            // set the password
            $respPassSet = $m7->password_set($account_id, $login, $password);
            if($respPassSet['status'] == MobiusTrader::STATUS_OK)
                return $resp;
            else
                return $respPassSet;
        }

        return $resp;
    }
}