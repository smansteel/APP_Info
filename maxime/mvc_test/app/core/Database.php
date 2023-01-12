<?php

class Database
{
    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function connect()
    {
        $dbuser = getenv('DB_USERNAME');
        $dbpass =  getenv("DB_PASSWORD");
        $dbport = getenv('DB_PORT');
        $dbname =  getenv("DB_NAME");
        $dbhost =  getenv("DB_HOST");
        $db = new mysqli($dbhost . ":" . $dbport, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $conn->error);
        return $db;

    }

    public function select( $selected_fields, $table ,$where_column, $where_value)
    {
        $stmt = mysqli_prepare($this->db, "SELECT ". implode(", ",$selected_fields) ."FROM $table WHERE $where_column=?");
        mysqli_stmt_bind_param($stmt, "s", $where_value);
        mysqli_stmt_execute($stmt);

        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $rarray= [];
        foreach ($rows as $row) {
            $array= [];
            foreach ($selected_fields as $field) {
                array_push($array, $row[$field]);
            }
            array_push($rarray, $array);
            
        }
        mysqli_stmt_close($stmt);
    
    }

    function close()
{
    $this->close();
}

}

