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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_motorcycle');
            $table->dateTime('rental_date');
            $table->dateTime('return_date');
            $table->string('location');

            $table->integer('duration');
            $table->decimal('price', 10, 2);;
            
            $table->timestamps();
    
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_motorcycle')->references('id')->on('motorcycle')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transactions');
    }
};
?>