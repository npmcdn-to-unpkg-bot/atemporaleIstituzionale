<?php namespace Acme\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateInvoicesTable extends Migration
{

    public function up()
    {
        Schema::create('acme_crm_invoices', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('opportunity_id')->unsigned();
            $table->string('name')->nullable();
            $table->date('creation');
            $table->date('duedate');
            $table->string('terms')->nullable();
            $table->string('payment')->default('Non pagato');
            $table->text('causal')->nullable();
            $table->decimal('amount')->nullable();
            $table->decimal('tax')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('total')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_crm_invoices');
    }
}
