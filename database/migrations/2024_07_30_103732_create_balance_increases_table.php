<?php

use App\Enums\BalanceRequestStatus;
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
        Schema::create('balance_increases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->decimal('amount', 10, )->default(0);
            $table->text('description')->nullable();
            $table->string('check_photo')->nullable();
            $table->enum('status', BalanceRequestStatus::values())->default(BalanceRequestStatus::Pending);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balance_increases');
    }
};
