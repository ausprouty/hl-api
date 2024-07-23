<?php
namespace App\Services;

use PDO;
use Exception;

class DatabaseService{

    private $host;
    private $username;
    private $password;
    private $database;
    private $port;
    private $dbConnection;

    public function __construct(){
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->username = getenv('DB_USERNAME');
        $this->password = getenv('DB_PASSWORD');
        $this->database = getenv('DB_DATABASE');
        $this->port = getenv('DB_PORT') ?: 3306; // Default to 3306 if not set
        $this->connect();
      }

    private function connect() {
      try {
          $dsn = "mysql:host={$this->host};port= {$this->port};dbname={$this->database};charset=utf8mb4";
          $this->dbConnection = new PDO($dsn, $this->username, $this->password);
          // Set PDO error mode to exception
          $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          throw new Exception("Failed to connect to the database: " . $e->getMessage());
      }
    }

   /**
     * Executes a SQL query with optional parameters.
     *
     * @param string $query The SQL query to execute.
     * @param array $params Optional parameters for prepared statement.
     * @return PDOStatement The PDOStatement object.
     * @throws Exception If query execution fails.
     */
    public function executeQuery(string $query, array $params = []) {
        try {
     
            $statement = $this->dbConnection->prepare($query);
            $statement->execute($params);
            echo sprintf($statement->rowCount() . " rows were affected");
            return $statement;
        } catch (PDOException $e) {
            throw new Exception("Error executing the query: " . $e->getMessage());
        }
    }

    /**
     * Closes the database connection.
     */
    public function closeConnection() {
        $this->dbConnection = null;
    }
}
