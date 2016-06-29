<?php

/**
 * Created by PhpStorm.
 * User: polis
 * Date: 11.05.2016
 * Time: 15:21
 */
class Menu
{
    private static $instance;
    private $mysql;
    private function __construct()
    {
        $this->mysql = Mysql::GetInstance();
    }
    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new self;
        return self::$instance;
    }

    public function Menu()
    {
        $query = "SELECT * FROM bl_category ";

        $result = $this->mysql->Select($query);
        return $result[0];
    }
}