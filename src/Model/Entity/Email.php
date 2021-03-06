<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Email Entity
 *
 * @property int $IdEmail
 * @property string $Email
 * @property \Cake\I18n\FrozenDate $DtRegister
 * @property string $EmailFrom
 * @property int $IdUser
 *
 * @property \App\Model\Entity\User $user
 */
class Email extends Entity
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
        'IdEmail' => false
    ];
}
