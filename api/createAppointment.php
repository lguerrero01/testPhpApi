<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/database.php';
    include_once '../class/citas.php';

    $database = new Database();
    $db = $database->getConnection();

    $item = new Cita($db);

    $data = json_decode(file_get_contents("php://input"));
    
    $item->nombre = $data->nombre;
    $item->email = $data->email;
    $item->edad = $data->edad;
    $item->telefono = $data->telefono;
    $item->estado = $data->estado;
    $item->motivoCita = $data->motivoCita;
    $item->fecha = $data->fecha;
    $item->hora = $data->hora;
    $item->created = date('Y-m-d H:i:s');
    
    if($item->createAppointment()){
        echo 'Appointment created successfully.';
    } else{
        echo 'Appointment could not be created.';
    }
?>