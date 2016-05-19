<?php namespace Acme\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateServicesTable extends Migration
{

    public function up()
    {
        Schema::create('acme_crm_services', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('annotations')->nullable();
            $table->string('status')->nullable();
            $table->integer('opportunity_id')->unsigned()->nullable()->index();
            $table->integer('service_id')->unsigned()->nullable()->index();
            $table->integer('owner_id')->unsigned()->nullable()->index();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acme_crm_services');
    }

}
