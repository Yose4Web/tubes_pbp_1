<?php
    require_once 'connection.php';

    if($con) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $noTelp = $_POST['noTelp'];
        $tglLahir = $_POST['tglLahir'];

        if($username != "" && $password != "" && $email != "" && $noTelp != "" && $tglLahir != "" ){
            $result = mysqli_query($con, 
            "INSERT INTO 
                `user`(`username`, `password`, `email`, `noTelp`, `tglLahir`) 
            VALUES 
                ('$username','$password','$email','$noTelp','$tglLahir')")
            or die(mysqli_error($con));
            
            $response = array();

            if($result){
                array_push($response, array(
                    'status' => 'OK'
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
    }

    echo json_encode(array("server_response" => $response));
    mysqli_close($con);
?>