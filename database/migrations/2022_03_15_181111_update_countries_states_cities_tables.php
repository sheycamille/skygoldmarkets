<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCountriesStatesCitiesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->longText('full_name')->nullable();
            $table->longText('capital')->nullable();
            $table->longText('code')->nullable();
            $table->longText('code_alpha3')->nullable();
            $table->longText('code_numeric')->nullable();
            $table->longText('emoji')->nullable();
            $table->longText('currency_code')->nullable();
            $table->longText('currency_name')->nullable();
            $table->longText('callingcode')->nullable();
            $table->longText('tld')->nullable();
        });

        Schema::table('states', function (Blueprint $table) {
            $table->longText('full_name')->nullable();
            $table->longText('code')->nullable();
        });

        Schema::table('cities', function (Blueprint $table) {
            $table->longText('full_name')->nullable();
            $table->longText('code')->nullable();
            $table->longText('iana_timezone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('code');
            $table->dropColumn('iana_timezone');
        });

        Schema::table('states', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('code');
        });

        Schema::table('countries', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('capital');
            $table->dropColumn('code');
            $table->dropColumn('code_alpha3');
            $table->dropColumn('code_numeric');
            $table->dropColumn('emoji');
            $table->dropColumn('currency_code');
            $table->dropColumn('currency_name');
            $table->dropColumn('callingcode');
            $table->dropColumn('tld');
        });
    }
}
