<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblIssuedBooks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_issued_books', function (Blueprint $table) {
            $table->bigIncrements('issue_id');
            $table->integer('book_id')->unique();
            $table->integer('student_id')->unique();
            $table->dateTime('issued_on');
            $table->tinyInteger('is_returned');
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
        Schema::dropIfExists('tbl_issued_books');
    }
}
