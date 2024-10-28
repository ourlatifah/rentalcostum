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
        Schema::table('costums', function (Blueprint $table) {
            $table->string('slug', 255)->after('warna')->nullable();
            $table->string('image', 255)->after('warna')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('costums', function (Blueprint $table) {
            if (Schema::hasColumn('costums', 'slug')) {
                $table->dropColumn('slug');
            }
            if (Schema::hasColumn('costums', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};
