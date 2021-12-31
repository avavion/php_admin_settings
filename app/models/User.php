<?php

class User extends Database
{
    // Default User table for MySQL
    private string $table = 'users';

    // Init Database->connect()
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        $users = parent::getLink()->query("SELECT * FROM `{$this->getTable()}`")->fetchAll(PDO::FETCH_ASSOC);

        if (!$users) $users = [];

        return $users;
    }

    /**
     * @param int $id
     * @return array
     */
    public function getById(int $id): array
    {
        $state = parent::getLink()->prepare("SELECT * FROM `{$this->getTable()}` WHERE `id` = :id");
        $state->execute(array('id' => $id));

        $user = $state->fetch(PDO::FETCH_ASSOC);

        if (!$user) $user = array();

        return $user;
    }

    /**
     * @param string $email
     * @return array
     */
    public function getByEmail(string $email): array
    {
        $state = parent::getLink()->prepare("SELECT * FROM `{$this->getTable()}` WHERE `email` = :email");
        $state->execute(array('email' => $email));

        $user = $state->fetch(PDO::FETCH_ASSOC);

        if (!$user) $user = array();

        return $user;
    }

    /**
     * @param array $user
     * @return int
     */
    public function create(array $user): int
    {
        $fields = array_map(fn($field) => "`{$field}`", array_keys($user));
        $labels = array_map(fn($field) => ":{$field}", array_keys($user));

        $state = parent::getLink()->prepare("INSERT INTO `{$this->getTable()}`(" . implode(",", $fields) . ") VALUES (" . implode(",", $labels) . ")");
        $state->execute($user);

        return parent::getLink()->lastInsertId();
    }

    /**
     * @param int $id
     * @return array
     */
    public function deleteById(int $id): array
    {
        $user = $this->getById($id);

        $state = parent::getLink()->prepare("DELETE FROM `{$this->getTable()}` WHERE `id` = :id");
        $state->execute(array('id' => $id));

        return $user;
    }

    /**
     * @param string $email
     * @return array
     */
    public function deleteByEmail(string $email): array
    {
        $user = $this->getByEmail($email);

        $state = parent::getLink()->prepare("DELETE FROM `{$this->getTable()}` WHERE `email` = :email");
        $state->execute(['email' => $email]);

        return $user;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }
}