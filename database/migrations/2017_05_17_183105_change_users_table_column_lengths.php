<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUsersTableColumnLengths extends Migration
{
    /**
    mysql> describe users;
    +-------------------+------------------+------+-----+---------+----------------+
    | Field             | Type             | Null | Key | Default | Extra          |
    +-------------------+------------------+------+-----+---------+----------------+
    | id                | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
    | role_id           | int(11)          | YES  |     | NULL    |                |
    | name              | longtext         | YES  |     | NULL    |                |
    | email             | varchar(220)     | YES  | UNI | NULL    |                |
    | avatar            | longtext         | YES  |     | NULL    |                |
    | password          | longtext         | YES  |     | NULL    |                |
    | stripe_id         | longtext         | YES  |     | NULL    |                |
    | card_brand        | longtext         | YES  |     | NULL    |                |
    | card_last_four    | longtext         | YES  |     | NULL    |                |
    | trial_ends_at     | timestamp        | YES  |     | NULL    |                |
    | last_logged_in_at | varchar(220)     | YES  |     | NULL    |                |
    | remember_token    | varchar(220)     | YES  |     | NULL    |                |
    | created_at        | timestamp        | YES  |     | NULL    |                |
    | updated_at        | timestamp        | YES  |     | NULL    |                |
    | is_admin          | int(10) unsigned | NO   |     | 0       |                |
    | banned_at         | timestamp        | YES  |     | NULL    |                |
    +-------------------+------------------+------+-----+---------+----------------+
    16 rows in set (0.04 sec)
     */

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('name')->nullable()->change();
            $table->longText('avatar')->nullable()->change();
            $table->longText('password')->nullable()->change();
            $table->longText('stripe_id')->nullable()->change();
            $table->longText('card_brand')->nullable()->change();
            $table->longText('card_last_four')->nullable()->change();
            $table->text('last_logged_in_at', 220)->nullable()->change();
            $table->text('remember_token', 220)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        return null;
    }
}
