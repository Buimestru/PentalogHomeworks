<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('nationality');
            $table->date('born_date');
            $table->string('born_country');
            $table->date('death_date')->nullable();
            $table->string('death_country')->nullable();
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
        Schema::dropIfExists('authors');
    }
}
