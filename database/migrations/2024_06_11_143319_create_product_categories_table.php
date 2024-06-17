<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the product_categories table
        Schema::create('product_categories', function (Blueprint $table) {
            $table->intiger('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Add the product_category_id foreign key to the products table
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('product_category_id')->constrained('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the foreign key and column from the products table first
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['product_category_id']);
            $table->dropColumn('product_category_id');
        });

        // Then drop the product_categories table
        Schema::dropIfExists('product_categories');
    }
};
