<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// CreateTablesTable.php
public function up()
{
    Schema::create('tables', function (Blueprint $table) {
        $table->engine = 'InnoDB';  // Đảm bảo sử dụng engine InnoDB
        $table->id();  // Tạo khóa chính tự động (bigInteger)
        $table->string('type');
        $table->integer('capacity');
        $table->string('status');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tables');
}

};
