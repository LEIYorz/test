<?php
class DBDA
{
    public $host="localhost";
    public $uid="root";
    public $pwd="";
    public $dbname="final";

    function Query($sql,$type=1)
    {
        $db = new MySQLi($this->host,$this->uid,$this->pwd,$this->dbname);
        $reslut = $db->query($sql);
        if($type==1)
        {
            return $reslut->fetch_all();
        }
        else
        {
            return $reslut;
        }
    }

    function GuanQuery($sql,$type=1)
    {
        $db = new MySQLi($this->host,$this->uid,$this->pwd,$this->dbname);
        $reslut = $db->query($sql);
        if($type==1)
        {
            $attr = array();
            while($a = $reslut->fetch_assoc())
            {
                $attr[] = $a;
            }
            return $attr;
        }
        else
        {
            return $reslut;
        }
    }
    function StrQuery($sql,$type=1)
    {
        $db = new MySQLi($this->host,$this->uid,$this->pwd,$this->dbname);
        $reslut = $db->query($sql);
        if($type==1)
        {
            $attr = $reslut->fetch_all();
            $str="";
            foreach($attr as $v)
            {
                $str .= implode("^",$v);
                $str .="&nbsp;|&nbsp;";
            }
            return substr($str,0,strlen($str)-1);
        }
        else
        {
            return $reslut;
        }
    }
}