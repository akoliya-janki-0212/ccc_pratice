<?php
class Core_Model_Session
{
    public function __construct()
    {
        session_start();
    }
    public function getId()
    {
        if (!is_null($_SESSION)) {
            return session_id();
        }
        return false;
    }
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }
    public function get($key)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        }
        return 0;
    }
    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }
    public function __destruct()
    {

    }

}

?>