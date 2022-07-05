<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Setting;
use App\Mail\NewNotification;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use stdClass;

use Carbon\Carbon;


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

        $user = User::create([
            'name' => $input['first_name'] . ' ' . $input['last_name'],
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
            'password' => Hash::make($input['password']),
        ]);

        // send verification email
        $this->notifyUser($user);

        return $user;
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
}
