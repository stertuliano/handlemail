<?php
/*
 * Componente para verificar permissoes
 */
namespace App\Controller\Component;

use Cake\Controller\Component;

// Verifica se o usuario logado é admin
class PermissionComponent extends Component{
	public function verifyAdmin(){
		$controller = $this->_registry->getController();

		if(!$controller->Auth->user('Admin')){
			$controller->Flash->error(__('You are not authorized to access that location.'));
			$controller->Auth->logout();
			$controller->redirect(['controller' => 'Users', 'action' => 'login']);
		}
	}
}