<?php

class Conexion
{
    private static $db = 'bodega';
    private static $server = "localhost\SQLEXPRESS,1433";#servidor\instancia,numero de puerto( por defecto es 1433 )
    private static $user = 'root';
    private static $passwd = 'sandino';
    private static $cont  = null;
    private static $conec_info=  null;

    public function __construct() {
        die('Init function is not allowed');
    }
    public static function Conectar()
    {
       if ( null == self::$cont )
       {     
        try
        {
          self::$conec_info = array("Database"=> self::$db ,"UID"=> self::$user ,"PWD"=> self::$passwd );
          self::$cont =   sqlsrv_connect( self::$server, self::$conec_info ); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
    public static function Desconectar()
    {
        sqlsrv_close( self::$cont );
        self::$cont = null;
    }
}

