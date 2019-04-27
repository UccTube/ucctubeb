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

                static::$instance = pg_connect("host=ec2-54-225-76-136.compute-1.amazonaws.com port=5432 dbname=d4sfb4ich1jnls user=mspiqmfpfrused password=117c6d8cbb98e74e26390338ca6af6e141b50cfadbcc59dc139e2c2ac0a8d4dd sslmode=require") or die("No se pudo conectar");
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