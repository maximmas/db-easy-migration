<?php
/*
 * DB driver
 *
 * */

namespace DEM;


final class DB
{

    protected static self $instance;

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize singleton");
    }


    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {

            self::$instance = new static();
        }
        return self::$instance;
    }

    public function connect(): ?\PDO
    {

        try {

            $options = [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            ];

            $pdo = new \PDO(
                "mysql:host=" . DEM_DB_HOST . ";dbname=" . DEM_DB_NAME,
                DEM_DB_USER,
                DEM_DB_PASSWORD,
                $options);

        } catch (\PDOException $e) {
            echo "DB connect error" . $e->getMessage();
        }

        return $pdo ?? null;

    }

}