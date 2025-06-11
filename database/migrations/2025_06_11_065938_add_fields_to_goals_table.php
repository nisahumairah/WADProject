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
    Schema::table('goals', function (Blueprint $table) {
        $table->string('type', 100)->after('title');
        $table->decimal('target_value', 8, 2)->after('type');
        $table->decimal('current_progress', 8, 2)->default(0)->after('target_value');
        $table->date('start_date')->nullable()->after('current_progress');
        $table->date('end_date')->nullable()->after('start_date');
    });
}

public function down(): void
{
    Schema::table('goals', function (Blueprint $table) {
        $table->dropColumn(['type', 'target_value', 'current_progress', 'start_date', 'end_date']);
    });
}

};
