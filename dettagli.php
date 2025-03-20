<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : null;

include 'header.php'; 
?>

<h1 class="text-center mb-4">Dettagli Progetto</h1>
<div id="project_details" class="card mx-auto d-none shadow-lg" style="max-width: 700px;" data-id="<?= htmlspecialchars($id) ?>" data-token="<?= htmlspecialchars($token) ?>">
    <div class="row g-0">
        <div class="col-md-4 text-center p-3">
            <img id="project_image" alt="Immagine progetto" class="img-fluid rounded" style="max-height: 200px;">
        </div>
        <div class="col-md-8">
            <div class="card-body" style="text-align: center;">
                <h5 class="card-title text-primary" id="project_title"></h5>
                <hr />
                <div class="row">
                    <div class="col-6">
                        <p class="card-text">
                            <strong>ID Progetto:</strong><br>
                            <span id="project_id" class="fw-bold"></span>
                        </p>
                        <p class="card-text">
                            <strong>Performance:</strong><br>
                            <span id="project_performance"></span>
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="card-text">
                            <strong>ID medico:</strong><br>
                            <span id="project_id_medico"></span>
                        </p>
                        <p class="card-text">
                            <strong>String identifier:</strong><br>
                            <span id="project_random_string"></span>
                        </p>
                    </div>
                </div>
                <a href="index.php" class="btn btn-outline-primary mt-3">Torna alla lista</a>
            </div>
        </div>
    </div>
</div>
<div id="error-message" class="alert alert-danger d-none mt-4 text-center"></div>
<script src="script.js"></script>
<script>
$(document).ready(function () {
    const id = $('#project_details').data('id');

    // Carica i dettagli del progetto
    if (id) {
        loadProjectDetails(id);
    } else {
        $('#error-message').text('Parametri mancanti!').removeClass('d-none');
    }
});
</script>

<?php include 'footer.php'; ?>