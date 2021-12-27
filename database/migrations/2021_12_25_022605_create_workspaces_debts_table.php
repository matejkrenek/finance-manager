<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspacesDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces_debts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->constrained('workspaces_purchases');
            $table->foreignId('debtor_id')->constrained('users');
            $table->decimal('amount');
            $table->boolean('is_payed')->default(false);
            $table->timestamp('payed_at')->nullable();
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
        Schema::dropIfExists('workspace_debts');
    }
}
