<?php
include 'services\connection.php';

$editForm = false;
$service="";
$date="";
$time="";

if (isset($_POST['new_user_register'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $connection->query("INSERT INTO user (name, surname, birthdate, phone, email, password) VALUE('$name', '$surname', '$birthdate', '$phone', '$email', '$password')") or die($connection->error);
    header("location: login.php");
}

if (isset($_POST['edit_user_info'])) {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $connection->query("UPDATE user SET name='$name', surname='$surname', birthdate='$birthdate', phone='$phone', email='$email', password='$password' WHERE user_id='$id'") or die($connection->error);
    header("location: profile.php");
}

if (isset($_GET['delete'])) {
    $appointment_id = $_GET['delete'];
    $connection->query("DELETE FROM appointment WHERE appointment_id = '$appointment_id'") or die($connection->error);
    header("location: appointments.php");
}

if (isset($_GET['edit'])) {
    $appointment_id = $_GET['edit'];
    $result = $connection->query("SELECT * FROM appointment WHERE appointment_id = '$appointment_id'") or die($connection->error);
    if($result){
        $row = $result->fetch_array();
        $editForm = true;
        $service = $_GET['service'];
        $date = $row['date'];
        $time = $row['time'];
        $idd = $_GET['edit'];
    }else{}
}

if (isset($_POST['editing_appointment'])) {
    $appointment_id = $_POST['update_id'];
    $newDate = $_POST['update_date'];
    $newTime = $_POST['update_time'];

    $connection->query("UPDATE appointment SET date='$newDate', time='$newTime' WHERE appointment_id='$appointment_id'") or die($connection->error);
   
    header("location: appointments.php");
}

if (isset($_POST['create_appointment'])) {
    $user_id = $_POST['user'];
    $service = $_POST['newService'];
    $date = $_POST['newDate'];
    $time = $_POST['newTime'];
    $connection->query("INSERT INTO appointment (user_id, service, date, time) VALUE('$user_id', '$service', '$date', '$time')") or die($connection->error);
   
    header("location: appointments.php");
}

if (isset($_POST['admin_edit_user'])) {
    $id = $_POST['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];

    $connection->query("UPDATE user SET name='$name', surname='$surname', birthdate='$birthdate', phone='$phone', email='$email', password='$password' WHERE user_id='$id'") or die($connection->error);
    header("location: admin.php");
}

if (isset($_GET['deleteUser'])) {
    $user_id = $_GET['deleteUser'];
    $connection->query("DELETE FROM user WHERE user_id = '$user_id'") or die($connection->error);
    header("location: admin.php");
}

if (isset($_POST['admin_create_appointment'])) {
    $user_id = $_POST['user'];
    $service = $_POST['newService'];
    $date = $_POST['newDate'];
    $time = $_POST['newTime'];
    $connection->query("INSERT INTO appointment (user_id, service, date, time) VALUE('$user_id', '$service', '$date', '$time')") or die($connection->error);
   
    header("location: admin.php");
}

if (isset($_POST['newservicetodb'])) {
    $service = $_POST['service'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $connection->query("INSERT INTO service (name, category, description, availability, price) VALUE('$service', '$category', '', '1', '$price')") or die($connection->error);
    header("location: admin.php");
}

if (isset($_GET['service_id'])) {
    $service_id = $_GET['service_id'];

    $connection->query("DELETE FROM service WHERE id = '$service_id'") or die($connection->error);
    header("location: admin.php");
}

if (isset($_GET['edit_service_id'])) {
    header("location: admin.php/#addservices");
}

if (isset($_POST['admin_edit_service'])) {
    $id = $_POST['service_id'];
    $service = $_POST['service'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $connection->query("UPDATE service SET name='$service', price='$price', category='$category' WHERE id='$id'") or die($connection->error);
    header("location: admin.php");
}

if (isset($_GET['appointment_id'])) {
    $id = $_GET['appointment_id'];
    $connection->query("DELETE FROM appointment WHERE appointment_id = '$id'") or die($connection->error);
    header("location: admin.php");
}

?>