<?php
class DataConvertor
{
    protected $data;
    public $clean_data;
    protected $team_num;
    protected $map = ["ISO" => 1, "CO2" => 2, "tmp" => 3, "hum" => 4, "mic" => 5, "hrt" => 6];
    protected $map_count = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];
    protected $db;
    protected $sorted_data = [1 => 0, 2 => 0, 3 => 0, 4 => 0, 5 => 0, 6 => 0];

    public function __construct($team_num)
    {
        $this->team_num = $team_num;
        $this->db = new Database();
        $this->db->connect();
        $this->db->checkTable();
        $this->db->close();

        $this->data = $this->getRecent();
        $clean_data = $this->cleanData();
        //var_dump($this->clean_data);
    }

    private function getRecent()
    {
        $this->db->connect();
        $this->db->getLastDay($this->team_num);
        $data = $this->db->return_list();
        if (!$data) {
            return false;
        }
        $this->db->close();
        return $data;
    }

    private function cleanData()
    {
        $clean_data = [];
        if(!$this->data) {
            return false;
        }
        foreach ($this->data as $row) {
            $this->addValue($row["type"], $row["data"]);
        }
        foreach ($this->map as $key => $value) {
            $clean_data[$key] = $this->average($value);
        }
        $this->clean_data = $clean_data;
    }

    private function addValue($type, $value)
    {
        $this->sorted_data[$type] += $value;
        $this->map_count[$type]++;
    }

    private function average($type)
    {
        return $this->sorted_data[$type] / $this->map_count[$type];
    }
}
