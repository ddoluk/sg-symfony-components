<?php

namespace Core;

use PDO;
use PDOException;

class Database extends PDO
{
    private static $instance;

    public function __construct()
    {
        try {

            require_once __DIR__ . '/../../app/config/db.php';

            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            );

            $dsn = DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;

            parent::__construct($dsn, DB_USER, DB_PASSWD, $opt);

        } catch (PDOException $e) {

            echo $e->getMessage();

        }
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}