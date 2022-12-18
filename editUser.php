<?php
    require_once 'connection.php';

    if($con){
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $noTelp = $_POST['noTelp'];
        $tglLahir = $_POST['tglLahir'];

        $getData = "SELECT * FROM user WHERE id = '$id'";

        if ($id != "" && $username != "" && $password != "" && $email != "" && $noTelp != "" && $tglLahir != "") {
            $result = mysqli_query($con, $getData);
            $rows = mysqli_num_rows($result);
            $response = array();

            if ($rows > 0) {
                $update = "UPDATE `user` SET `username`='$username',`password`='$password',`email`='$email',`noTelp`='$noTelp',`tglLahir`='$tglLahir' WHERE `id`=$id";
                $exequery = mysqli_query($con, $update);

                if ($exequery) {
                    array_push($response, array(
                        'status' => 'OK'
                    ));
                } else {
                    array_push($response, array(
                        'status' => 'FAILED'
                    ));
                }
            } else {
                array_push($response, array(
                    'status' => 'FAILED'
                ));
            }
        } else {
            array_push($response, array(
                'status' => 'FAILED'
            ));
        }
    } else {
        array_push($response, array(
            'status' => 'FAILED'
        ));
    }

    echo json_encode(array("server_response" => $response));
    mysqli_close($con);
?>