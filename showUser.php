<?php
require_once 'connection.php';

    if($con) {
        $id = $_GET['id'];

        $query = "SELECT * FROM user WHERE id = '$id'";
        $result = mysqli_query($con, $query);
        $response = array();

        $row = mysqli_num_rows($result);

        if($row > 0){
            $data = mysqli_fetch_array($result);
            array_push($response, array(
                "id" => $data[0],
                "username" => $data[1],
                "password" => $data[2],
                "email" => $data[3],
                "noTelp" => $data[4],
                "tglLahir" => $data[5],
            ));
        }else{
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    }else{
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }

    echo json_encode(array("server_response" => $response));
    mysqli_close($con);
?>