<?php
class Averager
{
    public function fromArray($rows)
    {
        if (!empty($rows)) {
            $date = [[getdate(time() - 518400)["yday"], getdate(time() - 518400)["year"]], [getdate(time() - 432000)["yday"], getdate(time() - 432000)["year"]], [getdate(time() - 345600)["yday"], getdate(time() - 345600)["year"]], [getdate(time() - 259200)["yday"], getdate(time() - 259200)["year"]], [getdate(time() - 172800)["yday"], getdate(time() - 172800)["year"]], [getdate(time() - 86400)["yday"], getdate(time() - 86400)["year"]], [getdate(time())["yday"], getdate(time())["year"]]];
            $weekdays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
            $dayoffset = array_search(date('l'), $weekdays);

            $array = [];
            //décalage du jour de la semaine
            for ($i = 1; $i < 8; $i++) {
                array_push($array, $weekdays[($dayoffset + $i) % 7]);
            }
            // création de l'array
            $average = [
                "Monday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []],
                "Tuesday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []],
                "Wednesday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []],
                "Thursday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []],
                "Friday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []],
                "Saturday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []],
                "Sunday" => ["date" => [], "airq_air" => [], "airq_cardiac" => [], "airq_db" => []]
            ];
            // ajoute les données dans leur array respectif
            foreach ($rows as $row) {
                $timetolastweek = 604800 - (86400 - (time() % 86400));
                if ($row["time"] >= ($timetolastweek)) {
                    $jour = date("l", $row["time"]);
                    array_push($average[$jour]["date"], $row["time"]);
                    array_push($average[$jour]["airq_air"], $row["airq_air"]);
                    array_push($average[$jour]["airq_cardiac"], $row["airq_db"]);
                    array_push($average[$jour]["airq_db"], $row["airq_db"]);
                }
            }
            // fait une airq_dbyenne de chaque donnée et la push dans la BDD
            $airq_dbyenne = [];
            for ($i = 0; $i < 7; $i++) {
                $jour = $average[$array[$i]];
                if (!count($jour["airq_air"]) == 0) {
                    $date_for = $date[$i];
                    $jour = $average[$array[$i]];
                    $airq_air = array_sum($jour["airq_air"]) / count($jour["airq_air"]);
                    $airq_cardiac = array_sum($jour["airq_cardiac"]) / count($jour["airq_cardiac"]);
                    $airq_db = array_sum($jour["airq_db"]) / count($jour["airq_db"]);
                    $airq_dbyenne[$date[$i][1] . $date[$i][0]] = ["air" => $airq_air, "cardiac" => $airq_cardiac, "db" => $airq_db];
                }
            }
            return $airq_dbyenne;
        } else {
            return [];
        }
    }
}
