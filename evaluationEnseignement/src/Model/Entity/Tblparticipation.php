<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tblparticipation Entity.
 *
 * @property int $partId
 * @property int $tblEvaluation_evaId
 * @property string $partContact
 * @property \Cake\I18n\Time $partDate
 */
class Tblparticipation extends Entity
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
        'partId' => false,
    ];
}
