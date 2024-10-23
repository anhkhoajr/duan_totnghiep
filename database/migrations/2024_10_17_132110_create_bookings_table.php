<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// CreateBookingsTable.php
public function up()
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->engine = 'InnoDB';  // Đảm bảo sử dụng engine InnoDB
        $table->id();  // Tạo khóa chính tự động (bigInteger)
        $table->foreignId('users_id')->constrained('users')->onDelete('cascade');  // FK
        $table->foreignId('table_id')->constrained('tables')->onDelete('cascade');  // FK
        $table->date('booking_date');
        $table->time('booking_time');
        $table->integer('number_of_guests');
        $table->string('payment_method');
        $table->dateTime('payment_date')->nullable();
        $table->string('booking_status');
        $table->string('order_status');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('bookings');
}

};
