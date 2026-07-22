<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('saved_filters')) {
            return;
        }

        Schema::create('saved_filters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('table_identifier', 100);
            $table->string('name', 100);
            $table->json('filters');
            $table->timestamps();

            $table->index(['user_id', 'table_identifier']);
            $table->unique(['user_id', 'table_identifier', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('saved_filters');
    }
};
