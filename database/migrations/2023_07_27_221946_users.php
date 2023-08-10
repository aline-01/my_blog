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
        Schema::create("users",function (Blueprint $table) {
          $table->increments("id");
          $table->string("name");
          $table->string("username");
          $table->string("email")->uniq();
          $table->string("password");
          $table->boolean("is_admin_access")->default(0);
          $table->boolean("is_verfied_email")->default(0);
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
