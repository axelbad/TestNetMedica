<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\controllers\ProjectController;
use App\models\ProjectModel;
use App\services\Database;

/**
 * Creates a new instance of the Database class.
 * This is used to establish a connection to the database
 * and perform database operations.
 */
$database = new Database();

/**
 * Initializes a new instance of the ProjectModel class with the provided database connection.
 *
 * @var ProjectModel $projectModel An instance of the ProjectModel class.
 * @param Database $database The database connection used by the ProjectModel.
 */
$projectModel = new ProjectModel($database);

/**
 * Creates a new instance of the ProjectController class.
 *
 * @param ProjectModel $projectModel An instance of the ProjectModel class
 *                                   used to interact with project data.
 */
$controller = new ProjectController($projectModel);

/**
 * Handles the incoming request by delegating it to the appropriate controller method.
 * 
 * This method is part of the controller's responsibility to process
 * HTTP requests and generate the corresponding response.
 * 
 */
$controller->handleRequest();