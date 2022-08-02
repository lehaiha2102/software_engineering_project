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
            $table->id();
            $table->string('ProductName');
            $table->string('ProductSlug');
            $table->string('ProductUnit');
            $table->string('ProductImage');
            $table->string('ProductPurchasePrice');
            $table->string('ProductPrice');
            $table->string('ProductPromotionPrice');
            $table->string('CategoryId');
            $table->string('ProductCondition');
            $table->timestamps();
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
