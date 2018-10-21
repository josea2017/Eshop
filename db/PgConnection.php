<?php

require_once 'DbConnection.php';

    class PgConnection extends DbConnection
    {
        
        private $connection;
        
         function __construct($server, $port, $user, $password, $database)
        {
            parent::__construct($server, $port, $user, $password, $database);
        }


        public function connect() {
          $this->connection = pg_connect("host=$this->server port=$this->port user=$this->user password=$this->password dbname=$this->database");
        }


        public function disconnect()
        {
            pg_close($this->connection);
        }
        //obtener
        public function runQuery($sql, $params = [])
        {
            return pg_fetch_all(pg_query_params($this->connection, $sql, $params));
        }
        public function runStatement($sql, $params = [])
        {
            pg_prepare($this->connection, "my_query", $sql);
            $results = pg_execute($this->connection, "my_query", $params);
            pg_query('DEALLOCATE "my_query"');
            return $results;
        }
    }
