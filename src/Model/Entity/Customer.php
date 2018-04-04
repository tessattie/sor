<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Customer Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $NIF
 * @property int $telephone
 * @property int $cellulaire
 * @property string $address
 * @property string $email
 * @property string $entreprise
 * @property string $employeur
 * @property int $tel_employeur
 * @property string $post_occupe
 * @property string $adresse_employeur
 * @property int $status
 * @property int $type_carte
 * @property string $num_client
 * @property string $carte_identite
 *
 * @property \App\Model\Entity\Advisor[] $advisors
 */
class Customer extends Entity
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
        'first_name' => true,
        'last_name' => true,
        'NIF' => true,
        'telephone' => true,
        'cellulaire' => true,
        'address' => true,
        'email' => true,
        'entreprise' => true,
        'employeur' => true,
        'tel_employeur' => true,
        'post_occupe' => true,
        'adresse_employeur' => true,
        'status' => true,
        'type_carte' => true,
        'num_client' => true,
        'carte_identite' => true,
        'advisors' => true
    ];
}
