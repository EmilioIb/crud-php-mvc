<?php
    include_once "vistas/header.php"
?>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="my-3">Empresas</h2>
                <button class="btn btn-primary py-2"><i class="bi bi-plus-circle me-3"></i>Nuevo</button>
            </div>
            
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Empresambre</td>
                        <td>Callle Negreros #123 Col. Algodones</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    

<?php
    include_once "vistas/links.php"
?>

<script type="text/javascript" src="scripts/empresas.js"></script>

<?php
    include_once "vistas/cierre.php"
?>

