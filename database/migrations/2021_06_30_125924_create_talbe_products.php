<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalbeProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('feature_image_path')->nullable(); // Đảm bảo cột này tồn tại
            $table->string('feature_image_name')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->string('image_path')->default('default-image.jpg');
            $table->string('status')->nullable();
            $table->string('quantity')->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
