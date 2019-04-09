<?php
namespace App\Model\Table;

use App\Model\Entity\Tblresultat;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblresultat Model
 *
 */
class TblresultatTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tblresultat');
        $this->displayField('resId');
        $this->primaryKey('resId');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('resId')
            ->allowEmpty('resId', 'create');

        $validator
            ->integer('tblReponse_repId')
            ->requirePresence('tblReponse_repId', 'create')
            ->notEmpty('tblReponse_repId');

        $validator
            ->integer('tblQuestion_quesId')
            ->requirePresence('tblQuestion_quesId', 'create')
            ->notEmpty('tblQuestion_quesId');

        $validator
            ->integer('tblParticipation_partId')
            ->requirePresence('tblParticipation_partId', 'create')
            ->notEmpty('tblParticipation_partId');

        $validator
            ->allowEmpty('resCommentaire');

        return $validator;
    }
}
