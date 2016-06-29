<?php

/**
 * Created by PhpStorm.
 * User: polis
 * Date: 31.05.2016
 * Time: 17:55
 */
class page_navigation
{
    private static $instance;
    private $mysql;

    private  function __construct()
    {
        $this->mysql = MySql::GetInstance();
    }

    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new self;
        return self::$instance;
    }

    

    public function nav($table, $perpage)
    {
        $query = "SELECT COUNT(*) FROM $table";
        
        $result = $this->mysql->Select($query);

        $r = $result[0][0]['COUNT(*)'] / $perpage;

        return ceil($r);
    }

    public function nav1($table, $perpage, $id)
    {
        $query = "SELECT COUNT(*) FROM $table WHERE id_categoty = $id";

        $result = $this->mysql->Select($query);

        $r = $result[0][0]['COUNT(*)'] / $perpage;

        return ceil($r);
    }


}