<?php 
//connect to the user account class
require_once(dirname(__FILE__)) . '/../Classes/workshop_class.php';

//--INSERT--//
// add to database
function add_workshop_ctr($fname, $lname, $age, $gender, $occupation, $contact, $wk_email, $areaofInterest, $portfolioLink)
{
    $insert = new workshopClass();
    return $insert->add_workshop_cls($fname, $lname, $age, $gender, $occupation, $contact, $wk_email, $areaofInterest, $portfolioLink);
}

function get_all_records_ctr()
{
    //create an instance of the class
    $item_object = new workshopClass();

    //run the method
    $item_records = $item_object->get_all_records_cls();

    //check if the method worked
    if ($item_records) {
        //return all the data
        return $item_object->db_fetch_all();
    } else {
        //no data found
        return false;
    }
}

function get_one_record_ctr($wid)
{
    //create an instance of the class
    $item_object = new workshopClass();

    //run the method
    $item_records = $item_object->get_one_record_cls($wid);

    //check if the method worked
    if ($item_records) {
        //return all the data
        return $item_object->db_fetch_one();
    } else {
        //no data found
        return false;
    }
}

function search_for_record_ctr($searchkeys)
{
    $one_crop = new workshopClass();
    return $one_crop->search_for_record_cls($searchkeys);
}

?>