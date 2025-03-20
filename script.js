
/**
 * Fetches project data from the backend and populates the projects table.
 * 
 * This function sends an AJAX request to retrieve project data in JSON format
 * from the backend endpoint `backend/index.php?type=all`. It then dynamically
 * updates the table body with the project details, including performance
 * indicators and an image for each project.
 * 
 * Performance levels are color-coded:
 * - Red (`text-danger`) for performance < 33%
 * - Yellow (`text-warning`) for performance between 33% and 66%
 * - Green (`text-success`) for performance > 66%
 * 
 * Each project row includes:
 * - Project ID
 * - Project name
 * - Performance percentage
 * - Project image
 */
function loadProjects() {
    const tableBody = $('#projects-table-body');
    tableBody.html('<tr><td colspan="4" class="text-center">Caricamento in corso...</td></tr>');

    $.getJSON('backend/index.php?type=all', function (projects) {
        tableBody.empty();

        projects.forEach(proj => {
            let performanceColor = 'text-success';
            if (proj.performance < 33) {
                performanceColor = 'text-danger';
            } else if (proj.performance >= 33 && proj.performance <= 66) {
                performanceColor = 'text-warning';
            }

            const row = `
                <tr class="table-row" data-id="${proj.id_progetto}">
                    <td>${proj.id_progetto}</td>
                    <td>${proj.progetto}</td>
                    <td class="${performanceColor} fw-bold">${proj.performance}%</td>
                    <td><img src="${proj.img}" alt="Immagine progetto"></td>
                </tr>
            `;
            tableBody.append(row);
        });

        // Aggiungi evento click alle righe
        $('.table-row').on('click', function () {
            const id = $(this).data('id');
            window.location.href = `dettagli.php?id=${id}`;
        });
    }).fail(function () {
        tableBody.html('<tr><td colspan="4" class="text-center text-danger">Errore nel caricamento dei dati.</td></tr>');
    });
}

/**
 * Loads and displays the details of a project by making an API call.
 *
 * @param {number} id - The unique identifier of the project to load.
 *
 * @description
 * This function fetches project details from the backend API using the provided project ID.
 * It updates the DOM with the project information, including the project ID, title, performance,
 * and image. If the performance value is below 33%, it is styled as "text-danger"; between 33% 
 * and 66% as "text-warning"; and above 66% as "text-success". If an error occurs during the 
 * API call or the project data contains an error, an error message is displayed.
 *
 * @example
 * loadProjectDetails(1);
 */
function loadProjectDetails(id) {
    
    // Effettua la chiamata all'API
    $.getJSON(`backend/index.php?type=single&id=${id}`, function (project) {
        if (project.error) {
            $('#error-message').text(project.error).removeClass('d-none');
        } else {
            // Popola i dettagli del progetto
            $('#project_id').text(project.id_progetto);
            $('#project_title').text(project.progetto);
            $('#project_performance')
                .text(`${project.performance}%`)
                .addClass(
                    project.performance < 33
                        ? 'text-danger'
                        : project.performance <= 66
                        ? 'text-warning'
                        : 'text-success'
                );
            $('#project_image').attr('src', project.img);
            $('#project_details').removeClass('d-none');
            $('#project_random_string').text(project.random_string);
            $('#project_id_medico').text(project.id_medico);
        }
    }).fail(function () {
        $('#error-message').text('Errore nel caricamento dei dati.').removeClass('d-none');
    });
}
