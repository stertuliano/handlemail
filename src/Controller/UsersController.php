<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Core\Configure;
use Cake\Routing\Router;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

	public function beforeFilter(Event $event){
		$this->Auth->allow(['login', 'resendPassword', 'redefPassword']);
	}

    /**
	* Index method
	*
	* @return \Cake\Network\Response|null
	*/
    public function index()
    {
    	// Verifica se usuario é admin
    	$this->Permission->verifyAdmin();
    	
	   $this->paginate = [];
	   $users = $this->Users->find()->contain('Accounts');
	   
	   $this->set(compact('users'));
	   $this->set('_serialize', ['users']);
    }

    /**
	* Add method
	*
	* @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
	*/
    public function add()
    {
	  	// Verifica se usuario é admin
    	$this->Permission->verifyAdmin();
    	
	   $user = $this->Users->newEntity();
	   if ($this->request->is('post')) {
		  $user = $this->Users->patchEntity($user, $this->request->getData());
		  if ($this->Users->save($user)) {
			 $this->Flash->success(__('The register has been saved.'));

			 return $this->redirect(['action' => 'index']);
		  }
		  $this->Flash->error(__('The register could not be saved. Please, try again.'));
	   }
	   
	   $accounts = ($this->Users->Accounts->find('list'));
	   $this->set(compact('user', 'accounts'));
	   $this->set('_serialize', ['user']);
    }

    /**
	* Edit method
	*
	* @param string|null $id User id.
	* @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
	* @throws \Cake\Network\Exception\NotFoundException When record not found.
	*/
    public function edit($id = null)
    {
    	if($this->Auth->user('IdUser') != $id){
    		// Verifica se usuario é admin
    		$this->Permission->verifyAdmin();
    	}
    	
	   $user = $this->Users->get($id, [
		  'contain' => []
	   ]);
	   if ($this->request->is(['patch', 'post', 'put'])) {
		  $user = $this->Users->patchEntity($user, $this->request->getData());
		  if ($this->Users->save($user)) {
		  	$this->Flash->success(__('The register has been saved.'));

			 return $this->redirect(['action' => 'index']);
		  }
		  $this->Flash->error(__('The register could not be saved. Please, try again.'));
	   }
	   
	   $accounts = ($this->Users->Accounts->find('list'));
	   $this->set(compact('user', 'accounts'));
	   $this->set('_serialize', ['user']);
    }

    
	/**
	 * Login
	 */    
    public function login(){
    	$this->viewBuilder()->setLayout('loginlte');
    	
    	if($this->request->is('post')){
    		$user = $this->Auth->identify();

    		if($user){
    			$this->Auth->setUser($user);
    			return $this->redirect(['controller' => 'Emails', 'action' => 'index']);
    		}
    		else{
    			$this->Flash->error('Usuário e Senha inválidos');
    		}
    	}
	}
    
    /**
	* Funcao para enviar a redefinicao de senha
	*/	
	public function resendPassword(){
		if($this->request->is('ajax')){
			$this->autoRender = false;
			$email = $this->request->getData('EmailUser');

			$user = $this->Users->find()->where(['EmailUser' => $email]);
			if($user->count()){
				$user = $user->first();
				$this->loadModel('ForgotPassword');
				$forgotPassword = $this->ForgotPassword->newEntity();
				$token = md5(uniqid(rand(), true));
				$forgotPassword = $this->ForgotPassword->patchEntity($forgotPassword, ['IdUser' => $user->IdUser, 'token' => $token, 'created' => date('Y-m-d H:i:s')]);
				if($this->ForgotPassword->save($forgotPassword)){
					$email = new Email();
					$email = $email->setProfile('default')
						->setFrom(['stertuliano@gmail.com' => 'Contato do Site'])
						->setTo($user->EmailUser)
						->setSubject(Configure::read('Company')['title'] . ' -  Redefinir Senha')
						->setEmailFormat('html')
						->setTemplate('resend_password')
						->setViewVars(['token' => $token])
						->send();
					echo '1';
				}
			}
		}
		
		exit;
    }
    
    // Funcao para redefinicao de senha
    public function redefPassword($token=''){
    	$this->viewBuilder()->setLayout('loginlte');
    	$forgotPassword = [];
    	$user = null;
    	
    	$this->loadModel('ForgotPassword');
    	$forgotPassword = $this->ForgotPassword->find()->where(['token' => $token])->contain('Users');
    	
    	if($forgotPassword->count()){
    		$forgotPassword = $forgotPassword->first();
    		$user = $forgotPassword->user;
    		
    		if($this->request->is(['post', 'put'])){
    			$this->loadModel('Users');
    			$user = $this->Users->patchEntity($user, $this->request->getData());
    			
    			if($this->Users->save($user)){
    				$this->Flash->success('Senha Alterada com sucesso.');
    			}
    			return $this->redirect(['action' => 'login']);
    		}
    	}
    	
    	$this->set(compact('forgotPassword', 'user', 'token'));
    }
    
    /**
	* Metodo de Logout
	*/
    public function logout() {
    	$this->Auth->logout();
    	$this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
}
