<?php
require('../Controllers/tour_ctrl.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from POST request.
    $rep_fname = $_POST['rep_fname'];
    $rep_lname = $_POST['rep_lname'];
    $org_name = $_POST["org_name"];
    $age_range = $_POST["age_range"];
    $population = $_POST["population"];
    $tour_purpose = $_POST["tour_purpose"];
    $arrival_date = $_POST["arrival_date"];
    $arrival_time = $_POST["arrival_time"];
    $expectations = $_POST["expectations"];

    
    
    $result = add_tour_ctr($rep_fname, $rep_lname, $org_name, $age_range, $population, $tour_purpose, $arrival_date, $arrival_time, $expectations);
    if ($result == true) {
        header('Location: ../Main/Educational_Tour_Requests.php');
    } else {
        echo 'error adding details';
    }
    
}
?>