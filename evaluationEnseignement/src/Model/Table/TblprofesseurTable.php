<?php
namespace App\Model\Table;

use App\Model\Entity\Tblprofesseur;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tblprofesseur Model
 *
 */
class TblprofesseurTable extends Table
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

        $this->table('tblprofesseur');
        $this->displayField('proId');
        $this->primaryKey('proId');
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
            ->integer('proId')
            ->allowEmpty('proId', 'create');

        $validator
            ->requirePresence('proNom', 'create')
            ->notEmpty('proNom');

        $validator
            ->requirePresence('proPrenom', 'create')
            ->notEmpty('proPrenom');

        $validator
            ->requirePresence('proMail', 'create')
            ->notEmpty('proMail');

        return $validator;
    }
}
