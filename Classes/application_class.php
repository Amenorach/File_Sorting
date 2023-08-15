<?php

include_once(dirname(__FILE__)) . "../Settings/dbClass.php";

class applicationClass extends db_connection
{
    function add_application_cls($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sOfPurpose, $app_Pfolio)
    {
        // return true or false
        return $this->db_query(
            "INSERT INTO program_applications (`app_fname`, `app_lname`, `app_email`, `app_DOB`, `gender`, `app_residence`, `city`, `country`, `app_CV`, `app_sOfPurpose`, `app_Pfolio`) VALUES ('$app_fname', '$app_lname', '$app_email', '$app_DOB', '$gender', '$app_residence', '$city', '$country', '$app_CV', '$app_sOfPurpose', '$app_Pfolio')"
        );
    }

    function get_all_records_cls()
    {
        // return true or false
        return $this->db_query(
            "SELECT * from program_applications"
        );
    }

    function get_one_record_cls($wid)
    {
        // return true or false
        return $this->db_query(
            "SELECT * from Pr where app_id ='$wid'"
        );
    }

    function search_for_record_cls($searchkeys)
    {
        $sql = "SELECT `app_id`, `fname`, `lname`, `age`, `wk_email`, `gender`, `occupation`, `contact` , `areaofInterest`, `Pfolio` 
        FROM program_applications  
        WHERE `fname` LIKE '%$searchkeys%' or `lname` LIKE '$searchkeys' or `wk_email` LIKE '$searchkeys' or `gender` LIKE '$searchkeys' or `occupation` LIKE '$searchkeys' or `areaofInterest` LIKE '$searchkeys' or `Pfolio` LIKE '$searchkeys'";
        return $this->fetch($sql);
    }

}

?>