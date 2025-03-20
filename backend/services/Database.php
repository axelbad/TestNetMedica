<?php

namespace App\services;

use App\config\DatabaseConfig;
use App\interfaces\DatabaseInterface;
use PDO;
use PDOException;

/**
 * Class Database
 * 
 * This class provides a database connection implementation using PDO.
 * It implements the DatabaseInterface and allows connecting to a MySQL database
 * using configuration parameters provided during instantiation.
 */

 class Database implements DatabaseInterface
 {
     private static ?PDO $connection = null;
 
     public function getConnection(): PDO
     {
         if (self::$connection === null) {
             try {
                 self::$connection = new PDO(
                     'mysql:host=' . DatabaseConfig::DB_HOST . ';dbname=' . DatabaseConfig::DB_NAME . ';charset=utf8',
                     DatabaseConfig::DB_USER,
                     DatabaseConfig::DB_PASS
                 );
                 self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             } catch (PDOException $e) {
                 throw new \Exception('Database connection failed: ' . $e->getMessage());
             }
         }
 
         return self::$connection;
     }
 }