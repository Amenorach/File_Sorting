<?php 
//connect to the user account class
require_once(dirname(__FILE__)) . '/../Classes/tour_class.php';

//--INSERT--//
// add to database
function add_tour_ctr($rep_fname, $rep_lname, $org_name, $age_range, $population, $tour_purpose, $arrival_date, $arrival_time, $expectations)
{
    $insert = new tourClass();
    return $insert->add_tour_cls($rep_fname, $rep_lname, $org_name, $age_range, $population, $tour_purpose, $arrival_date, $arrival_time, $expectations);
}

function get_all_trecords_ctr()
{
    //create an instance of the class
    $item_object = new tourClass();

    //run the method
    $item_records = $item_object->get_all_trecords_cls();

    //check if the method worked
    if ($item_records) {
        //return all the data
        return $item_object->db_fetch_all();
    } else {
        //no data found
        return false;
    }
}

function get_one_trecord_ctr($tid)
{
    //create an instance of the class
    $item_object = new tourClass();

    //run the method
    $item_records = $item_object->get_one_trecord_cls($tid);

    //check if the method worked
    if ($item_records) {
        //return all the data
        return $item_object->db_fetch_one();
    } else {
        //no data found
        return false;
    }
}

function search_for_trecord_ctr($searchkeys)
{
    $one_crop = new tourClass();
    return $one_crop->search_for_trecord_cls($searchkeys);
}

?>