<?php
require_once 'connection.php';

    if($con) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($con, $query);
        $response = array();

        $row = mysqli_num_rows($result);

        if($row > 0){
            $data = mysqli_fetch_array($result);
            array_push($response, array(
                "id" => $data[0],
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