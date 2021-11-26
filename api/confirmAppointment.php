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
    
    $item->id = $data->id;
    
    // Appointment value
    $item->estado = $data->estado;
    
    if($item->confirmAppointment()){
        echo json_encode("Appointment confirmed");
    } else{
        echo json_encode("Appointment confirmed");
    }
