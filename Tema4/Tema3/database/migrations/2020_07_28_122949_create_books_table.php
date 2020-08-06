<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->foreignId('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->foreignId('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
            $table->year('publish_year');
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
        Schema::dropIfExists('books');
    }
}
