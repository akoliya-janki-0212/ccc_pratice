<?php
class Mage
{
    private static $baseDir = 'C:/xampp/htdocs/practice/Exam';
    private static $baseUrl = 'http://localhost/practice/Exam';
    private static $_singleTon = null;

    public static function init()
    {
        $frontModel = new Core_Controller_Front();
        $frontModel->init();
    }
    public static function getSingleton($className)
    {
        if (isset(self::$_singleTon[$className])) {
            return self::$_singleTon[$className];
        }
        return self::$_singleTon[$className] = self::getModel($className);
    }
    public static function getModel($className)
    {
        $className = str_replace('/', '_Model_', $className);
        $className = ucwords($className, "_");
        return new $className();
    }
    public static function getBlock($className)
    {
        $className = str_replace('/', '_Block_', $className);
        $className = ucwords($className, "_");
        return new $className();
    }
    public static function register($key, $value)
    {
    }
    public static function registry($key)
    {
    }
    public static function getBaseDir($subDir = null)
    {
        if ($subDir) {
            return self::$baseDir . '/' . $subDir;
        }
        return self::$baseDir;
    }
    public static function getBaseUrl($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . '/' . $subUrl;
        }
        return self::$baseUrl;
    }
    public static function getMediaUrl($subUrl = null)
    {
        if ($subUrl) {
            return self::$baseUrl . '/media/' . $subUrl;
        }
        return self::$baseUrl;
    }

}
?>