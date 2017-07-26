<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Emails Model
 *
 * @method \App\Model\Entity\Email get($primaryKey, $options = [])
 * @method \App\Model\Entity\Email newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Email[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Email|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Email patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Email[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Email findOrCreate($search, callable $callback = null, $options = [])
 */
class EmailsTable extends Table
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

        $this->setTable('emails');
        $this->setDisplayField('IdEmail');
        $this->setPrimaryKey('IdEmail');
        
        $this->belongsTo('Users', [
        		'foreignKey' => 'IdUser',
        		'joinType' => 'INNER'
        ]);
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
            ->integer('IdEmail')
            ->allowEmpty('IdEmail', 'create');

        $validator
            ->allowEmpty('Email');

        $validator
            ->date('DtRegister')
            ->allowEmpty('DtRegister');

        $validator
            ->allowEmpty('EmailFrom');

        $validator
            ->integer('IdUser')
            ->requirePresence('IdUser', 'create')
            ->notEmpty('IdUser');

        return $validator;
    }
    
    /**
     * Grafico de meses por usuario
     */
    public function chartByUser($idUser){
    	$query = $this->find();
    	$query->select([
    				'value' => $query->func()->count('Emails.IdEmail'),
    				'label' => ("concat( month(Emails.DtRegister), '/',year(Emails.DtRegister) ) ")
    			])
    			->where(
    				['IdUser' => $idUser]
    			)
    			->orderAsc('DtRegister')
    			->group('concat(month(DtRegister), year(DtRegister))');
    	return $query;
    }
    
    /**
     * Grafico de meses por usuario
     */
    public function chartByDate(){
    	$query = $this->find();
    	$query->select([
    			'value' => $query->func()->count('Emails.IdEmail'),
    			'label' => ('Users.NameUser')
    		])
    		->contain('Users')
    			//->orderAsc('DtRegister')
    			->group('Emails.IdUser');
    	return $query;
    }
}
