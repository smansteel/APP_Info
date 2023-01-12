<?php

// function get_station($ligne)
//   {
//     $conn = OpenCon();
//     $rarray = [];
//     $order_array = [];
//     $hasy = false;
//     $rarray_w_branch = [];
//     $stmt4 = mysqli_prepare($conn, "SELECT nom, branche FROM stations WHERE ligne=? ORDER BY ordre");
//     mysqli_stmt_bind_param($stmt4, "s", $ligne);
//     mysqli_stmt_execute($stmt4);
//     mysqli_stmt_bind_result($stmt4, $nom, $branch);
//     while (mysqli_stmt_fetch($stmt4)) {
//       array_push($rarray, $nom);
//       array_push($rarray_w_branch, [$nom, $branch]);
//       if ($branch != "") {
//         $hasy = true;
//       }
//     }
//     mysqli_stmt_close($stmt4);
//     if ($hasy) {
//       return [$rarray_w_branch, $hasy];
//     } else {
//       return [$rarray, $hasy];
//     }
//   }

// function get_station_id($station_name)
//   {
//     $conn = OpenCon();
//     $rarray = [];
//     $stmt5 = mysqli_prepare($conn, "SELECT id FROM stations WHERE nom=? ");
//     mysqli_stmt_bind_param($stmt5, "s", $station_name);
//     mysqli_stmt_execute($stmt5);
//     mysqli_stmt_bind_result($stmt5, $id);
//     while (mysqli_stmt_fetch($stmt5)) {
//       $rarray = $id;
//     }
//     mysqli_stmt_close($stmt5);
//     return $rarray;
//   }




// function get_airq_for_id($station_id)
//   {
//     $conn = OpenCon();
//     $rarray = [];
//     $stmt6 = mysqli_prepare($conn, "SELECT airq FROM air_quality WHERE station=? ORDER BY time DESC LIMIT 1");
//     mysqli_stmt_bind_param($stmt6, "i", $station_id);
//     mysqli_stmt_execute($stmt6);
//     mysqli_stmt_bind_result($stmt6, $airq);
//     while (mysqli_stmt_fetch($stmt6)) {
//       array_push($rarray, $airq);
//     }
//     mysqli_stmt_close($stmt6);

//     $robject = end($rarray);
//     return $robject;
//   }


// function get_line_logo($ligne)
//   {
//     $conn = OpenCon();

//     $stmt4 = mysqli_prepare($conn, "SELECT lien_logo, hex_color, light_hex FROM metro_line WHERE id=?");
//     mysqli_stmt_bind_param($stmt4, "s", $ligne);
//     mysqli_stmt_execute($stmt4);
//     mysqli_stmt_bind_result($stmt4, $logolink, $hex_code, $light_hex);
//     while (mysqli_stmt_fetch($stmt4)) {
//       $rarray = [$logolink, $hex_code, $light_hex];
//     }
//     return $rarray;
//   }


class Donnees extends Controller
{
  public function index()
  {

    $ligne_liste = ["1", "2", "3", "3bis", "4", "5", "6", "7bis", "9", "11", "12", "14"];

    $this->model('Database');
    $megarray = [];

    foreach ($ligne_liste as $ligne) {
      $stations = [];
      $ligne_infos = [];
      $airq_latest = [];

      // Getting stations
      $db = new Database;
      $selected_fields =  ["nom", "id"];
      $table = "stations";
      $where_column = "ligne";
      $where_value = $ligne;
      $db->select($selected_fields, $table, $where_column, $where_value);

      $stations = $db->return_list();

      $db->close();


      $result = [[], []];
      $keys = array_keys($stations);
      array_map(function ($item) use (&$result, &$keys) {
        $key = array_shift($keys);
        $result[0][$key] = $item[0];
        $result[1][$key] = $item[1];
      }, $stations);

      $stations = [$result[0], $result[1]];
      echo $ligne;


      //getting line infos
      $db = new Database;

      $selected_fields =  ["lien_logo", "hex_color", "light_hex"];
      $table = "metro_line";
      $where_column = "ID";
      $where_value = $ligne;
      $db->select($selected_fields, $table, $where_column, $where_value);

      $ligne_infos = $db->return_list();
      $db->close();

      // getting airq

      foreach ($stations[1] as $id) {
        $db = new Database;

        $selected_fields =  ["airq"];
        $table = "air_quality";
        $where_column = "station";
        $where_value = $id;
        $ordering = "DESC";
        $order_column = "time";
        $limit = 1;
        $db->ordered_select($selected_fields, $table, $where_column, $where_value, $ordering, $order_column, $limit);

        $airq_latest = $db->return_list();
        $db->close();
      }
      array_push($megarray, [$stations, $ligne_infos, $airq_latest]);
    }
    //var_dump($megarray);

    $this->view('header_footer/header');
    $this->view('donnees/index', ['megarray' => $megarray]);
    $this->view('header_footer/footer');
  }
}
