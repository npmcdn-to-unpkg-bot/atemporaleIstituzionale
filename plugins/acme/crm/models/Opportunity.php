<?php namespace Acme\Crm\Models;

use Model;

/**
 * Opportunity Model
 */
class Opportunity extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_crm_opportunities';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'notes' => ['Acme\Crm\Models\Note'],
        'collaborators' => ['Acme\Crm\Models\Collaborator'],
        'services' => ['Acme\Crm\Models\Service'],
        'costs' => ['Acme\Crm\Models\Cost'],
        'invoices' => ['Acme\Crm\Models\Invoice'],
    ];

    public $belongsTo = [
        'status' => ['Acme\Crm\Models\Status'],
    ];

    public $belongsToMany = [
        'contacts' => [
            'Acme\Crm\Models\Contact',
            'table' => 'acme_crm_opportunities_contacts'
        ],
    ];

}