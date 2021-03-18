<?php

namespace app;


use PDO;

class Database{


    private $dbname;
    /**
     * @var string
     */
    private $dbuser;
    /**
     * @var string
     */
    private $dbpass;
    /**
     * @var string
     */
    private $db_host;

    public function __construct($dbname, $dbuser='root', $dbpass='', $db_host='127.0.0.1')
    {
        $this->dbname = $dbname;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->db_host = $db_host;
    }


    private function getPDO()
    {



        $pdo = new PDO('mysql:dbname=blog;host=127.0.0.1',
            $user = 'root',
            $password = '');

        $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,PDO::ERRMODE_EXCEPTION);

        return $pdo;


    }

    public function query($statement, $class_name, $one = false)
    {
        $req = $this->getPDO()->query($statement);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        if ($one)
        {
            $datas = $req->fetch();
        }
        else
        {
            $datas = $req->fetchAll();
        }
        return $datas;
    }

    public function prepare($statement, $attributes, $class_name, $one)
    {
        $req = $this->getPDO()->prepare($statement);
        $req->execute($attributes);
        $req->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one)
        {
            $datas = $req->fetch();
        }
        else
        {
            $datas = $req->fetchAll();
        }
        return $datas;
    }




}