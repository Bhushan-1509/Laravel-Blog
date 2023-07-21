<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            //...
            /*  id, first_name, last_name, email, password, timestamp*/
            $table->bigIncrements("uid");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("email");
            $table->string("password");
            $table->string("profile_image_path")->default("");
            $table->timestamp("created_at");
            $table->unique(['email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
