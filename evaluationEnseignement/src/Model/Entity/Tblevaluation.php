<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tblevaluation Entity.
 *
 * @property int $evaId
 * @property int $tblQuestionnaire_qstId
 * @property int $tblSection_secId
 * @property int $tblProfesseur_proId
 * @property int $tblStatut_statId
 * @property string $evaNom
 * @property \Cake\I18n\Time $evaDebutValidite
 * @property \Cake\I18n\Time $evaFinValidite
 * @property string $evaCodeAccesParticipant
 * @property string $evaCodeAccesSynthese
 * @property string $evaClasse
 * @property string $evaModule
 */
class Tblevaluation extends Entity
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
        'evaId' => false,
    ];
}
