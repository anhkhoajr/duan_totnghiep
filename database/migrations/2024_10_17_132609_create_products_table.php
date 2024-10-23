<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
// CreateProductsTable.php
public function up()
{
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // PK
        $table->foreignId('users_id')->constrained('users')->onDelete('cascade'); // FK
        $table->foreignId('categories_id')->constrained('categories')->onDelete('cascade'); // FK
        $table->string('name');
        $table->string('img')->nullable();
        $table->text('description');
        $table->decimal('sale_price', 10, 2);
        $table->decimal('price', 10, 2);
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('products');
}

};
