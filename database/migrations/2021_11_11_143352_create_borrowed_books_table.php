<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowed_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('book_details','id');
            $table->foreignId('borrower_id')->constrained('members','id');
            $table->date('date_borrowed');
            $table->date('due_date');
            $table->integer('num_copies');
            $table->boolean('status')->default(0);
            $table->boolean('over_due')->default(0);
            $table->foreignId('process_by')->constrained('users','id');
            $table->date('date_return')->nullable();
            $table->foreignId('received_by')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowed_books');
    }
}
