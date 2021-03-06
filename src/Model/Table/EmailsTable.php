<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use DateTime;

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
    
    public function getChart($startDate=null, $finishDate=null, $idAccount=0, $idUser=0){
    	$labels = [];
    	$dataset = [];
    	$values = [];
    	$queryUsersIn = [];
    	
    	if($startDate && $finishDate){
    		$dStartDate = new DateTime($startDate);
    		$dFinishDate = new DateTime($finishDate);
    	} else{
    		$dStartDate = new DateTime(date('Y-m-d'));
    		$dFinishDate = new DateTime(date('Y-m-d'));
    		$dFinishDate->modify('- 30 days');
    	}

    	if($idUser){
    		$users = $this->Users->find()->where(['IdUser' => $idUser]);
    	} elseif($idAccount){
    		$users = $this->Users->find()->where(['IdAccount' => $idAccount]);
    	}
    		
    	foreach($users as $user){
    		$queryUsersIn[] = $user->IdUser;
    	}
    	
    	$emails = $this->find();
    	$emails->select([
    			'value' => $emails->func()->count('Emails.IdEmail'),
    			'label' => ('concat(day(DtRegister), concat(month(DtRegister), year(DtRegister)))'),
    			'IdUser' => ('IdUser')
    		])
    		->where(['IdUser in' => $queryUsersIn])
    		->where(['DtRegister BETWEEN :startDate AND :finishDate'])
    		->bind(':startDate', new \DateTime($startDate), 'date')
    		->bind(':finishDate', new \DateTime($finishDate), 'date')
    		->group('concat(day(DtRegister), concat(month(DtRegister), year(DtRegister)))')
    		->orderAsc('IdUser')
    		->orderAsc('DtRegister');
    	
    	foreach($users as $u){
    		
    		$dStartDate= new DateTime($startDate);
    		$dFinishDate= new DateTime($finishDate);
    		$d['email'] = $u->EmailUser;
    		$values = [];
    		for($i = $dStartDate; $i <= $dFinishDate; $i->modify('+1 day')){
    			
    			$values[$i->format("Y-m-d")] = 0;
    			foreach($emails as $email){
    				if($email->label == $i->format("jnY") && $u->IdUser == $email->IdUser){
    					//$dataset[$u->NameUser][$i->format("Y-m-d")] = $email->value;
    					$values[$i->format("Y-m-d")] = $email->value;
    					break;
    				}
    			}
    		}
    		$d['values'] = [];
    		foreach($values as $key => $value){
    			$d['values'][] = ['0' => $key, '1' => $value];
    		}
    		$dataset[] = $d;
    	}
    	
    	return ($dataset);
    }
    
    /**
     * Grafico de meses por usuario
     */
    public function chartByUser($idUser){
    	$query = $this->find();
    	$query->select([
    				'value' => $query->func()->count('Emails.IdEmail'),
    				'label' => ('concat( month(Emails.DtRegister), '/',year(Emails.DtRegister))')
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
