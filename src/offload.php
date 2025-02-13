<?php

namespace Controllers;

class Controllers {}

class DatabaseController extends Controllers
{
    public $conn;
    public $allItems;
    public $current_filter;
    public $listofItems;

    public function __construct()
    {
        $this->conn = $this->establishConnection();
    }

    private function establishConnection()
    {
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$conn) {
            $status = "Failed to establish connection to " . DB_NAME . ' via ' . DB_HOST;
            file_put_contents('connection_error_log.txt', $status);
            die($status); // Handle the error appropriately
        }
        return $conn;
    }

    public function collectList()
    {
        $table = defined('LIST_TABLE') ? LIST_TABLE : 'blog';
        $selectQuery = "SELECT * FROM " . $table;
        $results = mysqli_query($this->conn, $selectQuery);
        if ($results === false) {
            die("Error executing query: " . mysqli_error($this->conn));
        }
        $this->allItems = mysqli_fetch_all($results, MYSQLI_ASSOC);
        $this->listofItems = $this->allItems;
        return $this->listofItems;
    }

    public function isFilterApplied()
    {
        if (isset($_POST['type'])) {
            $filter = $_POST['type'];
            $list_table = LIST_TABLE;
            $filterSelectQuery = "SELECT * FROM $list_table WHERE `type` = '$filter'";
            $results = mysqli_query($this->conn, $filterSelectQuery);
            if ($results === false) {
                die("Error executing query: " . mysqli_error($this->conn));
            }
            $this->listofItems = mysqli_fetch_all($results, MYSQLI_ASSOC);
            $this->current_filter = $filter;
        } else {
            $this->collectList();
        }
        return $this->listofItems;
    }

    public function addItem($data)
    {
        $table = defined('LIST_TABLE') ? LIST_TABLE : 'blog';
        $columns = implode(", ", array_keys($data));
        $values = implode("', '", array_values($data));
        $insertQuery = "INSERT INTO $table ($columns) VALUES ('$values')";
        if (!mysqli_query($this->conn, $insertQuery)) {
            die("Error inserting data: " . mysqli_error($this->conn));
        }
        return true;
    }

    public function deleteItem($id)
    {
        $table = defined('LIST_TABLE') ? LIST_TABLE : 'blog';
        $deleteQuery = "DELETE FROM $table WHERE id = $id";
        if (!mysqli_query($this->conn, $deleteQuery)) {
            die("Error deleting data: " . mysqli_error($this->conn));
        }
        return true;
    }
}

// Initialize database connection
global $conn;
$conn = new DatabaseController();
$conn->establishConnection();
