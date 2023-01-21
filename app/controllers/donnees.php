<?php
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
      $ordering = "ASC";
      $order_column = "ordre";
      $db->ordered_select($selected_fields, $table, $where_column, $where_value, $ordering, $order_column);


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

      $airq_array = [];
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

        $airq_latest = $db->return_list()[0];
        array_push($airq_array, $airq_latest[0]);
        $db->close();
      }

      array_push($megarray, [$stations, $ligne_infos, $airq_array]);
    }


    $this->view('header_footer/header_donnees');
    $this->view('donnees/index', ['megarray' => $megarray]);
    $this->view('header_footer/footer');
  }
}
