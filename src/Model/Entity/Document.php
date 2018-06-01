<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Document Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $doc_path
 * @property string $name
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Document extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'customer_id' => true,
        'doc_path' => true,
        'name' => true,
        'customer' => true
    ];
}
