    <script type="text/javascript">
        <?php if($_SESSION['tipoResult']){ ?>
        function cargarAlerta()
        {   
            <?php if($_SESSION['msjResult']!=null){ ?>
            swal("Exito","<?=$_SESSION['msjResult']?>","success");
            <?php $_SESSION['msjResult'] = null; } ?>
        }
        <?php } else { ?>
        function cargarAlerta()
        {   
            <?php if($_SESSION['msjResult']!=null){ ?>
            swal("Algo ha ido mal","<?=$_SESSION['msjResult']?>","error");
            <?php $_SESSION['msjResult'] = null; } ?>
        }
    	<?php } ?>

    </script>