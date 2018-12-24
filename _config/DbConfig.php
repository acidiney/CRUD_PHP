<?php

class DbConfig {

     static $instance = false;
    /**
     * @var string
     */
    /**
     * DbConfig constructor.
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $database
     * @param string $port
     */
    function __construct(string $host, string $user, string $password, string $database, $port = "3306") {
        define("host", $host);
        define("user", $user);
        define("pwd", $password);
        define("database", $database);
        define("port", $port);
    }

    /**
     * Faz a conexão com o banco de dados
     * e retorna ela
     */
    public function getConnection () {
       if(!DbConfig::$instance) {
           try {
               DbConfig::$instance = mysqli_connect(
                   constant("host"),
                   constant("user"),
                   constant("pwd"),
                   constant("database"),
                   constant("port")
               );
               return DbConfig::$instance;

           } catch (mysqli_sql_exception $ex) {
               var_dump("Aconteceu um erro:", $ex);
           }
       } else {
           return DbConfig::$instance;
       }
    }

}