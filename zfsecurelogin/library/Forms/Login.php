<?php
/**
 * Forms_Login
 * 
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @version 0.1
 */
require_once 'Zend/Form.php';
class Forms_Login extends Zend_Form 
{
	public function init() {
		
        $this->setAction('submit')
             ->setName('login')
             ->setMethod('post');
            
        $token = new Zend_Form_Element_Hash('token');
        $token->setSalt(md5(uniqid(rand(), TRUE)));
        $token->setTimeout(Globals::getConfig()->authentication->timeout);
        $this->addElement($token);
             
        $username= new Zend_Form_Element_Text('username');
        $username->setLabel('Username')
        		 ->addValidator('Alnum')
                 ->setRequired(true);
              
        $this->addElement($username);
        
        $password= new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
        		 ->addValidator('Alnum')
                 ->setRequired(true);
                  
        $this->addElement($password);
        
        $submit= new Zend_Form_Element_Submit('Send');
        $this->addElement($submit);   
	}
}

?>