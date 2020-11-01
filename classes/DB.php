<?php

namespace classes;

use PDO;

class DB
{
    private static $_instance;

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'testdb';
    private const DB_USER = 'postgres';
    private const DB_PASS = '';

    /**
     * DB constructor.
     */
    private function __construct()
    {

        self::$_instance = new PDO(
            'pgsql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME,
            self::DB_USER,
            self::DB_PASS,
            [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]
        );
    }

    /**
     * @return PDO
     */
    public static function getInstance(): PDO
    {
        if (self::$_instance == null) {
            new self();
        }

        return self::$_instance;
    }
}