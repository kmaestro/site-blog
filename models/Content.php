<?php


 class Content
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

    public function GetContents($count, $page = 1)
    {
         $shift = $count * ($page - 1);
        $query = "SELECT * FROM  bl_content ORDER BY id DESC LIMIT $shift, $count";
        $result = $this->mysql->Select($query);


        return $result[0];
    }
     
     public function GetContent($id)
     {
         $query = "SELECT * FROM bl_content WHERE id = $id";
         
         $result = $this->mysql->Select($query);
         return $result[0];
         
     }

     public function CategotysContent($id, $count, $page = 1)
     {
         $shift = $count * ($page - 1);
         $query = "SELECT *, bl_content.id FROM bl_content 
                  LEFT JOIN bl_category ON bl_category.id = bl_content.id_categoty 
                  WHERE id_categoty = $id 
                  ORDER BY bl_content.id DESC
                  LIMIT $shift, $count";
         $result = $this->mysql->Select($query);
         return $result[0];
     }
    
    
}