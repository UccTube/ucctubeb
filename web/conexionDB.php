<?php
    header('Access-Control-Allow-Origin: *');
    class Db_conexion{
        /** 
         * Instancia singleton de la base de datos
         * @var Database
        */
        private static $instance;
        /**
         * Desactivar la instanciacion
         */
        private function __construct(){}
        /**
         *  Crear o devolver la instancia de la base de datos
         * 
         *  @return Database
        */    
        public static function getInstance(){
            if(is_null(static::$instance)){
                $host = "ec2-54-221-201-212.compute-1.amazonaws.com";
                $dbname = "dc3cif617368vq";
                $port = "5432";
                $user = "ysidyyoamevpdw";
                $password = "ca82bb304ca34d81fbb2202b664bd31846d5e68bfd3f0a23768bda2a51e234f4";
                
                static::$instance  = pg_connect("host = $host port=$port  dbname=$dbname user=$user password=$password sslmode=require") or die ("No se pudo conectar");
            }
            
            return static::$instance;
            
        }
        /**
         * Desactivar la clonacion de la clase
         */
        final public function __clone(){
            throw new Exception("Acción inválida");
        }
        /**
         * Descativar la llamada de esta clase
         * 
         * @return void
         */
        final public function __wakeup(){
            throw new Exception("Acción inválida");
        }
    }

?>