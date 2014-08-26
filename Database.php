<?php
    class Database {

        // Variable for the connection status
        private $_connStatus = false;

        // This variable stores the MySQLi connection data
        private $_connData;
        
        // Establish a connection with the server
        public function __construct() {
            $conn = new MySQLi('localhost', 'root', '', 'test');
            if ($conn->connect_errno) {
                die($conn->connect_errno);
            } else {
                $this->_connStatus = true;
                $this->_connData = $conn;
            }
        }
        
        // Returns status of connection
        public function getConnectionStatus() {
            return $this->_connStatus;
        }
        
        // Returns the object of the MySQLi connection
        public function getConnectionData() {
            return $this->_connData;
        }

        // Fetches all data from a table, and returns the searching value as an array element
        public function getAllDataFromTable($table, $searchData) {
            $statement = $this->_connData->query("SELECT * FROM " . $table . "");
            $count = $statement->num_rows;

            if ($count == 0) {
                die ("No data found in table:" . $table . "!");
            } else {
                while ($result = $statement->fetch_assoc()) {
                    echo $result[$searchData] . "\r\n";
                }
            }
        }
    }