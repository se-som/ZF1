<?php
/**
 * HomeController - The default controller class
 * 
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @version 0.1
 */
require_once 'Zend/Controller/Action.php';
class HomeController extends Zend_Controller_Action 
{

	/**
	 * The default action - show the home page
	 */
    public function indexAction() 
    {
		$this->view->auth= Globals::getConfig()->authentication->active;
    }
    /**
     * logout
     */
    public function logoutAction()
    {
        if (Zend_Session::sessionExists()) {
            Zend_Session::destroy(true,true);
            $this->_redirect('/index/login');
        }
    }
}
