<?php

if (!empty($_POST["btnmodificar"])) {
    if (!empty($_POST["txtnombre"])) {
        $id=$_POST["txtid"];
        $Nombre=$_POST["txtnombre"];
        $verificarNombre=$conexion->query(" SELECT count(*) as 'total' from cargo where nombre='$Nombre' and id_cargo=$id ");
        if ($verificarNombre->fetch_object()-> total > 0) { ?>
            <script>
             $(function notificacion(){
                 new PNotify({
                     title: "ERROR",
                     type: "error",
                     text: "El cargo <?= $Nombre?> ya existe",
                     styling: "bootstrap3"
                 })
             })
         </script> 
         <?php } else {
            $sql=$conexion->query("UPDATE cargo set nombre='$Nombre' where id_cargo=$id");
            if ($modificar == true) { ?>
                <script>
                $(function notificacion(){
                    new PNotify({
                        title: "CORRECTO",
                        type: "success",
                        text: "El cargo se ha modificado correctamente",
                        styling: "bootstrap3"
                    })
                })
            </script>
        <?php } else { ?>
            <script>
            $(function notificacion(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "El cargo no se ha modificado",
                    styling: "bootstrap3"
                })
            })
        </script>
        <?php }
            
        }
        
    } else { ?>
        <script>
            $(function notificacion(){
                new PNotify({
                    title: "ERROR",
                    type: "error",
                    text: "Los campos estan vacios",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } ?>

    <script>
        setTimeout(() => {
            window.history.replaceState(null,null,window.location.pathname);
        }, 0);
    </script>

<?php }

?>