<?php 
//connect to the user account class
require_once(dirname(__FILE__)) . '/../Classes/application_class_class.php';

//--INSERT--//
// add to database
function add_application_ctr($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sofPurpose, $app_Pfolio){
    $insert= new applicationClass();
    return $insert->add_application_cls($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sofPurpose, $app_Pfolio);
}

?>