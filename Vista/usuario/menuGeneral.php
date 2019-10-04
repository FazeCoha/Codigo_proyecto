	<?php 
	include '../../Dao/novedadDAO.php';
	include '../../Dao/novedadSPDAO.php';
include "../../config.php";
sessionValidate();
?>

<!DOCTYPE html>
<html>
<?php include FOLDER_TEMPLATE."header.php"; ?>
<body>
<?php include FOLDER_TEMPLATE."topIn.php"; ?>
<body>
    <?php 
    $novDAO = new NovedadDAO();
    $novSPDAO = new NovedadSPDAO();
    $noveReci = $novDAO->listarNovedadLeida();
    $noveReciSP = $novSPDAO->listarNovedadLeidaSP();
        
    if ($noveReci !=null || $noveReciSP !=null ) {
    $variable1='
    <script>
            Push.create("SINOVA",{
            body: "Hay novedades nuevas",
            icon: "logoProyecto.png",
            onClick: function()
            {
                window.location="../novedades/conPlaca/gestionarNovedades.php";
                this.close();
            }

            });

    </script>';
    echo $variable1; 
    }
    ?>

<?php 
if($_SESSION['rol'] == "cuentadante")
{
	include FOLDER_TEMPLATE."leftMenuCuentadante.php";
}
else
{
	include FOLDER_TEMPLATE."leftMenuColaborador.php";
}

?>

</body>
</html>