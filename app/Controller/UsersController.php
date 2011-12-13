<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * register method
 *
 * @return void
 */
	public function register() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data['User']['role_id']=2;
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'crud/error');
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error',array(),'el-error');
			
			}
		}
	}	
	/**
 * register method
 *
 * @return void
 */
	public function validateEmail() {
		if ($this->request->is('post')) {
			//Codigo de verificacion
		}
	}
/**
 * login method
 *
 * @return void
 */
	public function login() {
		$this->layout = "login";
		if($this->request -> is('ajax')){
			if($this -> Auth -> login()){
				$this -> User -> recursive = -1;
				$user = $this -> User -> read(null,$this -> Auth -> user ('id'));
				$user['success'] = true;
				echo json_encode($user);
			}else{
				$response['message'] = __('Username or password is incorrect',true);
				$response['success'] = false;
				$this -> capchaFuncionality();
				echo json_encode($response);
			}
			$this -> autoRender = false;
			exit(0);
		}elseif($this->request -> is('post')){
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirect());
			}else{
				$this -> capchaFuncionality();
				$this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
			}
		}	
	}
/**
 * capcha funcionality  method
 *
 * @return void
 */
	public function capchaFuncionality(){
		if(Configure::read('capcha')){
			$logginAttempts = $this -> Session -> read('loginAttempts');
			$logginAttempts = $logginAttempts ? ($logginAttempts +1): 1;
			$this -> Session -> write('loginAttempts',$logginAttempts);
			if($logginAttempts >= Configure::read('loginAttempts')){
			// FUNCIONALIDAD CPACHA
			}
		}
		return true;
	}
/**
 * capcha generator method
 *
 * @return void
 */	
	public function capcha(){
		
	}
/**
 * logout method
 *
 * @return void
 */
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
/**
 * index method
 *
 * @return void
 */
	public function profile() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'crud/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'crud/error');
				//$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'error',array(),'el-error');
			
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
/**
 * admin_login method
 *
 * @return void
 */
	public function admin_login() {
		$this->layout = "ez/login";
	}
/**
 * logout method
 *
 * @return void
 */
	public function admin_logout() {
		$this->redirect($this->Auth->logout());
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
