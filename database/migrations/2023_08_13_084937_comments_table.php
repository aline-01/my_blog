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
        Schema::create("comments",function (Blueprint $table) {
            $table->increments("id");
            $table->integer("blog_id");
            $table->string("text");
            $table->string("email")->default("not_set");
            $table->string("writer_name")->default("not_set");
            $table->boolean("is_accepted")->default(0);
            $table->foreign("blog_id")->referece("id")->on("blog");
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
