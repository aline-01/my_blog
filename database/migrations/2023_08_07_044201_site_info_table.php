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
        Schema::create("site_info",function(Blueprint $table) {
	         $table->increments("id");
           $table->string("site_picture");
           $table->string("site_information");
           $table->string("youtube");
           $table->string("twitter");
           $table->string("instagram");
           $table->string("aparat");
           $table->string("telegram");
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
