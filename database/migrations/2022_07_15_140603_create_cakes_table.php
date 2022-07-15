<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cakes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedDecimal('weight')->default(0.0);
            $table->unsignedDecimal('value')->default(0.0);
            $table->unsignedInteger('amount')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cakes');
    }
};
