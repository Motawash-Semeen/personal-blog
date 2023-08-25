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
        Schema::create('s_m_t_p_s', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('mail_host', 255);
            $table->string('mail_port', 255);
            $table->string('mail_email', 255);
            $table->string('mail_password', 255);
            $table->enum('mail_encryption', ['TLS', 'SSL']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('s_m_t_p_s');
    }
};
