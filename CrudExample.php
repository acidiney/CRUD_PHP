<?php
/**
 * PHP 7
 * Esta classe simula um crud
 * Classe de testes
 */
    require_once "_config/DbConfig.php";

    class CrudExample {
        private $db;
        public function __construct()
        {
            $config = new DbConfig('localhost', 'root', '', 'db_test');
            $this->db = $config->getConnection();
        }

        public function getNamesFromUsersTable() {
            $query = "SELECT name FROM Users";
            try {
                $rows = mysqli_query($this->db, $query);
                return $rows->fetch_all();
            } catch (mysqli_sql_exception $ex) {
                var_dump("Opa, não consegui recuperar os valores, algo está errado", $ex);
            }
        }

        /**
         * @param array $value
         * @return array
         */
        public function insertNewValueInUsersTable(array $value) {
            $query = "INSERT INTO Users VALUES (null, '".$value['name']."')";
            return $this->baseForQueries(["query" => $query, "type" => 'inserir']);
        }

        /**
         * @param $deleteBy
         * @param $deleteItem
         * @return array
         */
        public function deleteDeterminedItem($deleteBy, $deleteItem) {
            $query = "DELETE FROM Users WHERE $deleteBy=".$deleteItem;
            return $this->baseForQueries(["query" => $query, "type" => 'deletar']);

        }

        /**
         * @param $updateBy
         * @param $updateTo
         * @return array
         */
        public function updateDeterminedItem($updateBy, $updateTo) {
            $query = "UPDATE Users SET name='".$updateTo."'WHERE id=".$updateBy;
            return $this->baseForQueries(["query" => $query, "type" => 'atualizar']);
        }

        /**
         * @param $array
         * @return array
         */
        protected function baseForQueries ($array)
        {
            $array = (object)$array;
             try {
                $rows = mysqli_query($this->db, $array->query);
                return [
                    "action" => $array->type,
                    "row" => $rows
                ];
            } catch (mysqli_sql_exception $ex) {
                var_dump("Opa, não consegui $array->type o valor, algo está errado", $ex);
            }
        }
    }

    // Test

    $instance  = new CrudExample();
    var_dump($instance->getNamesFromUsersTable());
    var_dump($instance->insertNewValueInUsersTable([ "name" => "Test2"]));
    var_dump($instance->deleteDeterminedItem('id',2));
    var_dump($instance->updateDeterminedItem(4, "Test0"));

