<?php namespace Acme\Crm\Models;

use Model;

/**
 * Note Model
 */
class Cost extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_crm_costs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'opportunity' => ['Acme\Crm\Models\Opportunity'],
        'owner' => ['Backend\Models\User'],
    ];

}