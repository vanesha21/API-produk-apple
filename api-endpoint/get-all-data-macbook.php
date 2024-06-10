<?php
    // header hasil berbentuk JSON
    header("Content-Type:application/json");

    // tangkap key
    $header = apache_request_headers();
    $key = $header['key'];

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
    
    // cek user
    $sql = "SELECT * FROM user WHERE key_token='$key'";
    $user = $conn->query($sql);

    if ($user->num_rows > 0) {
        // user valid
        // cek metode
        if($method=='GET'){
            // jika metode sesuai
            $result['status'] = [
                "code" => 200,
                "description" => 'Request Valid'
            ];

            // buat query
            $sql = "SELECT * FROM macbook";
            // eksekusi query
            $hasil_query = $conn->query($sql);

            // masukkan ke array result
            $result['results'] = $hasil_query->fetch_all(MYSQLI_ASSOC);

        }else{
            $result['status'] = [
                "code" => 400,
                "description" => 'Request Not Invalid'
            ];
        }
    } else {
        $result['status'] = [
            "code" => 400,
            "description" => 'API Key/Token Not Valid'
        ];
    }

    // tampilkan dalam format json
    echo json_encode($result);
?>
