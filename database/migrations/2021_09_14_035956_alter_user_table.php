<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 100)->after('name')->unique();
            $table->string('phone_number')->after('email')->nullable();
            $table->date('birthday')->after('phone_number')->nullable();
            $table->string('avatar')->after('birthday')->nullable();
            $table->string('address')->after('avatar')->nullable();
            $table->text('about_me')->after('address')->nullable();
            $table->softDeletes();
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
            $table->dropColumn('username');
            $table->dropColumn('phone_number');
            $table->dropColumn('birthday');
            $table->dropColumn('avatar');
            $table->dropColumn('address');
            $table->dropColumn('about_me');
            $table->dropSoftDeletes();
        });
    }
}
