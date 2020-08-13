<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->date('borrowed_at');
            $table->date('borrowed_until');
            $table->date('returned_at')->nullable()->default(null);
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowings');
    }
}
