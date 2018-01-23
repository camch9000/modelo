<?php
    /**
     * Conección con la base de datos
     * Todas las conexiones a base de datos deben realizarse en esta clase.
     * En este caso esta realizada para conectar con MySQL
     */

    //Se importa las clases necesarias
    require_once "DBQueries.php";

    class DBConnection
	{
        //Datos para la conexion a la base de datos
        //Host de la base de datos. Generalmente localhost
        var $bdHost = 'BD_HOST';
        //Nombre de la base de datos
        var $bdName = 'BD_NAME';
        //Usuario creado para el sistema en la base de datos
        var $bdUser = 'BD_USER'; 
        //Pasword del usuario
        var $bdPass = 'BD_PASSWORD';

        /**
         * Constructor
         * Generalmente vacio
         */
        function __construct()
        { }
        
        /**
         * Funcion que ejecuta el query necesario para el proceso 1
         */
        function proceso1($var1,$var2)
        {
            //LOG (ONLY TEST)
            //$myLog = fopen("log_DB1.txt", "w") or die("ERROR DB1");

            //Se instancia la clase con creación de queries
            $DBQue = new DBQueries();

            //Se crea la conexion con la base de datos
            $con = mysqli_connect($this->bdHost, $this->bdUser, $this->bdPass, $this->bdName) or die("DB_C1");
            
            //Se ejecuta el query para establecer formato a utilizar. En este caso utf8
            mysqli_query($con, "SET NAMES 'utf8'") or die("Q_DB[1-1]: ".mysqli_error());

            //Se verifica que las variables esten llenas
            if(isset($var1) && isset($var2))
            {
                //Se busca el query necesario
                $select = $DBQue->Query1();

                //Se crea el where
                $where = " WHERE var1 = ".$var1." AND
                                 var2 = ".$var2;

                //Se une el select con el where
                $query = $select . $where;

                //Si se necesita, se puede imprimir el query
                //fwrite($myLog,"Query: ".$query."\n");

                //se ejecuta el query
                $res = mysqli_query($con, $query) or die("Q_DB[1-2]: ".mysqli_error());

                //se comprueba que retorno datos
                //en caso de retornar varias filas, en vez del if se coloca un while
                if($datos = mysqli_fetch_array($res))
                {
                    //Se captura los datos que se quiera retornar
                    $datosRetorno = $datos[0];

                    //Se retorna los datos necesarios colocando el status = 0 indicando que todo se ejecuto correctamente
                    return array("status"=>0, "dataRetorno" =>$datosRetorno);       
                }
            }

            //En caso de que en alguna parte del proceso hubiera un error se coloca status = -1
            //En caso de querer gestionar mas errores, se pueden manejar otras variables o numeros a status
            return array("status"=>-1);
        }
    }
?>