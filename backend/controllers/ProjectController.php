<?php

namespace App\controllers;

use App\models\ProjectModel;

class ProjectController
{
    /**
     * @var ProjectModel $projectModel An instance of the ProjectModel class used to interact with project data.
     */
    private ProjectModel $projectModel;

    /**
     * ProjectController constructor.
     *
     * Initializes the controller with a ProjectModel instance.
     *
     * @param ProjectModel $projectModel The model instance used for project-related operations.
     */
    public function __construct(ProjectModel $projectModel)
    {
        $this->projectModel = $projectModel;
    }

    /**
     * Handles incoming HTTP requests and returns JSON responses based on the request type.
     *
     * This method processes the `type` and `id` parameters from the GET request to determine
     * the appropriate action. It supports fetching all projects or a single project by ID.
     * The response is always in JSON format.
     *
     * GET Parameters:
     * - type (string): The type of request. Possible values:
     *   - 'all': Fetch all projects.
     *   - 'single': Fetch a single project by ID.
     * - id (int|null): The ID of the project to fetch (required if `type` is 'single').
     *
     * Responses:
     * - If `type` is 'all':
     *   - Returns a JSON-encoded array of all projects.
     * - If `type` is 'single' and a valid `id` is provided:
     *   - Returns a JSON-encoded object of the project if found.
     *   - Returns a JSON-encoded error message if the project is not found.
     * - If `type` is invalid or `id` is missing for 'single':
     *   - Returns a JSON-encoded error message indicating an invalid request.
     * - On exception:
     *   - Returns a JSON-encoded error message with the exception details.
     */
    public function handleRequest(): void
    {
        header('Content-Type: application/json');

        $type = $_GET['type'] ?? 'all';
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        try {
            
            if ($type === 'all') {

                echo json_encode($this->projectModel->getAll());

            } elseif ($type === 'single' && $id !== null) {

                $project = $this->projectModel->getProjectById($id);

                if ($project) {
                    echo json_encode($project);
                } else {
                    echo json_encode(['error' => 'Record not found']);
                }

            } else {
                echo json_encode(['error' => 'Invalid request']);
            }

        } catch (\Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}