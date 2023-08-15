<!Doctype html>
<html>

<head>
    <title>Workshops</title>
</head>

<body>
    <form action="../Actions/Action_workshops.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    First Name:
                </td>
                <td>
                    <input type="text" name="fname" class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    Last Name:
                </td>
                <td>
                    <input type="text" name="lname" class="form-control">
                </td>
            </tr>
            <tr>
                <td>
                    Age:
                </td>
                <td>
                    <input type="text" name="age" class="form-control">
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
                    Occupation:
                </td>
                <td>
                    <input type="text" name="occupation">
                </td>
            </tr>
            <tr>
                <td>
                    Phone number:
                </td>
                <td>
                    <select name="countryCode">
                        <option value="+233">+233 (Ghana)</option>
                        <option value="+234">+234 (Nigeria)</option>
                        <option value="+975">+975 (Bhutan)</option>
                        <option value="+226">+226 (Burkina Faso)</option>
                        <option value="+257">+257 (Burundi)</option>
                    </select>
                    <input type="phone" name="contact">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="Pfolio">Portfolio (in zip):</label>
                </td>
                <td>
                    <input type="file" name="Pfolio[]" id="Pfolio" class="form-control" placeholder="Enter portfolio URL">
                </td>
            </tr>
            <tr>
                <td>
                    Email Address:
                </td>
                <td>
                    <input type="mail" name="wk_email">
                </td>
            </tr>
            <tr>
                <td>
                    Areas of Interest:
                </td>
                <td>
                    <input type="text" name="areaofInterest">
                </td>
            </tr>
            <tr>
                <input type="submit" value="Submit">
            </tr>
        </table>
    </form>
</body>

</html>