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
        Schema::create('favorites', function (Blueprint $table) {
            $table->timestamp('date')->nullable();
            $table->integer('idBook')->nullable()->index('favorite_fk_book');
            $table->foreign("idBook")->references("_id")->on("books");
            $table->string('idUser', 50)->nullable()->index('favorite_fk_iser');
            $table->foreign("idUser")->references("username")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
