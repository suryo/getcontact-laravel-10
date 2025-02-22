<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // id int primary key auto increment
            $table->string('phone'); // phone varchar
            $table->string('label'); // label varchar
            $table->string('emails'); // emails varchar
            $table->string('display_name'); // display_name varchar
            $table->string('given_name'); // given_name varchar
            $table->string('middle_name')->nullable(); // middle_name varchar (nullable)
            $table->string('family_name'); // family_name varchar
            $table->string('organization')->nullable(); // organization varchar (nullable)
            $table->string('status'); // status varchar
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
