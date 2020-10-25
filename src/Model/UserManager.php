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

    /**
     * @param string $email
     * @return $user || false 
     */
    public function selectOneByEmail(string $email)
    {
       
    }

    /**
     * @param array $user
     * @return int 
     */
    public function insert(array $user): int
    {
        // if ($statement->execute()) {
        //     return (int)$this->pdo->lastInsertId();
        // }
    }

}
