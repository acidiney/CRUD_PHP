<?php
    require_once "_config/DbConfig.php";

    class CrudExample {
        private $db;
        public function __construct()
        {
            $config = new DbConfig('localhost', 'root', '', 'db_test');
            $this->db = $config->getConnection();
        }

        public function getNamesFromUsersTable() {
            $query = "SELECT names FROM Users";

            $rows = mysqli_query($this->db, $query);

            return $rows->fetch_all();
        }
    }

    // Test

    $instance  = new CrudExample();
    var_dump($instance->getNamesFromUsersTable());