<?php
    class Database {

        // Variable for the connection status
        private $_connStatus = false;

        // This variable stores the MySQLi connection data
        private $_connData;
        
        /*
            * Establish connection with the server
            * Example usage: $class = new Database();
            * Return values: Only return value is, when the inital connection hits an error
        */
        public function __construct() {
            $conn = new MySQLi('localhost', 'root', '', 'test');
            if ($conn->connect_errno) {
                die($conn->connect_errno);
            } else {
                $this->_connStatus = true;
                $this->_connData = $conn;
            }
        }
        
        /*
            * Returns the current status of the connection
            * Example usage: echo $class->getConnectionStatus();
            * Return values: 'True' -> If connection is OK or 'False' -> If connection has a problem
        */
        public function getConnectionStatus() {
            return $this->_connStatus;
        }
        
        /*
            * Returns the current connection data
            * Example usage (For custom queries): $statement = mysqli_query($class->getConnectionData(), "Query goes here...");
            * Return values: All data you can get from the Appache server
        */
        public function getConnectionData() {
            return $this->_connData;
        }

        /*
            * Returns a specified data from a specified table
            * Example usage: $class->getDataFromTable('Users', 'id');
            * Return values: Returns a string with all id's from the 'Users' table
        */
        public function getDataFromTable($table, $searchData) {
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

        /*
            * Inserts certain data to a table specified by the user
            * $table - specify the table in which you want to insert data 
            * $fields - string in which the user types the columns which he wants to affect in Database
            * $data - string in which the user types the data that he wants to insert into the Database
            * Example usage: $class->insertDataIntoTable('users', 'id, username, password, email', '$id, $username, $email');
            * Return values: 'True' -> If query was OK or 'False' -> If query had a problem
        */
        public function insertDataIntoTable($table, $fields, $data) {
            
        }
    }