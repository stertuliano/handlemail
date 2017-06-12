<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Account Entity
 *
 * @property int $IdAccount
 * @property string $NameAccount
 * @property string $TaxId
 * @property string $Address1
 * @property string $Address2
 * @property string $NameCity
 * @property string $ZipCode
 * @property int $IdStateRegion
 */
class Account extends Entity
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
        '*' => true,
        'IdAccount' => false
    ];
}
