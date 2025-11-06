<?php
session_start();
if (empty($_SESSION['nombre']) and empty($_SESSION['apellido'])) {
  header('location:login/login.php');
}

?>

<style>
  ul li:nth-child(1) .activo{
    background: rgb(11, 150, 214) !important;
  }
</style>

<!-- primero se carga el topbar -->
<?php require('./layout/topbar.php'); ?>
<!-- luego se carga el sidebar -->
<?php require('./layout/sidebar.php'); ?>

<!-- inicio del contenido principal -->
<div class="page-content">
  <h4 class="text-center text-secondary">CONTROL DE ASISTENCIA DEL PERSONAL MEDICO-ADMINISTRATIVO</h4>
  
  <?php
include "../modelo/conexion.php";
include "../controlador/controlador_eliminar.php";
  $sql=$conexion->query(" SELECT
	empleado.cargo, 
	empleado.id_empleado, 
	empleado.nombre as 'nombre_emp', 
	empleado.apellido, 
	cargo.nombre as 'nombre_cargo', 
	cargo.id_cargo, 
	asistencia.id_asistencia, 
	asistencia.entrada, 
	asistencia.id_empleado, 
	asistencia.salida
FROM
	empleado
	INNER JOIN
	cargo
	ON 
		empleado.cargo = cargo.id_cargo
	INNER JOIN
	asistencia
	ON 
		empleado.id_empleado = asistencia.id_empleado")
  ?>


  <table class="table table-bordered table-hover col-12" id= "example">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">PERSONAL</th>
      <th scope="col">CARGO</th>
      <th scope="col">ENTRADA</th>
      <th scope="col">SALIDA</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($datos = $sql->fetch_object()) {?>
      <tr>
        <td> <?= $datos->id_asistencia?> </td>
        <td> <?= $datos->nombre_emp. " ". $datos->apellido?> </td>
        <td> <?= $datos->nombre_cargo?> </td>
        <td> <?= $datos->entrada?> </td>
        <td> <?= $datos->salida?> </td>
        <td>
          <a href="inicio.php?id=<?=$datos->id_asistencia?>" onclick="advertencia(event)" class="btn btn-danger-outline"> <i class="fa-solid fa-trash-can"></i> </a>
        </td>
      </tr>
    <?php }
    ?>
    
  </tbody>
</table>

</div>
</div>
<!-- fin del contenido principal -->


<!-- por ultimo se carga el footer -->
<?php require('./layout/footer.php'); ?>