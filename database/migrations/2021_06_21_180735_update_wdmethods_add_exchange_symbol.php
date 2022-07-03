<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateWdmethodsAddExchangeSymbol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('wdmethods', function (Blueprint $table) {
            $table->string('exchange_symbol')->nullable()->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wdmethods', function (Blueprint $table) {
            $table->dropColumn('exchange_symbol');
        });
    }
}
