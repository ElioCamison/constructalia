<?php


    class Mysql extends Connection
    {

        private $connection;
        private $strQuery;
        private $arrValues;

        function __construct()
        {
            $this->connection = new Connection();
            $this->connection = $this->connection->connect();
        }

        // Insertar un registro
        public function insert(string $query, array $arrValues)
        {
            $this->strQuery = $query;
            $this->arrValues = $arrValues;

            $insert = $this->connection->prepare($this->strQuery);
            $resultInsert = $insert->execute($this->arrValues);

            if($resultInsert)
            {
                $lastInsert = $this->connection->lastInsertId();
            } else {
                $lastInsert=0;
            }
            return $lastInsert;
        }

        // Buscar un registro
        public function select(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetch(PDO::FETCH_ASSOC);
            return $data;
        }

        // Devuelve todos los registros
        public function selectAll(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $result->execute();
            $data = $result->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }

        // Actualizar registros
        public function update(string $query, array $arrValues)
        {
            $this->strQuery = $query;
            $this->arrValues = $arrValues;
            $update = $this->connection->prepare($this->strQuery);
            $result = $update->execute($this->arrValues);
            return $result;
        }

        // Elimina un registro
        public function delete(string $query)
        {
            $this->strQuery = $query;
            $result = $this->connection->prepare($this->strQuery);
            $delete = $result->execute();
            return $delete;
        }



    }



?>