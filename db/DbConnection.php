<?php

namespace Db{

    abstract class DbConnection
    {
        protected $server;
        protected $port;
        protected $user;
        protected $password;
        protected $database;

        function __construct($server, $port, $user, $password, $database)
        {
            $this->server = $server;
            $this->port = $port;
            $this->user = $user;
            $this->password = $password;
            $this->database = $database;
        }

        abstract public function connect();
        abstract public function disconnect();
        abstract public function runQuery($sql, $params = []);
        abstract public function runStatement($sql, $params = []);
    }
}