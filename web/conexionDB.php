<?php
header('Access-Control-Allow-Origin: https://ucctubemedia.netlify.com');
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
                $database_url = "postgres://ysidyyoamevpdw:ca82bb304ca34d81fbb2202b664bd31846d5e68bfd3f0a23768bda2a51e234f4@ec2-54-221-201-212.compute-1.amazonaws.com:5432/dc3cif617368vq";
                
                static::$instance  = pg_connect(getenv($database_url)) or die ("No se pudo conectar");
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