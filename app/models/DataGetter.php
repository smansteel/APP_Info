<?php
require("Database.php");
class DataGetter
{

    protected $urlApi;
    protected $data;
    const TEAM_NUMBER = "9999";
    const SENSORS_MAP = ["sound" => 1, "bpm" => 2, "hum" => 3, "temp" => 4];
    protected $trame;
    protected $db;

    public function __construct()
    {   $this->db = new Database();
        $this->db->connect();
        $this->db->checkTable();
        $this->urlApi = "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=" . self::TEAM_NUMBER;
        $this->getData();
    }

    public function getData(){
        try{
        $this->trame = file_get_contents($this->urlApi);
        $this->data = [];
        $pattern = '/1' . self::TEAM_NUMBER . '.*?(?=1' . self::TEAM_NUMBER . '|$)/s';
        preg_match_all($pattern, $this->trame, $matches);
        $foundFrames = $matches[0];
        
        foreach ($foundFrames as $frame) {
            $sensorInfos = $this->processFrame($frame);
            if ($sensorInfos) {
                array_push($this->data, $sensorInfos);
                $this->db->insertRawData(self::TEAM_NUMBER, strtotime($sensorInfos["date"]->format('Y-m-d H:i:s')), $sensorInfos["sensorValue"], $sensorInfos["sensorID"]);
            }
        }

        echo "trame : ";
          } catch (Exception $e) {
            echo "Failed to fetch data from ISEP server : " . $e->getMessage() . ". Please check that ISEP correctly opened port 22 👀👀", 1, true;
            return false;
        }
    }

    private function processFrame($frame)
    {
        $data = sscanf($frame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
        $sensorValue = hexdec($data[5]);
        $sensorID = $data[3];

        if ($data[0] != "1" && $data[0] != "2") {
            return null;
        }

        if ($data[1] != self::TEAM_NUMBER) {
            return null;
        }

        if ($data[2] != "1") {
            return null;
        }

        if ($this->isDateCorrect($data[8], $data[9], $data[10], $data[11], $data[12], $data[13])) {
            $date = date_create($data[8] . "-" . $data[9] . "-" . $data[10] . " " . $data[11] . ":" . $data[12] . ":" . $data[13]);
        } else {
            $date = new DateTime();
        }

        if ($sensorValue <= 0) {
            return null;
        }

        return ["sensorID" =>$sensorID, "sensorValue" => $sensorValue, "date"=> $date];
    }

     private function isDateCorrect($year, $month, $day, $hours, $min, $seconds)
    {
        if ($year === null || $month === null || $day === null || $hours === null || $min === null || $seconds === null) {
            return false; // At least one value is null
        }

        if (!checkdate($month, $day, $year)) {
            return false; // Invalid date
        }

        if ($hours < 0 || $hours > 23 || $min < 0 || $min > 59 || $seconds < 0 || $seconds > 59) {
            return false; 
        }

        return true; 
    }

    
}
