<?php
    /**
     * Conecciones a otros sistemas
     * Toda conección a sistemas externos debe realizarse a través de esta clase
     */
    class ExternalConnection
	{
        /**
         * Constructor
         * Generalmente vacio
         */
        function __construct()
        { }
        
        function external1($var)
        {
            //se realiza la llamada al sistema externo de acuerdo a los requisitos
            $llamada = null;
            
            //se retorna el resultado
            return $llamada;
        }
    }
?>