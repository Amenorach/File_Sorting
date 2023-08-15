<?php
require('../Controllers/workshop_ctrl.php');

// Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Get data from POST request.
//     $fname = $_POST['fname'];
//     $lname = $_POST['lname'];
//     $age = $_POST['age'];
//     $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
//     $occupation = $_POST['occupation'];
//     $countryCode = $_POST["countryCode"];
//     $phone = $_POST["contact"];

//     // Concatenate the country code and phone number
//     $contact = $countryCode . $phone;
//     $wk_email = $_POST['wk_email'];
//     $areaofInterest = $_POST['areaofInterest'];

//     // Validate the portfolio link (URL format)
//     $portfolioLink = filter_var($_POST['Pfolio'], FILTER_VALIDATE_URL) ? $_POST['Pfolio'] : null;

//     $result = add_workshop_ctr($fname, $lname, $age, $gender, $occupation, $contact, $portfolioLink, $wk_email, $areaofInterest);

//     if ($result !== false) {
//         // Successfully inserted data, construct the link to the portfolio page
//         if (!empty($portfolioLink)) {
//             echo "<script>alert('Data submitted successfully')</script>";
//             header('Location: ../Dikan/Workshops.php');
//         } else {
//             echo "<script>alert('Data submitted successfully, but no portfolio link provided')</script>";
//         }
//     } else {
//         echo "<script>alert('Data not submitted successfully')</script>";
//     }
// } else {
//     echo "Form not submitted";
// }

// if ($result == true) {
//     header('Location: ../Dikan/Educational_Tour_Requests.php');
// } else {
//     echo 'error adding details';
// }
// }
// Note: No file upload processing is done here

// Call the function to insert data into the database and get the inserted ID
//     $insertedID = add_workshop_ctr($fname, $lname, $age, $gender, $occupation, $contact, $wk_email, $areaofInterest);

?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from POST request.
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'zip'); // Add 'zip' to the list of allowed types
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $occupation = $_POST['occupation'];
    // Retrieve form data
    $countryCode = $_POST["countryCode"];
    $phone = $_POST["contact"];

    // Concatenate the country code and phone number
    $contact = $countryCode . $phone;
    $wk_email = $_POST['wk_email'];
    $areaofInterest = $_POST['areaofInterest'];

    // Process file upload
    $output_dir = "../workshop_uploads/";
    $ImageName = str_replace(' ', '-', strtolower($_FILES['Pfolio']['name'][0]));
    $ImageType = $_FILES['Pfolio']['type'][0];
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.', '', $ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName . '-' .  $ImageExt;
    $ret[$NewImageName] = $output_dir . $NewImageName;

    // Process file upload
    if (isset($_FILES['Pfolio']) && $_FILES['Pfolio']['error'][0] === UPLOAD_ERR_OK) {
        // Check if the file type is allowed
        $fileExt = pathinfo($_FILES['Pfolio']['name'][0], PATHINFO_EXTENSION);
        if (in_array(strtolower($fileExt), $allowTypes)) {
            // Extract and sanitize the first and last names
            $sanitizedFirstName = strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $fname));
            $sanitizedLastName = strtolower(preg_replace("/[^a-zA-Z0-9]/", "_", $lname));

            // Generate a unique name for the uploaded file
            $ImageNameWithoutExt = $sanitizedFirstName . '_' . $sanitizedLastName;
            $ImageExt = pathinfo($_FILES['Pfolio']['name'][0], PATHINFO_EXTENSION);
            $NewImageName = $ImageNameWithoutExt . '-' . $ImageExt;

            // Construct the full path for uploading
            $uploadPath = $output_dir . '/' . $NewImageName;

            // Move the uploaded file to the desired location
            if (move_uploaded_file($_FILES["Pfolio"]["tmp_name"][0], $uploadPath)) {
                // File uploaded successfully

                // Call the function to insert data into the database
                if (add_workshop_ctr($fname, $lname, $age, $gender, $occupation, $contact, $NewImageName, $wk_email, $areaofInterest)) {
                    echo "<script>alert('File uploaded successfully')</script>";
                    header('Location:../Main/Workshops.php');
                } else {
                    echo "<script>alert('File not submitted successfully')</script>";
                }
            } else {
                echo "<script>alert('Error moving uploaded file')</script>";
            }
        } else {
            echo "<script>alert('Invalid file type. Only JPG, PNG, JPEG, PDF, and ZIP files are allowed.')</script>";
        }
    } else {
        echo "<script>alert('Error uploading file')</script>";
    }
}

?>