const registros = document.getElementById("registros");
const templateRegistro = document.getElementById("templateRegistro").content;

$(document).ready(function () {
  mostrarForm(0);
  listar();

  $("#formulario").on("submit", function (e) {
    guardaryeditar(e);
  });

  $.post("ajax/turnos.php?op=selectTurnos", function (r) {
    $("#turno").append(r);
  });

  $.post("ajax/empresas.php?op=selectEmpresas", function (r) {
    $("#empresa").append(r);
  });

  $.post("ajax/frecuenciaPago.php?op=selectFrecuencias", function (r) {
    $("#frecuenciaPago").append(r);
  });
});

function listar() {
  const fragment = document.createDocumentFragment();
  registros.textContent = "";

  $.post("ajax/empleados.php?op=listar", function (data) {
    data = JSON.parse(data);
    data.forEach((empleado) => {
      const clone = templateRegistro.cloneNode(true);

      clone
        .querySelector(".btn-edit")
        .setAttribute("onclick", `mostrar(${empleado[0]})`);

      clone
        .querySelector(".btn-delete")
        .setAttribute("onclick", `eliminar(${empleado[0]})`);

      const btnEstado = clone.querySelector(".btn-estado");
      const iconoEstado = clone.querySelector(".icono-estado");

      if (empleado[7]) {
        btnEstado.setAttribute("onclick", `desactivar(${empleado[0]})`);
        btnEstado.classList.add("btn-danger");
        iconoEstado.classList.add("bi-x-circle");
      } else {
        btnEstado.setAttribute("onclick", `activar(${empleado[0]})`);
        btnEstado.classList.add("btn-success");
        iconoEstado.classList.add("bi-check-circle");
      }

      clone.querySelector(".t_nombreEmpleado").textContent = empleado[1];
      clone.querySelector(".t_nombreEmpresa").textContent = empleado[2];
      clone.querySelector(".t_turno").textContent = empleado[3];
      clone.querySelector(".t_sueldoBruto").textContent = empleado[4];
      clone.querySelector(".t_frecuenciaPago").textContent = empleado[5];
      clone.querySelector(".t_sueldoNeto").textContent = empleado[6];
      fragment.appendChild(clone);
    });
    registros.appendChild(fragment);
  });
}

function mostrarForm(flag) {
  $("#formulario")[0].reset();
  if (flag) {
    $("#div-formulario").show();
    $("#div-registros").hide();
    $("#btn-nuevo").hide();
    $("#btnSubmit").prop("disabled", false);
  } else {
    $("#div-formulario").hide();
    $("#div-registros").show();
    $("#btn-nuevo").show();
  }
}

function guardaryeditar(e) {
  e.preventDefault();
  $("#btnSubmit").prop("disabled", true);

  var formData = new FormData($("#formulario")[0]);

  $.ajax({
    url: "ajax/empleados.php?op=guardaryeditar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (data) {
      Swal.fire({
        icon: "success",
        title: "Completado",
        text: data,
      });
      listar();
      mostrarForm(false);
    },
    error: function (data) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: data,
      });
      $("#btnSubmit").prop("disabled", false);
    },
  });
}

function mostrar(id) {
  $.post("ajax/empleados.php?op=mostrar", { idEmpleado: id }, function (data) {
    data = JSON.parse(data);
    mostrarForm(true);
    $("#idEmpleado").val(data.idEmpleado);
    $("#nombre").val(data.nombre);
    $("#aPaterno").val(data.apellidoPaterno);
    $("#aMaterno").val(data.apellidoMaterno);
    $("#sueldo").val(data.sueldo);
    $("#empresa").val(data.idEmpresa);
    $("#frecuenciaPago").val(data.idFrecuenciaPago);
    $("#turno").val(data.idTurno);
  });
}

function eliminar(id) {
  Swal.fire({
    title: "Esta seguro de eliminar al empleado?",
    text: "Este cambio es irreversible!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "ajax/empleados.php?op=eliminar",
        { idEmpleado: id },
        function (data) {
          Swal.fire({
            icon: "success",
            title: "Eliminado",
            text: data,
          });
          listar();
        }
      );
    }
  });
}

function activar(id) {
  Swal.fire({
    title: "Esta seguro de activar al empleado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "ajax/empleados.php?op=activar",
        { idEmpleado: id },
        function (data) {
          Swal.fire({
            icon: "success",
            title: "Activado",
            text: data,
          });
          listar();
        }
      );
    }
  });
}

function desactivar(id) {
  Swal.fire({
    title: "Esta seguro de desactivar al empleado?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Sí",
    cancelButtonText: "No",
  }).then((result) => {
    if (result.isConfirmed) {
      $.post(
        "ajax/empleados.php?op=desactivar",
        { idEmpleado: id },
        function (data) {
          Swal.fire({
            icon: "success",
            title: "Desactivado",
            text: data,
          });
          listar();
        }
      );
    }
  });
}
