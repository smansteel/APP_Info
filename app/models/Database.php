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

    public function gen()
    {

        for ($i = 0; $i < 1000; $i++) {
            $time = time() - rand(0, 604000);
            $co2 = rand(0, 100);
            $mo = rand(0, 100);
            $decibel = rand(0, 100);
            $stmt = mysqli_prepare($this->db, "INSERT INTO `capteurs_qualite` ( `capteur_id`, `time`, `airq_air`, `airq_db`, `airq_cardiac`) VALUES (3, " . $time . ", $co2, $mo, $decibel);");
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
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

    public function select_fields($selected_fields, $table, $where_column, $where_value)
    {

        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table WHERE $where_column=?");
        mysqli_stmt_bind_param($stmt, "s", $where_value);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        mysqli_stmt_close($stmt);

        $this->results = $rows;
    }

    public function select_fields_nw($selected_fields, $table)
    {
        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table");
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        mysqli_stmt_close($stmt);

        $this->results = $rows;
    }

    public function update($update_fields, $update_fields_value, $table, $where_column, $where_value)
    {
        $for_str = $update_fields[0] . " = ? ";
        for ($i = 1; $i < sizeof($update_fields); $i++) {
            $field = $update_fields[$i];
            $for_str = $for_str . ", $field = ? ";
        }
        array_push($update_fields_value, $where_value);
        $stmt = mysqli_prepare($this->db, "UPDATE $table SET " .  $for_str . " WHERE $where_column=?");
        mysqli_stmt_execute($stmt, $update_fields_value);
        mysqli_stmt_close($stmt);
    }




    public function select_where_not_null($selected_fields, $table, $where_value)
    {
        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table WHERE ? IS NOT NULL");
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


    public function insert_one($table, $field, $field_value)
    {

        $stmt = $this->db->prepare("INSERT INTO $table ($field) VALUES (?)");
        $stmt->bind_param("s", $field_value);
        $stmt->execute();
        $stmt->close();
    }
    public function insert($table, $field, $field_value)
    {

        $stmt = $this->db->prepare("INSERT INTO $table (" . implode(", ", $field) . ") VALUES (?" . str_repeat(" ,? ", sizeof($field_value) - 1) . ")");
        $stmt->execute($field_value);
        $stmt->close();
    }

    public function delete($table, $where_field, $where_value)
    {

        $stmt = $this->db->prepare("DELETE FROM $table WHERE $where_field= ?");
        $stmt->bind_param("s", $where_value);
        $stmt->execute();
        $stmt->close();
    }

    public function select_etoile($selected_fields, $table)
    {
        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table");
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

    public function select_etoile_fields($selected_fields, $table)
    {
        $stmt = mysqli_prepare($this->db, "SELECT " . implode(", ", $selected_fields) . " FROM $table");
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        mysqli_stmt_close($stmt);

        $this->results = $rows;
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
