<?php
class Core_Model_Session
{
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
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
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $_SESSION)) {
            return $_SESSION[$key];
        } elseif (isset($default)) {
            return $default;
        }
        return false;
    }
    public function remove($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
        return $this;
    }
    public function __destruct()
    {

    }

}

?>