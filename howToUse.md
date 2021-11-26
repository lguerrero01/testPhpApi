1# Correr con el comando: php -S 127.0.0.1:8080

#Endpoints para probar con Postman: 

#Crear Cita (POST)
    http://localhost:8080/api/createAppointment.php

#json: 
{
    "nombre": "nombre"
    "email": "email"
    "edad": "edad"
    "telefono": "telefono"
    "estado": "estado"
    "motivoCita": "motivoCita"
    "fecha": "fecha"
    "hora": "hora"
    "created": "create"
}

#Confirmar Cita (UPDATE)
    http://localhost:8080/api/confirmAppointment.php
    
#json: 
{
    "estado": "cita confirmada"
}

#Obtener todas las citas (GET)
    http://localhost:8080/api/getAppointments.php


