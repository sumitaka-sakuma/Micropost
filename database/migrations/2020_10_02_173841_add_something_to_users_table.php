<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSomethingToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->date('birthday')->nullable()->after('name');
            $table->boolean('gender')->nullable()->after('birthday');
            $table->longText('self_introduction')->nullable()->after('gender');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->dropColumn('birthday');
            $table->dropColumn('gender');
            $table->dropColumn('self_introduction');

        });
    }
}
