<?php
    /**
     * Control de Servidor
     * Debe recibir todas las llamadas del cliente y enviarlas al su proceso correspondiente 
     */

    //LOG (ONLY TEST)
    //$myLog = fopen("log_Control.txt", "w") or die("ERROR C01");

    //Importar clase Manager
    require_once 'Manager.php';

    //Instanciamos la clase manager
    $manager = new Manager();

    //Optenemos la variable OPTION la cual nos indica el proceso a seguir
    $option = $_POST["OPTION"];

    //fwrite($myLog,"OPTION: ".$option."\n");

    //Verificamos si la variable option tiene algun valor
    if(isset($option))
    {
        //Realizamos la busqueda del proceso segun la opción dada por la variable
        switch($option)
        {
            /**
             * Proceso 1
             */
            case "1":   //Se optienen las variables que se enviaron del cliente
                        $var1 = $_POST["VAR1"];
                        $var2 = $_POST["VAR2"];

                        //se valida que las variables tienen valor
                        if(isset($var1) && isset($var2))
                        {
                            //Se realiza el llamado al proceso correspondiente en el gestor
                            //Se asigna el retorno a una variable.
                            $json_return = $manager->proceso1($var1,$var2);
                        }

                        break;
        }
    }
    else
        //En el caso de que no se envie variable option
        $json_return = array("ERROR"=>"C-O");

    //fwrite($myLog,"RESULT: ".json_encode($json_return, JSON_PRETTY_PRINT)."\n");

    //Se declara la cabecera para definir el tipo de objeto retornado al cliente
    //En este caso json
    header('Content-Type: application/json');

    //Se realiza la converción a json de la variable retornada y se envia al cliente
    echo json_encode($json_return);
?>