<?php namespace Acme\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCostsTable extends Migration
{

    public function up()
    {
        Schema::create('acme_crm_costs', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('descrizione')->nullable();
            $table->decimal('valoremin')->nullable();
            $table->decimal('valoremax')->nullable();
            $table->integer('opportunity_id')->unsigned()->nullable()->index();
            $table->integer('owner_id')->unsigned()->nullable()->index();
            $table->string('referente')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_crm_costs');
    }

}
