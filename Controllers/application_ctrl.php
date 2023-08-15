<?php 
//connect to the user account class
require_once(dirname(__FILE__)) . '/../Classes/application_class_class.php';

//--INSERT--//
// add to database
function add_application_ctr($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sofPurpose, $app_Pfolio){
    $insert= new applicationClass();
    return $insert->add_application_cls($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sofPurpose, $app_Pfolio);
}

function get_all_Arecords_ctr()
{
    //create an instance of the class
    $item_object = new applicationClass();

    //run the method
    $item_records = $item_object->get_all_Arecords_cls();

    //check if the method worked
    if ($item_records) {
        //return all the data
        return $item_object->db_fetch_all();
    } else {
        //no data found
        return false;
    }
}

function get_one_record_ctr($aid)
{
    //create an instance of the class
    $item_object = new applicationClass();

    //run the method
    $item_records = $item_object->get_one_record_cls($aid);

    //check if the method worked
    if ($item_records) {
        //return all the data
        return $item_object->db_fetch_one();
    } else {
        //no data found
        return false;
    }
}

function search_for_Arecord_ctr($searchkeys)
{
    $one_crop = new applicationClass();
    return $one_crop->search_for_Arecord_cls($searchkeys);
}

?>