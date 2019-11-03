<?php

/**
 * 适配器模式 将不同操作方法统一成一个操作方法 具体实现对外透明
 * 关键点：interface
 * User: songjq
 * Date: 2019/10/31
 * Time: 11:37
 */
interface Target
{
    public function conn($host, $user, $pwd, $dbname);

    public function query($sql);

    public function close();
}

class MysqliDriver implements Target
{
    protected $conn;

    public function conn($host, $user, $pwd, $dbname)
    {
        $this->conn = mysqli_connect($host, $user, $pwd, $dbname);
    }

    public function query($sql)
    {
        return mysqli_query($this->conn, $sql);
    }

    public function close()
    {
        mysqli_close($this->conn);
    }

}

class PdoDriver implements Target
{
    protected $conn;

    public function conn($host, $user, $pwd, $dbname)
    {
        $this->conn = new PDO("mysql:host={$host};dbname={$dbname}", $user, $pwd);
    }

    public function query($sql)
    {
        $this->conn->query($sql);
    }

    public function close()
    {
        $this->conn = null;
    }
}

class DataBase
{
    protected $Db;

    public function __construct($type)
    {
        $this->Db = new $type;
    }

    public function conn($host, $user, $pwd, $dbname)
    {
        $this->Db->conn($host, $user, $pwd, $dbname);
    }

    public function query($sql)
    {
        return $this->Db->query($sql);
    }

    public function close()
    {
        $this->Db->close();
    }
}

$DbMsqli = new DataBase('MysqliDriver');
//$DbPdo   = new DataBase('PdoDriver');
$Db->conn('127.0.0.1', 'root', '', 'test');
$Db->query('select * from test');
$Db->close();
