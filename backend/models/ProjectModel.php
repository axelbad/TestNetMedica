<?php
namespace App\models;

use App\interfaces\DatabaseInterface;
use PDO;

/**
 * Class ProjectAPI
 * 
 * This class provides methods to interact with the database table.
 * It allows fetching all projects or retrieving a specific project by its ID.
 */
class ProjectModel {
    /**
     * @var PDO $db The database connection instance.
     */

    private DatabaseInterface $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    /**
     * Generates a random key based on the provided medical ID and the current timestamp.
     *
     * @param int $id_medico The ID of the medical professional.
     * @return string A unique random key in the format "<id_medico>_<timestamp>".
     */
    public function generaRandomKey($id_medico): string
    {
        return $id_medico."_".time();
    }

    /**
     * Retrieves a random Medic ID.
     *
     * This method generates and returns a random integer (mocked)
     * between 1 and 100, representing a Medic ID.
     *
     * @return int The randomly generated Medic ID.
     */
    public function getMedicID(): int
    {
        return rand(1, 100); 
    }

    /**
     * Retrieves all projects from the database.
     * 
     * @return array An array of associative arrays, where each associative array
     * represents a project with the following keys:
     * - id_progetto: The ID of the project.
     * - progetto: The name of the project.
     * - performance: The performance metric of the project.
     * - img: The image associated with the project.
     * - id_medico: The ipotetical number associated at a medic
     * - random_string: A random string to identify each call
     */
    public function getAll(): array 
    {
        $id_medico = $this->getMedicID();
        $random_string = $this->generaRandomKey($id_medico);

        $stmt = $this->db->getConnection()->prepare("SELECT 
                                        id_progetto, 
                                        progetto,
                                        performance, 
                                        img, 
                                        $id_medico AS id_medico, 
                                        '$random_string' AS random_string
                                    FROM 
                                        progetti
                                ");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Retrieves a specific project by its ID.
     * 
     * @param int $id The ID of the project to retrieve.
     * 
     * @return array An associative array representing the project with the following keys:
     * 
     * - id_progetto: The ID of the project.
     * - progetto: The name of the project.
     * - performance: The performance metric of the project.
     * - img: The image associated with the project.
     * - id_medico: The ipotetical number associated at a medic
     * - random_string: A random string to identify each call
     * 
     * If no project is found, an array with an "error" key and a "Record not found" message is returned.
     */
    public function getProjectById(int $id): array 
    {
        $id_medico = $this->getMedicID();
        $random_string = $this->generaRandomKey($id_medico);

        $stmt = $this->db->getConnection()->prepare("SELECT 
                                        id_progetto, 
                                        progetto, 
                                        performance, 
                                        img,
                                        $id_medico AS id_medico, 
                                        '$random_string' AS random_string
                                    FROM 
                                        progetti 
                                    WHERE 
                                        id_progetto = :id
                                    ");

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result ?: ["error" => "Record not found"];
    }
}