<?php

require_once(__DIR__."/../../vendor/catfan/medoo/medoo.php");

abstract class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbname = "post_de_noticias";
    private $port = "3306";
    private $charset = "utf8";
    private $prefix = "";
    protected $database = NULL;

    public function open()
    {
    	$this->database = new medoo([
            'database_type' => 'mysql',
            'database_name' => $this->dbname,
            'server' => $this->host,
            'username' => $this->user,
            'password' => $this->password,
            'port' => $this->port,
            'charset' => $this->charset,
            'prefix' => $this->prefix,
            'option' => [
                PDO::ATTR_CASE => PDO::CASE_NATURAL,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
         ]
		]);

        return $this->database;
    }
}
