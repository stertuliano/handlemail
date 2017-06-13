<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;


/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('Users');
        $this->setDisplayField('NameUser');
        $this->setPrimaryKey('IdUser');
        /*
        $this->hasMany('Emails', [
        	'foreignKey' => 'IdUser'
        ]);
        
        $this->belongsTo('Accounts', [
        	'foreignKey' => 'IdAccount',
        	'joinType' => 'INNER'
        ]);
        */
    }

    /*
     * Antes de salvar as alteracoes
     */
    public function beforeSave(Event $event, Entity $entity){
    	if($entity->password == ''){
    		unset($entity->password);
    	}
    	else{
    		$entity->password = (new DefaultPasswordHasher)->hash($entity->password);
    	}
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
            ->integer('IdUser')
            ->allowEmpty('IdUser', 'create');

        $validator
            ->notEmpty('NameUser');

        $validator
            ->notEmpty('EmailUser');

        $validator
            ->allowEmpty('PhoneNumber');

        $validator
            ->notEmpty('IdAccount');

		$validator
            ->requirePresence('confirm_password', '', 'create')
            ->notEmpty('confirm_password', '', 'create')
            ->requirePresence('password', '', 'create')
            ->notEmpty('password', '', 'create');
            
    	$validator->add('password', 'custom', [
    			'rule' => 'validPassword',
    			'provider' => 'table',
    			'message' => 'Senha deve conter no mínino 8 caracteres, contendo uma letra maiúscula, uma minúscula e um número'
    	]);
    	
    	$validator
    		->add('confirm_password',
    			'compareWith', [
    					'rule' => ['compareWith', 'password'],
    					'message' => 'Senha e Confirmação não conferem'
    			]
    		);

        $validator
            ->integer('Admin')
            ->allowEmpty('Admin');

        $validator
            ->integer('Confirmed')
            ->allowEmpty('Confirmed');

        return $validator;
    }
    

    // Funcao para validar password
    function validPassword($password) {
    	if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$', $password)){
    		return false;
    	}
    	else{
    		return true;
    	}
    	/*
    	 Explaining $\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    	 $ = beginning of string
    	 \S* = any set of characters
    	 (?=\S{8,}) = of at least length 8
    	 (?=\S*[A-Z]) = and at least one uppercase letter
    	 (?=\S*[\d]) = and at least one number
    	 $ = end of the string
    	 */
    }
    
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
    	$rules->add($rules->isUnique(['email']));
    
    	return $rules;
    }
}
