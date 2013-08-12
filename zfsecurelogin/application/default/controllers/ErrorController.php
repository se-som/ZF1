<?php

/**
 * ErrorController - The default error controller class
 * 
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @version 0.1
 */

require_once 'Zend/Controller/Action.php';

class ErrorController extends Zend_Controller_Action
{

    /**
     * This action handles  
     *    - Application errors
     *    - Errors in the controller chain arising from missing 
     *      controller classes and/or action methods
     */
    public function errorAction()
    {
        $errors = $this->_getParam('error_handler');
        switch ($errors->type) {
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_CONTROLLER:
            case Zend_Controller_Plugin_ErrorHandler::EXCEPTION_NO_ACTION:
                // 404 error -- controller or action not found                
                $this->getResponse()->setRawHeader('HTTP/1.1 404 Not Found');
                $this->view->title = 'HTTP/1.1 404 Not Found';
                break;
            default:
                // application error; display error page, but don't change                
                // status code
                $this->view->title = 'Application Error';
                break;
        }
        
        $this->view->message = $errors->exception;
    }
    /**
     * CSRF Attack
     */
    public function csrfForbiddenAction() {
    	$this->getResponse()->setRawHeader('HTTP/1.1 403 Forbidden');
        $this->view->title= '403 Forbidden';
        $this->view->message= 'Cross site request forgery detected. Request aborted';
        $this->render('error');        
    }
}
