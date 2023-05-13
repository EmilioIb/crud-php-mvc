<?php
    include_once "vistas/header.php"
?>

    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="my-3">Empleados</h2>
                <button id="btn-nuevo" class="btn btn-primary py-2" onclick="mostrarForm(1)"><i class="bi bi-plus-circle me-2"></i>Nuevo</button>
            </div>
            
            <div id="div-registros">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Opciones</th>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Turno</th>
                            <th>Sueldo bruto</th>
                            <th>Frecuencia</th>
                            <th>Sueldo neto</th>
                        </tr>
                    </thead>
                    <tbody id="registros">
                        <tr>
                            <td>Juan Perez Perez</td>
                            <td>Empresambre</td>
                            <td>Nocturno</td>
                            <td>300</td>
                            <td>Quincenal</td>
                            <td>600</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="div-formulario">
                <form action="post" id="formulario">
                    <div class="row mb-3">
                        <div class="col-12 col-md-4">
                            <input type="hidden" class="form-control" id="idEmpleado" name="idEmpleado">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="Nombre" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="aPaterno" class="form-label">Apellido paterno</label>
                            <input type="text" class="form-control" id="aPaterno" name="aPaterno" aria-describedby="Apellido paterno" required>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="aMaterno" class="form-label">Apellido materno</label>
                            <input type="text" class="form-control" id="aMaterno" name="aMaterno" aria-describedby="Apellido materno" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="empresa" class="form-label">Empresa</label>
                            <select name="empresa" id="empresa" class="form-select" aria-label="Empresa" required>
                                <option value selected>Abre para seleccionar opción</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="turno" class="form-label">Turno</label>
                            <select name="turno" id="turno" class="form-select" aria-label="Turno" required>
                                <option value selected>Abre para seleccionar opción</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-6">
                            <label for="sueldo" class="form-label">Sueldo</label>
                            <input type="number" class="form-control" id="sueldo" name="sueldo" aria-describedby="Sueldo" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="frecuenciaPago" class="form-label">Frecuencia de pago</label>
                            <select name="frecuenciaPago" id="frecuenciaPago" class="form-select" aria-label="Frecuencia de pago" required>
                                <option value selected>Abre para seleccionar opción</option>
                            </select>
                        </div>
                    </div>
                    <div>
                        <button id="btnSubmit" type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Guardar</button>
                        <button type="button" class="btn btn-secondary" onclick="mostrarForm(0)"><i class="bi bi-arrow-return-left me-2"></i>Regresar</button>
                    </div>
                </form>
            </div>  
        </div>
    </div>


    <template id="templateRegistro">
        <tr>
            <td>
                <div class="btn-group" role="group" aria-label="Opciones">
                    <button type="button" class="btn-estado btn"><i class="icono-estado bi"></i></button>
                    <button type="button" class="btn-edit  btn btn-warning"><i class="bi bi-pencil"></i></button>
                    <button type="button" class="btn-delete btn btn-danger"><i class="bi bi-trash"></i></button>
                </div>
            </td>
            <td class="t_nombreEmpleado">Juan Perez Perez</td>
            <td class="t_nombreEmpresa">Empresambre</td>
            <td class="t_turno">Nocturno</td>
            <td class="t_sueldoBruto">300</td>
            <td class="t_frecuenciaPago">Quincenal</td>
            <td class="t_sueldoNeto">600</td>
        </tr>
    </template>
    

<?php
    include_once "vistas/links.php"
?>

<script type="text/javascript" src="scripts/empleados.js"></script>

<?php
    include_once "vistas/cierre.php"
?>

