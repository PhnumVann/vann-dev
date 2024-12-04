<?php

use App\Enums\RentalStatus;
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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id()->primary();
            $table->foreignId('car_id')->constrained('cars');
            $table->foreignId('customer_id')->constrained('customers');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('rental_rate', 10, 2);
            $table->decimal('insurance_charge', 10, 2);
            $table->decimal('fuel_charge', 10, 2);
            $table->decimal('total_charge', 10, 2);
            $table->string('status')->default(RentalStatus::pending->value)->nullable();
            $table->string('payment_status')->default(RentalStatus::unpaid->value)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
