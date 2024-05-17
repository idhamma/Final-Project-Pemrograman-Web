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
        Schema::create('table_transactions', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->dateTime('tanggal_pinjam');
            $table->dateTime('tanggal_kembali');
            $table->string('lokasi');
            $table->integer('biaya');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_motor');

            $table->foreign('id_user')->references('id')->on('table_user');
            $table->foreign('id_motor')->references('id')->on('table_motorcycle');
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