<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('login_users', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->string('password');  // Password column
            $table->unsignedBigInteger('role_id');  // Foreign key to login_roles table
            $table->string('usertype');  // Usertype column
            $table->timestamps();  // Created at and Updated at columns

            // Define foreign key constraint
            $table->foreign('role_id')->references('id')->on('login_roles')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('login_users');
    }
}