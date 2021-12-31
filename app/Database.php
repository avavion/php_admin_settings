<?php

class Database
{
    // Храним инициализацию класса PDO
    private PDO $link;

    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return void
     */
    private function connect()
    {
        try {
            $host = "localhost";
            $dbname = "admin";
            $username = "root";
            $password = "";

            $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8";

            $this->setLink(new PDO($dsn, $username, $password));
            $this->getLink()->exec('SET NAMES utf8');

        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

    /**
     * @return PDO
     */
    public function getLink(): PDO
    {
        return $this->link;
    }

    /**
     * @param PDO $link
     */
    public function setLink(PDO $link): void
    {
        $this->link = $link;
    }
}