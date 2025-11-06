<?php

if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["txtnombre"])) {
        $nombre=$_POST["txtnombre"];
        $verificarNombre=$conexion->query(" select count(*) as 'total' from cargo where nombre='$nombre'");
        if ($verificarNombre->fetch_object()->total > 0) { ?>
            <script>
             $(function notificacion(){
                 new PNotify({
                     title: "ERROR",
                     type: "error",
                     text: "Este cargo <?= $nombre ?> ya existe",
                     styling: "bootstrap3"
                 })
             })
         </script> 
         <?php } else {
                    $sql=$conexion->query("INSERT into cargo(nombre) value('$nombre')");
                    if ($sql == true) { ?>
                        <script>
                         $(function notificacion(){
                             new PNotify({
                                 title: "CORRECTO",
                                 type: "success",
                                 text: "Este cargo fue registrado correctamente",
                                 styling: "bootstrap3"
                             })
                         })
                     </script> 
                     <?php } else { ?>
            <script>
             $(function notificacion(){
                 new PNotify({
                     title: "INCORRECTO",
                     type: "error",
                     text: "Este cargo no fue registrado",
                     styling: "bootstrap3"
                 })
             })
         </script> 
         <?php }
                    
        }
        
        if ($sql == true) { ?>
            <script>
            $(function notificacion(){
                new PNotify({
                    title: "CORRECTO",
                    type: "success",
                    text: "Cargo registrado correctamente",
                    styling: "bootstrap3"
                })
            })
        </script>
    <?php } else { ?>
            <script>
            $(function notificacion(){
                new PNotify({
                    title: "INCORRECTO",
                    type: "error",
                    text: "No se registro el cargo",
                    styling: "bootstrap3"
                })
            })
        </script>
        <?php }
        
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