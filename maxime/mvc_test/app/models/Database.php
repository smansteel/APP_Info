<?php

class Database
{
    protected $db;
    protected $results;
    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $dbuser = getenv('DB_USERNAME');
        $dbpass =  getenv("DB_PASSWORD");
        $dbport = getenv('DB_PORT');
        $dbname =  getenv("DB_NAME");
        $dbhost =  getenv("DB_HOST");
        $this->db = new mysqli($dbhost . ":" . $dbport, $dbuser, $dbpass, $dbname) or die("Connect failed: %s\n" . $this->db->error);
    }

    public function select($selected_fields, $table, $where_column, $where_value)
    {
        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table WHERE $where_column=?");
        mysqli_stmt_bind_param($stmt, "s", $where_value);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $rarray = [];
        foreach ($rows as $row) {
            $array = [];
            foreach ($selected_fields as $field) {
                array_push($array, $row[$field]);
            }
            array_push($rarray, $array);
        }
        mysqli_stmt_close($stmt);

        $this->results = $rarray;
    }


    public function ordered_select($selected_fields, $table, $where_column, $where_value, $ordering, $order_column, $limit = -1)
    {
        $limite = "";
        if ($limit != -1) {
            $limite = " LIMIT $limit";
        }

        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table WHERE $where_column=? ORDER BY $order_column $ordering $limite");
        mysqli_stmt_bind_param($stmt, "s", $where_value);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $rarray = [];
        foreach ($rows as $row) {
            $array = [];
            foreach ($selected_fields as $field) {
                array_push($array, $row[$field]);
            }
            array_push($rarray, $array);
        }
        mysqli_stmt_close($stmt);

        $this->results = $rarray;
    }
    public function return_list()
    {
        return $this->results;
    }



    public function strout()
    {
        return var_dump($this->results);
    }

    function close()
    {
        $this->db->close();
    }
}
