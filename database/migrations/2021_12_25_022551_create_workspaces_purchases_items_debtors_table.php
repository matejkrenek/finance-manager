<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspacesPurchasesItemsDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces_purchases_items_debtors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_item_id')->constrained('workspaces_purchases_items');
            $table->foreignId('debtor_id')->constrained('users');
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
        Schema::dropIfExists('workspace_purchase_item_debtors');
    }
}
