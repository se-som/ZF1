<?php
/**
 * Users Table
 *  
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @version 0.1
 */
require_once 'Zend/Db/Table/Abstract.php';
class Users extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    protected $_primary = 'username';

}
?>