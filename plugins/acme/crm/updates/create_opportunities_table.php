<?php namespace Acme\Crm\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateOpportunitiesTable extends Migration
{

    public function up()
    {
        Schema::create('acme_crm_opportunities', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('status_id')->unsigned()->nullable()->index();
            $table->date('starting');
            $table->date('finishing');
            $table->timestamps();
        });

        Schema::create('acme_crm_opportunities_contacts', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('opportunity_id')->unsigned();
            $table->integer('contact_id')->unsigned();
            $table->primary(['opportunity_id', 'contact_id'], 'opportunity_contact');
        });

    }

    public function down()
    {
        Schema::dropIfExists('acme_crm_opportunities');
        Schema::dropIfExists('acme_crm_opportunities_contacts');
    }

}
