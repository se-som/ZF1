<?php
/**
 * Global objects of the application
 *
 * @author Enrico Zimuel (enrico@zimuel.it)
 * @version 0.1 
 */
class Globals
{
    const CONFIG_INI= '../etc/config.ini';
    /**
     * Database
     * 
     * @var Zend_Db
     */
    private static $_db = null;
    /**
     * Config
     * 
     * @var Zend_Config_Ini
     */
    private static $_config = null;
    /**
     * Session
     * 
     * @var Zend_Session 
     */
    private static $_mySession= null;
    
    /**
     * getDbConnection
     * 
     * @return Zend_Db
     */
    static public function getDbConnection ()
    {
        if (self::$_db != null) {
            return self::$_db; 
        } 
        self::$_db = Zend_Db::factory(self::getConfig()->db->driver,
              array ('host'   => self::getConfig()->db->host,
                 'username' => self::getConfig()->db->username,
                 'password' => self::getConfig()->db->password,
                 'dbname'   => self::getConfig()->db->dbname));
        self::$_db->setFetchMode(Zend_Db::FETCH_OBJ);      
        Zend_Db_Table::setDefaultAdapter(self::$_db);
        return self::$_db;                 
    }   
    /**
     * getConfig
     * 
     * @return Zend_Config_Ini
     */
    public static function getConfig()
    {
        if (self::$_config != null) {
            return self::$_config;
        }
        self::$_config = new Zend_Config_Ini(dirname(__FILE__) . DIRECTORY_SEPARATOR . self::CONFIG_INI, null);
        return self::$_config;
    }   
    /**
     * getSession
     * 
     * @return Zend_Session_Namespace
     */
    static public function getSession()
    {
        if (self::$_mySession != null) {
            return self::$_mySession;
        }
        self::$_mySession = new Zend_Session_Namespace(self::getConfig()->session->namespace);
   		if (!isset(self::$_mySession->initialized)) {
    		Zend_Session::regenerateId();
    		self::$_mySession->initialized = true;
		}
        return self::$_mySession;
    }                               
}
?>