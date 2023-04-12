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
        Schema::create('comments', function (Blueprint $table) {
            $table->integer('_id', true);
            $table->text('content')->nullable();
            $table->timestamp('date')->nullable();
            $table->integer('idBook')->nullable()->index('idBook');
            $table->foreign("idBook")->references("_id")->on("books");
            $table->string('idUser', 50)->nullable()->index('idUser');
            $table->foreign("idUser")->references("username")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
