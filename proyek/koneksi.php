<?php

    try {
        $koneksi = mysqli_connect("localhost","root","","testing_uas");
    }catch(Exception $e) {
        echo $e->getMessage();  
    }

