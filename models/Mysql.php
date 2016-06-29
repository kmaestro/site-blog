<?php


class Mysql
{
    private static $link;
    private static $instance;
    private function __construct()
    {
        setlocale(LC_ALL, "ru_RU.UTF-8");
        mb_internal_encoding("UTF-8");
        self::$link = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
    }
    public static function GetInstance()
    {
        if(self::$instance == null)
            self::$instance = new self;
        return self::$instance;
    }
    public function Select($query)
    {
        $result = self::$link->query($query);
        $row = [];
        while($r = $result->fetchAll(PDO::FETCH_ASSOC))
            $row[]=$r;
        return $row;
    }
    public function Insert($table, $fields)
    {
        $columns = [];
        $values = [];
        foreach ($fields as $field => $value)
        {
            $columns[] = "`$field`";
            if($value == null)
            {
                $values[] = "NULL";
            } else{
                $values[] = "'$value'";
            }
        }
        $columns_str = implode(", ", $columns);
        $values_str = implode(", ", $values);
        $q = "INSERT INTO `$table` ($columns_str) VALUES ($values_str)";
        $result = self::$link->prepare($q);
        $result->execute();
        return $result;
    }
    
   
    public function Update($table, $fieds, $where)
    {
        $sets = [];
        foreach ($fieds as $fied => $value)
        {
            if($value == null)
                $sets[] = "$fied = NULL";
            else
                $sets[] = "$fied = $value";
        }
        $sets_set = implode(", ", $sets);
        $query = "UPDATE $table SET $sets_set WHERE $where";
        $result = self::$link->prepare($query);
        $result->execute();
        return $result;
    }
    public function Delete($table, $where)
    {
        if ($where == null)
        {
            $query = "DELETE FROM `$table`";
            $result = self::$link;
            $result->query($query);
            return $result;
        }else
        {
            $query = "DELETE FROM `$table` WHERE $where";
            $result = self::$link;
            $result->query($query);
            return $result;
        }

    }
}