<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('run_id')->constrained('runs')->cascadeOnDelete();
            $table->foreignId('project_id')->constrained('projects')->cascadeOnDelete();
            $table->string('feature_name');
            $table->string('scenario_name');
            $table->enum('status', ['passed','failed','skipped'])->default('skipped');
            $table->integer('duration_ms')->nullable();
            $table->integer('attempt')->default(1);
            $table->text('error_text')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('scenarios'); }
};
