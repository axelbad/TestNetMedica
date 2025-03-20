<?php

namespace App\config;

/**
 * Class DatabaseConfig
 *
 * This class contains the configuration constants for database connection.
 *
 * Constants:
 * - DB_HOST: The hostname or IP address of the database server.
 * - DB_NAME: The name of the database to connect to.
 * - DB_USER: The username for database authentication.
 * - DB_PASS: The password for database authentication.
 */
class DatabaseConfig
{
    public const DB_HOST = 'mariadb';
    public const DB_NAME = 'NetMedicaTest';
    public const DB_USER = 'root';
    public const DB_PASS = 'admin';
}