<?php

    try {
        $koneksi = mysqli_connect("localhost","root","secret","testinguas2");
    }catch(Exception $e) {
        echo $e->getMessage();  
    }

