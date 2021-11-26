<?php
    class Cita {

        // Connection
        private $conn;

        // Table
        private $db_table = "citas";

        // Columns
        public $id;
        public $nombre;
        public $email; 
        public $edad;
        public $telefono;
        public $estado;
        public $motivoCita;
        public $fecha;
        public $hora;
        public $created;


        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

        // Get All Appointments
        public function getAppointments(){
            $sqlQuery = "SELECT id, nombre, email, edad, telefono, estado, motivoCita, fecha, hora , created FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }

        // Create Appointment
        public function createAppointment(){
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        nombre = :nombre, 
                        email = :email, 
                        edad = :edad, 
                        telefono = :telefono, 
                        estado = :estado, 
                        motivoCita = :motivoCita, 
                        fecha = :fecha,
                        hora = :hora,
                        created = :created";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->nombre=htmlspecialchars(strip_tags($this->nombre));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->edad=htmlspecialchars(strip_tags($this->edad));
            $this->telefono=htmlspecialchars(strip_tags($this->telefono));
            $this->estado=htmlspecialchars(strip_tags($this->estado));
            $this->motivoCita=htmlspecialchars(strip_tags($this->motivoCita));
            $this->fecha=htmlspecialchars(strip_tags($this->fecha));
            $this->hora=htmlspecialchars(strip_tags($this->hora));
            $this->created=htmlspecialchars(strip_tags($this->created));

            // bind data
            $stmt->bindParam(":nombre", $this->nombre);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":edad", $this->edad);
            $stmt->bindParam(":telefono", $this->telefono);
            $stmt->bindParam(":estado", $this->estado);
            $stmt->bindParam(":motivoCita", $this->motivoCita);
            $stmt->bindParam(":fecha", $this->fecha);
            $stmt->bindParam(":hora", $this->hora);
            $stmt->bindParam(":created", $this->created);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // Confirm Appointment
        public function confirmAppointment(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        estado = :estado, 
                    WHERE 
                        id = :id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->name=htmlspecialchars(strip_tags($this->name));
         
            // bind data
            $stmt->bindParam(":estado", $this->estado);
            if($stmt->execute()){
               return true;
            }
            return false;
        }

    }
?>