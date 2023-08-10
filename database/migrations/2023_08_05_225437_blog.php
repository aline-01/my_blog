<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("blog",function(Blueprint $table){
            $table->increments("id");
            $table->string("title");
            $table->string("picture");
            $table->longText("content");
            $table->string("writer");
            $table->string("date_persian")->default("we dont have yet");
            $table->boolean("is_accepted")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
