<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->float('price');
            $table->float('selling_price')->nullable();
            $table->float('special_price')->nullable();
            $table->timestamp('special_price_start')->nullable();
            $table->timestamp('special_price_end')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->text('description');
            $table->text('short_description')->nullable();
            $table->string('sku')->nullable();
            $table->boolean('manage_stock')->default(false);
            $table->integer('qty')->nullable();
            $table->boolean('in_stock')->default(true);
            $table->integer('viewed')->default(0);
            $table->timestamp('new_from')->nullable();
            $table->timestamp('new_to')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
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
