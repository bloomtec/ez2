<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * This is a placeholder class.
 * Create the same file in app/Controller/AppController.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       Cake.Controller
 * @link http://book.cakephp.org/view/957/The-App-Controller
 */
class AppController extends Controller {
	
	public $cacheAction = true;
	
	public $components = array(
	    'Auth'=> array(
	        'authenticate' => array(
	            'Form' => array(
	                'fields' => array(
	                	'username' => 'email',
	                	'password' => 'password'
	                ),
	                'scope' => array('is_active' => true)
	            )
	        )
	    ),
	    'Session'
	);

	function beforeFilter() {
		if(isset($this->params["prefix"]) && $this->params["prefix"] == "admin"){
			$this -> layout = "ez/default";
			$this -> Auth -> loginRedirect = array("controller" => "pages", "action" => "ez", "admin" => true);
			$this -> Auth -> deny($this->action);
		}else{
			$this -> Auth -> loginRedirect = array("controller" => "users", "action" => "profile");
			$this -> Auth -> allow($this->action);
		}
	}
	
}
