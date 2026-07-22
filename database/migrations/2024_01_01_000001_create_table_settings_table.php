<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (Schema::hasTable('table_settings')) {
            // Table already exists (e.g. from a previous installation), skip creation
            // but ensure the selected_saved_filter_id column exists
            if (! Schema::hasColumn('table_settings', 'selected_saved_filter_id')) {
                Schema::table('table_settings', function (Blueprint $table) {
                    $table->foreignId('selected_saved_filter_id')->nullable()->constrained('saved_filters')->nullOnDelete();
                });
            }

            return;
        }

        Schema::create('table_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('table_identifier', 100);
            $table->json('columns')->nullable();
            $table->json('filters')->nullable();
            $table->string('sort_column', 100)->nullable();
            $table->enum('sort_direction', ['asc', 'desc'])->default('asc');
            $table->unsignedSmallInteger('per_page')->default(25);
            $table->foreignId('selected_saved_filter_id')->nullable()->constrained('saved_filters')->nullOnDelete();
            $table->timestamps();

            $table->unique(['user_id', 'table_identifier']);
            $table->index('user_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('table_settings');
    }
};
