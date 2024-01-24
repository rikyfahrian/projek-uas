<?php

    try {
        $koneksi = mysqli_connect("localhost","root","secret","staginguas");
    }catch(Exception $e) {
        echo $e->getMessage();  
    }

