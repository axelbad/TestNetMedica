<?php

/**
 * Interface DatabaseInterface
 *
 * This interface defines the contract for database connection handling.
 * Any class implementing this interface must provide a method to retrieve
 * a PDO connection instance.
 *
 * @package App\interfaces
 */

namespace App\interfaces;

use PDO;

interface DatabaseInterface
{
    public function getConnection(): PDO;
}