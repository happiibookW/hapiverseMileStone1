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
        Schema::create('save_posts', function (Blueprint $table) {
            $table->id();
            $table->string('userId');
            $table->string('postId');
            $table->timestamps();

            $table->foreign('userId')->references('userId')->on('mstuser')->onDelete('cascade');
            $table->foreign('userId')->references('userId')->on('users')->onDelete('cascade');
            $table->foreign('postId')->references('postId')->on('mstpost')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('save_posts');
    }
};
