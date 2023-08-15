<?php
require('../Controllers/application_ctrl.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from POST request.
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'zip'); // Add 'zip' to the list of allowed types
    $app_fname = $_POST['app_fname'];
    $app_lname = $_POST['app_lname'];
    $app_email = $_POST['app_email'];
    $app_DOB = $_POST['app_DOB'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $app_residence = $_POST['app_residence'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $app_sOfPurpose = $_POST['app_sOfPurpose'];

    // Process file upload for app_CV
    $app_CV = processUploadedFile('app_CV', $app_fname, $app_lname, 'CV');

    // Process file upload for app_Pfolio
    $app_Pfolio = processUploadedFile('app_Pfolio', $app_fname, $app_lname, '');

    // Call the function to insert data into the database
    if (add_application_ctr($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sOfPurpose, $app_Pfolio)) {
        echo "<script>alert('File uploaded successfully')</script>";
        header('Location:../Main/Program_Applications.php');
    } else {
        echo "<script>alert('File not submitted successfully')</script>";
    }
}

/**
 * Process file upload and return the new file name.
 * @param string $fieldName The name of the file input field.
 * @param string $firstName The first name of the applicant.
 * @param string $lastName The last name of the applicant.
 * @param string $suffix The suffix to add to the file name.
 * @return string|false The new file name or false if upload failed.
 */
function processUploadedFile($fieldName, $firstName, $lastName, $suffix) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'zip'); // Add 'zip' to the list of allowed types
    $output_dir = "../application_uploads/";
    // $RandomNum = time();
    $ImageName = str_replace(' ', '-', strtolower($_FILES[$fieldName]['name'][0]));
    $ImageExt = pathinfo($ImageName, PATHINFO_EXTENSION);
    $ImageExt = str_replace('.', '', $ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName . '-' . $suffix . '.' . $ImageExt;

    if (isset($_FILES[$fieldName]) && $_FILES[$fieldName]['error'][0] === UPLOAD_ERR_OK) {
        // Check if the file type is allowed
        $fileExt = pathinfo($_FILES[$fieldName]['name'][0], PATHINFO_EXTENSION);
        if (in_array(strtolower($fileExt), $allowTypes)) {
            // Generate a unique name for the uploaded file
            // $RandomNum = time();
            $ImageNameWithoutExt = strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $firstName)) . '_' . strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $lastName));
            $NewImageName = $ImageNameWithoutExt . '-' .  $suffix . '.' . $ImageExt;

            // Construct the full path for uploading
            $uploadPath = $output_dir . '/' . $NewImageName;

            // Move the uploaded file to the desired location
            if (move_uploaded_file($_FILES[$fieldName]['tmp_name'][0], $uploadPath)) {
                return $NewImageName; // Return the new file name
            } else {
                echo "<script>alert('Error moving uploaded file')</script>";
            }
        } else {
            echo "<script>alert('Invalid file type for $fieldName. Only JPG, PNG, JPEG, PDF, and ZIP files are allowed.')</script>";
        }
    } else {
        echo "<script>alert('Error uploading $fieldName')</script>";
    }

    return false;
}
?>
