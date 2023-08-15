<!Doctype html>
<html>

<head>
    <title>Program Applications</title>
</head>

<body>
    <form action="../Actions/Action_Applications.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    First name:
                </td>
                <td>
                    <input type="text" placeholder="e.g. George" name="app_fname">
                </td>
            </tr>
            <tr>
                <td>
                    Last name:
                </td>
                <td>
                    <input type="text" placeholder="e.g. Francois" name="app_lname">
                </td>
            </tr>
            <tr>
                <td>
                    Email Address:
                </td>
                <td>
                    <input type="mail" placeholder="e.g JohnArmah@gmail.com" name="app_email">
                </td>
            </tr>
            <tr>
                <td>
                    Date of Birth(D.O.B):
                </td>
                <td>
                    <input type="date" name="app_DOB">
                </td>
            </tr>
            <tr>
                <td>
                    Gender:
                </td>
                <td>
                    <input type="radio" name="gender" value="Male">Male
                    <input type="radio" name="gender" value="Female">Female
                    <input type="radio" name="gender" value="Other">Other
                </td>
            </tr>
            <tr>
                <td>
                    Residence:
                </td>
                <td>
                    <input type="text" name="app_residence">
                </td>
            </tr>
            <tr>
                <td>
                    City:
                </td>
                <td>
                    <input type="text" name="city">
                </td>
            </tr>
            <tr>
                <td>
                    Country:
                </td>
                <td>
                    <input type="Text" name="country">
                </td>
            </tr>
            <tr>
                <td>
                    CV:
                </td>
                <td>
                    <input type="file" name="app_CV[]">
                </td>
            </tr>
            <tr>
                <td>
                    Statement of Purpose:
                </td>
                <td>
                    <input type="text" name="app_sOfPurpose">
                </td>
            </tr>
            <tr>
                <td>
                    Portfolio:
                </td>
                <td>
                    <input type="file" name="app_Pfolio[]">
                </td>
            </tr>
            <tr>
                <input type="submit" value="Submit">
            </tr>
        </table>
        <button><a href="../index.php">Back to Main Page</a></button>
    </form>
</body>

</html>