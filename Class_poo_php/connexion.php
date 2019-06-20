<?php

        try{
            $bdd = new PDO('mysql:dbname=albertpinot;host=ipabdd.iut-lens.univ-artois.fr','albert.pinot','O/btfYTu');
        }
        catch(PDOExeption $e){
            echo $e->getMessage();
        }

?>