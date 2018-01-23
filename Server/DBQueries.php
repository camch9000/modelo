<?php
    /**
     * Queries de Base de Datos
     * Todos los queries que se realizen a base de datos deben ser creados en esta clase.
     * Solo se crean los Select y From
     */
    class DBQueries
	{
        /**
         * Constructor
         * Generalmente vacio
         */
        function __construct()
        { }
        
        /**
         * Funcion para crear el query 1
         */
        function Query1()
        {
            //Se crea el query
            $query1 = "SELECT col1, col2, col3 
                         FROM TABLA ";

            //Se retorna el query creado
            return $query1;
        }
    }
?>