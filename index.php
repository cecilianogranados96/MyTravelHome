<?php 


    include "php/header.php";


    include "html/header.php";

    if(isset($_GET['pag'])){
        if (file_exists("php/".$_GET['pag'].".php")) {
           include "php/".$_GET['pag'].".php";
        }
        if (file_exists("html/".$_GET['pag'].".php")) {
           include "html/".$_GET['pag'].".php";
        }else{
            include "html/inicio.php";
        }  
    }else{
        include "html/inicio.php";    
    }
    include "html/fotter.php";
?>
