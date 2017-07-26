<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Emails Controller
 *
 * @property \App\Model\Table\EmailsTable $Emails
 *
 * @method \App\Model\Entity\Email[] paginate($object = null, array $settings = [])
 */
class EmailsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $emails = $this->Emails->find('all')->contain('Users');
        
        if(!$this->Auth->user('Admin')){
        	$emails->where(['Emails.IdUser' => $this->Auth->user('IdUser')]);
        }

        $this->set(compact('emails'));
        $this->set('_serialize', ['emails']);
    }
    
    /**
     * Chart method
     */
    public function chart(){
    	debug($this->request->getData());
    	
    	if($this->Auth->user('Admin')){
    		$data = $this->Emails->chartByDate();
    	}
    	else{
    		$data = $this->Emails->chartByUser($this->Auth->user('IdUser'));
    	}
    	
    	debug($data->first());die;
    	$users = $this->Emails->Users->find('list');
    	
    	$this->loadModel('Accounts');
    	$accounts = $this->Accounts->find('list');

    	$this->set(compact('data', 'users', 'accounts'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
    	// Verifica se usuario é admin
    	$this->Permission->verifyAdmin();
    	
        $email = $this->Emails->newEntity();
        if ($this->request->is('post')) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email could not be saved. Please, try again.'));
        }
        $users = $this->Emails->Users->find('list');
        $this->set(compact('email', 'users'));
        $this->set('_serialize', ['email']);
    }


    /**
     * Edit method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
    	// Verifica se usuario é admin
    	$this->Permission->verifyAdmin();
    	
        $email = $this->Emails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $email = $this->Emails->patchEntity($email, $this->request->getData());
            if ($this->Emails->save($email)) {
                $this->Flash->success(__('The email has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The email could not be saved. Please, try again.'));
        }
        $users = $this->Emails->Users->find('list', ['limit' => 200]);
        $this->set(compact('email', 'users'));
        $this->set('_serialize', ['email']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Email id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
    	// Verifica se usuario é admin
    	$this->Permission->verifyAdmin();
    	
        $this->request->allowMethod(['post', 'delete']);
        $email = $this->Emails->get($id);
        if ($this->Emails->delete($email)) {
            $this->Flash->success(__('The email has been deleted.'));
        } else {
            $this->Flash->error(__('The email could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
