<?php
// require("../Settings/dbClass.php");

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     // Get data from POST request.
    
//     $app_fname = $_POST["app_fname"];
//     $app_lname = $_POST["app_lname"];
//     $app_email = $_POST["app_email"];
//     $app_DOB = $_POST["app_DOB"];
//     $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
//     $app_residence = $_POST["app_residence"];
//     $city = $_POST["city"];
//     $country = $_POST["country"];
//     $app_CV = $_POST["app_CV"];
//     $app_sOfPurpose = $_POST["app_sOfPurpose"];
//     $app_Pfolio = isset($_POST["app_Pfolio"]) ? $_POST["app_Pfolio"] : "";
    
//     // Prepare and execute SQL statement
//     $sql = "INSERT INTO program_applications (app_fname, app_lname, app_email, app_DOB, gender, app_residence, city, country, app_CV, app_sOfPurpose, app_Pfolio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?)";
//     $stmt = $db->prepare($sql);
//     $stmt->bind_param("sssisssss", $app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sOfPurpose, $app_Pfolio);
    
//     if ($stmt->execute()) {
//         echo "Data inserted successfully!";
//     } else {
//         echo "Error: " . $sql . "<br>" . $db->error;
//     }

//     // Close the connection
//     $stmt->close();
//     $db->close();
// }
?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get data from POST request.
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'zip'); // Add 'zip' to the list of allowed types

    $app_fname = $_POST['app_fname'];
    $app_lname = $_POST['app_lname'];
    $app_email = $_POST['app_email'];
    $app_DOB = $_POST["app_DOB"];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $app_residence = $_POST['app_residence'];
    $city = $_POST["city"];
    $country = $_POST["country"];
    $app_CV = $_POST["app_CV[]"];
    $app_sOfPurpose = $_POST["app_sOfPurpose"];
    $app_Pfolio = isset($_POST["app_Pfolio"]) ? $_POST["app_Pfolio"] : "";
    

    // Process file upload
    $output_dir = "../Application_uploads/";
    $RandomNum = time();
    $ImageName = str_replace(' ', '-', strtolower($_FILES['Pfolio']['name'][0]));
    $ImageType = $_FILES['Pfolio']['type'][0];
    $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
    $ImageExt = str_replace('.', '', $ImageExt);
    $ImageName = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
    $NewImageName = $ImageName . '-' . $RandomNum . '.' . $ImageExt;
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
            $RandomNum = time();
            $ImageNameWithoutExt = $sanitizedFirstName . '_' . $sanitizedLastName;
            $ImageExt = pathinfo($_FILES['Pfolio']['name'][0], PATHINFO_EXTENSION);
            $NewImageName = $ImageNameWithoutExt . '-' . $RandomNum . '.' . $ImageExt;

            // Construct the full path for uploading
            $uploadPath = $output_dir . '/' . $NewImageName;

            // Move the uploaded file to the desired location
            if (move_uploaded_file($_FILES["Pfolio"]["tmp_name"][0], $uploadPath)) {
                // File uploaded successfully

                // Call the function to insert data into the database
                if (add_application_ctr($app_fname, $app_lname, $app_email, $app_DOB, $gender, $app_residence, $city, $country, $app_CV, $app_sofPurpose, $app_Pfolio)) {
                    echo "<script>alert('File uploaded successfully')</script>";
                    header('Location:../Dikan/Program Applications.php');
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