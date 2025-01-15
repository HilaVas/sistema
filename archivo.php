<?php 
if (!empty($_POST['cantidad']) && !empty($_POST['bruto'])) {
    $cantidad = $_POST['cantidad'];
    $bruto = $_POST['bruto'];
    $igv= $bruto*0.18;
    $neto= $bruto-$igv;
    } else {
        $neto=0;

         echo  $igv;
        echo $bruto;

        }
        //echo $_POST['cantidad'];
?>

