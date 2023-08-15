<?php

include_once(dirname(__FILE__)) . "/../Settings/dbClass.php";

class workshopClass extends db_connection
{
    function add_workshop_cls($fname, $lname, $age, $gender, $occupation, $contact, $portfolioLink, $wk_email, $areaofInterest)
    {
        // return true or false
        return $this->db_query(
            "INSERT INTO workshops (`fname`, `lname`, `age`, `gender`, `occupation`, `contact`, `Pfolio`, `wk_email`, `areaofInterest`) VALUES ('$fname', '$lname', '$age', '$gender', '$occupation', '$contact', '$portfolioLink', '$wk_email', '$areaofInterest')"
        );
    }

    function get_all_records_cls()
    {
        // return true or false
        return $this->db_query(
            "SELECT * from workshops"
        );
    }

    function get_one_record_cls($wid)
    {
        // return true or false
        return $this->db_query(
            "SELECT * from workshops where workshop_id ='$wid'"
        );
    }

    function search_for_record_cls($searchkeys)
    {
        $sql = "SELECT `workshop_id`, `fname`, `lname`, `age`, `wk_email`, `gender`, `occupation`, `contact` , `areaofInterest`, `Pfolio` 
        FROM workshops 
        WHERE `fname` LIKE '%$searchkeys%' or `lname` LIKE '$searchkeys' or `wk_email` LIKE '$searchkeys' or `gender` LIKE '$searchkeys' or `occupation` LIKE '$searchkeys' or `areaofInterest` LIKE '$searchkeys' or `Pfolio` LIKE '$searchkeys'";
        return $this->fetch($sql);
    }

}
?>