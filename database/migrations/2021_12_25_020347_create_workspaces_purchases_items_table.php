<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspacesPurchasesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces_purchases_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('workspaces_products');
            $table->foreignId('purchase_id')->constrained('workspaces_purchases');
            $table->decimal('price_per_unit');
            $table->decimal('price');
            $table->integer('quantity');
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
        Schema::dropIfExists('workspace_purchase_items');
    }
}
