<?php namespace Acme\Crm\Models;

use Model;

/**
 * Offering Model
 */
class Invoice extends Model
{

    /**
     * @var string The database table used by the model.
     */
    public $table = 'acme_crm_invoices';

    /**
     * @var array Guarded fields
     */
    protected $guarded = [];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'opportunity' => ['Acme\Crm\Models\Opportunity'],
    ];

}