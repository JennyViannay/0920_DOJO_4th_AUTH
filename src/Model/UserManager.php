<?php

namespace App\Model;

/**
 *
 */
class UserManager extends AbstractManager
{
    /**
     *
     */
    const TABLE = 'user';

    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        parent::__construct(self::TABLE);
    }

    public function selectOneByEmail(string $email)
    {
        
    }

    public function insert(array $user)
    {
        // if ($statement->execute()) {
        //     return (int)$this->pdo->lastInsertId();
        // }
    }
}
