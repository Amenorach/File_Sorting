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

    function get_all_Arecords_cls()
    {
        // return true or false
        return $this->db_query(
            "SELECT * from program_applications"
        );
    }

    function get_one_record_cls($aid)
    {
        // return true or false
        return $this->db_query(
            "SELECT * from program_applications where app_id ='$aid'"
        );
    }

    function search_for_Arecord_cls($searchkeys)
    {
        $sql = "SELECT `app_id`, `app_fname`, `app_lname`, `app_email`, `app_DOB`, `gender`, `app_residence`, `city`, `country`, `app_CV`, `app_sOfPurpose`, `app_Pfolio` 
        FROM program_applications  
        WHERE `app_fname` LIKE '%$searchkeys%' or `app_lname` LIKE '$searchkeys' or `gender` LIKE '$searchkeys' or `city` LIKE '$searchkeys' or `country` LIKE '$searchkeys' or `app_sOfPurpose` LIKE '$searchkeys' or `app_CV` LIKE '$searchkeys'";
        return $this->fetch($sql);
    }

}

?>