<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Advisor Entity
 *
 * @property int $id
 * @property int $customer_id
 * @property string $first_name
 * @property string $address
 * @property int $phone
 * @property string $email
 * @property string $employer
 * @property string $last_name
 *
 * @property \App\Model\Entity\Customer $customer
 */
class Advisor extends Entity
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
        'first_name' => true,
        'address' => true,
        'phone' => true,
        'email' => true,
        'employer' => true,
        'last_name' => true,
        'customer' => true
    ];
}
