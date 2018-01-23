<?php
    /**
     * Gestion de la información.
     * Toda manipulación de datos se debe realizar en esta clase.
    */

    //Se realiza la importación de las clases que se utilizaran
    require_once "DB_Connection.php";
    require_once "ExternalConnection.php";

    class Manager
	{
        /**
         * Constructor
         * Generalmente vacio
         */
        function __construct()
        { }
        
        /**
         * Funciones llamadas por el Control
         */
        
        
        function proceso1($var1,$var2)
        {
            //LOG (ONLY TEST)
            //$myLog = fopen("log_manager1.txt", "w") or die("ERROR M1");

            //Se instancia la clase con la conexion a base de datos
            $DBCon = new DB_Connection();

            //Los datos de entrada pueden necesitar algun proceso que se puede realizar en este punto.

            //Se llama la funcion con el proceso a seguir
            $res = $DBCon->proceso1($var1,$var2);

            //Los datos que retorne el proceso pueden necesitar algun proceso que se puede realizar en este punto.

            //Devolver los datos al control
            return $res;

        }

        /**
         * Funciones de procesamiento interna
         * Aqui se pueden colocar funciones que son llamadas por esta misma clase para realizar algun proceso
         */
        private function procesoInterno($var1, $var2)
        {
            $var3 = $var1 + $var2;

            return $var3;
        }

    }
?>