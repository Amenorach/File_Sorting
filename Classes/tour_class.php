<?php

include_once(dirname(__FILE__)) . "/../Settings/dbClass.php";

class tourClass extends db_connection
{
    function add_tour_cls($rep_fname, $rep_lname, $org_name, $age_range, $population, $tour_purpose, $arrival_date, $arrival_time, $expectations)
    {
        // return true or false
        return $this->db_query(
            "INSERT INTO educational_tour (`rep_fname`, `rep_lname`, `org_name`, `age_range`, `population`, `tour_purpose`, `arrival_date`, `arrival_time`, `expectations`) VALUES ('$rep_fname', '$rep_lname', '$org_name', '$age_range', '$population', '$tour_purpose', '$arrival_date', '$arrival_time', '$expectations')"
        );
    }

    function get_all_trecords_cls()
    {
        // return true or false
        return $this->db_query(
            "SELECT * from educational_tour"
        );
    }

    function get_one_trecord_cls($tid)
    {
        // return true or false
        return $this->db_query(
            "SELECT * from educational_tour where tour_id ='$tid'"
        );
    }

    function search_for_trecord_cls($searchkeys)
    {
        $sql = "SELECT `tour_id`, `rep_fname`, `rep_lname`, `org_name`, `age_range`, `population`, `tour_purpose`, `arrival_date` , `arrival_time`, `expectations` 
        FROM educational_tour 
        WHERE `rep_fname` LIKE '%$searchkeys%' or `rep_lname` LIKE '$searchkeys' or `org_name` LIKE '$searchkeys' or `age_range` LIKE '$searchkeys' or `arrival_date` LIKE '$searchkeys' or `tour_purpose` LIKE '$searchkeys' or `population` LIKE '$searchkeys'";
        return $this->fetch($sql);
    }

}
?>