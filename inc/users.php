
<?php
session_start();

function fullNameValidation($name){
    $isUserNameValid = false;
    if (strlen($name) >= 4 && strlen($name) <= 30){
        for($i = 0; $i < strlen($name); $i++){
            if (ctype_alnum($name[$i]) || $name[$i] == ' '){
                $isUserNameValid = true;
            }else{
                $isUserNameValid = false;
                return ($isUserNameValid);
            }
        }
    }else{
        return ($isUserNameValid);
    }
    return $isUserNameValid;
}

function passValidation($pass){
    $isPassValid = false;
    if (strlen($pass) >= 12 && strlen($pass) <= 50 && !ctype_alnum($pass)){
        $isPassValid = true;
    }
    return $isPassValid;
}

function isDataRepeat($name, $email){
    $dataOfJson = file_get_contents('users.json');
    $dataOfJson = json_decode($dataOfJson, true);

    foreach($dataOfJson as $dataJson){
        if ($name == $dataJson['fullName'] || $email == $dataJson['emailAddress']){
            return false;
        }
    }
    return true;
}

function registerAddUser($formData){
    $getDataFromJson = file_get_contents('users.json');
    $getDataFromJson = json_decode($getDataFromJson, true);

    array_push($getDataFromJson, $formData);

    file_put_contents('users.json', json_encode($getDataFromJson));

    return true;
}

function register($formData){
    $getDataFromJson = file_get_contents('users.json');
    $getDataFromJson = json_decode($getDataFromJson, true);

    array_push($getDataFromJson, $formData);

    file_put_contents('users.json', json_encode($getDataFromJson));

    header('Location: http://localhost/Tasks/register&&login/login.php');
}

function validate_login($email, $password){
    $existData = false;
    $dataToCheck = file_get_contents('users.json');
    $dataToCheck = json_decode($dataToCheck, true);

    foreach($dataToCheck as $users){
        if ($email == $users['emailAddress'] && $password == $users['password']){
            $_SESSION['user'] = $users['fullName'];
            $existData = true;
        }
    }
    return $existData;
}

?>

