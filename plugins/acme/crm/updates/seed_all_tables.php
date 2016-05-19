<?php namespace Acme\Crm\Updates;

use Acme\Crm\Models\Note;
use Acme\Crm\Models\Status;
use Acme\Crm\Models\Contact;
use Acme\Crm\Models\Collaborator;
use Acme\Crm\Models\Service;
use Acme\Crm\Models\Cost;
use Acme\Crm\Models\Opportunity;
use Acme\Crm\Models\Invoice;
use October\Rain\Database\Updates\Seeder;

class SeedAllTables extends Seeder
{
    public function run()
    {
        Status::create(['name' => 'Primo contatto',      'probability' => '5%']);
        Status::create(['name' => 'Prima proposta',      'probability' => '20%']);
        Status::create(['name' => 'Revisione proposta',  'probability' => '40%']);
        Status::create(['name' => 'Riscontro positivo',  'probability' => '60%']);
        Status::create(['name' => 'Accordo verbale',     'probability' => '90%']);
        Status::create(['name' => 'Approvato',           'probability' => '100%']);
        Status::create(['name' => 'Perso',               'probability' => '0%']);

    }
}
