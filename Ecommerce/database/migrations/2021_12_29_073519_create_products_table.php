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
            $table->id('id');
            $table->unsignedBigInteger('subcat_id');
            $table->foreign('subcat_id')->references('id')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
            $table->string('prod_name');
            $table->string('prod_description')->nullable();
            $table->string('colour');
            $table->bigInteger('quantity');
            $table->decimal('price');
            $table->string('prod_mainimage');
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
