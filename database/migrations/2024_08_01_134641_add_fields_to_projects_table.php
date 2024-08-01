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
        Schema::table('projects', function (Blueprint $table) {
            $table->string('name')->after('id');
            $table->boolean('featured')->default(false)->after('name');
            $table->boolean('draft')->default(false)->after('featured');
            $table->string('image')->nullable()->after('draft');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->dropColumn(['name', 'featured', 'draft', 'image']);
        });
    }
};
