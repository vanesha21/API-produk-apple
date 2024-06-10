<?php

    // header hasil berbentuk JSON
    header("Content-Type:application/json");

    // tangkap metode akses
    $method = $_SERVER['REQUEST_METHOD'];

    // variable hasil
    $result = array();

    // S: koneksi database {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "produk_apple";

     // Create connection
     $conn = new mysqli($servername, $username, $password, $dbname);
     // }  E: koneksi database

    // cek metode
    if($method=='GET'){

        // pengecekan parameter
        if (isset($_GET['id'])) {

            // tangkap parameter
            $id = $_GET['id'];

            // echo $nama;
            // die;

            $result['status'] = [
                "code" => 200,
                "description" => 'Request Valid'
            ];

            // buat query
            $sql = "SELECT * FROM macbook WHERE id_macbook='$id'";
            // eksekusi query
            $hasil_query = $conn->query($sql);

            // masukkan ke array result
            $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);
      
        }else {
            $result['status'] = [
                "code" => 400,
                "description" => 'Parameter Invalid'
            ];
        }

    }else{
        $result['status'] = [
            "code" => 400,
            "description" => 'Request Invalid'
        ];
    }

    // tampilkan dalam format json
    echo json_encode($result);
?>
