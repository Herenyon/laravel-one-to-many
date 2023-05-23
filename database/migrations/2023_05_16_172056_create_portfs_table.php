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
        Schema::create('portfs', function (Blueprint $table) {
            $table->id();
            $table->string('repo_title', 30)->unique();
            $table->string('author', 30);
            $table->string('nickname', 50);
            $table->text('description');
            $table->string('slug');
            $table->date('date_of_start')->nullable();
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
        Schema::dropIfExists('portfs');
    }
};
