<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ApplicantsTbl extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('applicants_tbl', function (Blueprint $table) {
      $table->increments('applicants_id');
      $table->string('username');
      $table->string('password');
      $table->string('first_name');
      $table->string('middle_name');
      $table->string('last_name');
      $table->string('Email');
      $table->string('Mobile');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('applicants_tbl');
  }
}
