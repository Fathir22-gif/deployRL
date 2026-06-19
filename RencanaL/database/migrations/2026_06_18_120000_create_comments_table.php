<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->tinyInteger('rating')->nullable();
            $table->text('comment');
            $table->timestamps();

            $table->index('destination');
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
