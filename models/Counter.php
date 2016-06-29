<?php


class Counter
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

    public function c($visitor_ip, $date)
    {
        $res = $this->mysql->Select("SELECT `visit_id` FROM `bl_visits` WHERE `date` = '$date'");


        if (count($res) == 0) {
            $this->mysql->Delete('bl_ips', null);
            $this->mysql->Insert('bl_ips', ['ip_id' => null, 'ip_address' => $visitor_ip]);
            $this->mysql->Insert('bl_visits',['date' => $date, 'hosts' => 1, 'views' => 1]);
            return true;
        } else {
            $current_ip = $this->mysql->Select("SELECT `ip_id` FROM `bl_ips` WHERE `ip_address` = '$visitor_ip'");

            if (count($current_ip) == 1)
            {
                $this->mysql->Update('bl_visits', ['views' => "views + 1"], "date = '$date'");


            } else {
                $this->mysql->Insert('bl_ips', ['ip_address' => $visitor_ip]);
                $this->mysql->Update('bl_visits', ['hosts' => "hosts + 1", 'views' => "views + 1"], "date = '$date'" );
                
            }
        }

    }
}