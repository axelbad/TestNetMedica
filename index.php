<?php include 'header.php'; ?>

    <h1 class="text-center mb-4">Progetti Medici</h1>
    <div class="table-container">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Progetto</th>
                    <th>Performance</th>
                    <th>Immagine</th>
                </tr>
            </thead>
            <tbody id="projects-table-body">
                <!-- I dati verranno caricati dinamicamente -->
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
    <script>
        $(document).ready(function () {
            loadProjects();
        });
    </script>
    
<?php include 'footer.php'; ?>