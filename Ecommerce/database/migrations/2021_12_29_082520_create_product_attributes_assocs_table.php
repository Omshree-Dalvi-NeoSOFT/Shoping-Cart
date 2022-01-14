<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesAssocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes_assocs', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
            $table->string('attr_name')->nullable();
            $table->string('arrt_value')->nullable();
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
        Schema::dropIfExists('product_attributes_assocs');
    }
}
