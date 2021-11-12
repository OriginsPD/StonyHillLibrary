<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->id();
            $table->integer('isbn');
            $table->string('title');
            $table->string('author');
            $table->foreignId('genre_id')->constrained('genres','id');
            $table->integer('page_no');
            $table->foreignId('category_id')->constrained('categories','id');
            $table->text('description');
            $table->integer('quantity');
            $table->foreignId('encoded_by')->constrained('users','id');
            $table->date('date_encoded')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_details');
    }
}
