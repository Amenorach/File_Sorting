<!Doctype html>
<html>

<head>
    <title>Educational Tour Requests</title>
</head>

<body>
    <form action="../Actions/Action_Tour.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    Group Representative First Name:
                </td>
                <td>
                    <input type="text" placeholder="e.g.George" name="rep_fname">
                </td>
            </tr>
            <tr>
                <td>
                    Group Representative Last Name:
                </td>
                <td>
                    <input type="text" placeholder="e.g. Francois" name="rep_lname">
                </td>
            </tr>
            <tr>
                <td>
                    Name of Ogranization:
                </td>
                <td>
                    <input type="text" placeholder="e.g.Dikan Center" name="org_name">
                </td>
            </tr>
            <tr>
                <td>
                    Age Range of Group:
                </td>
                <td>
                    <input type="text" placeholder="e.g.20 to 25" name="age_range">
                </td>
            </tr>
            <tr>
                <td>
                    Number of people in the Group:
                </td>
                <td>
                    <input type="text" placeholder="e.g.12,5" name="population">
                </td>
            </tr>
            <tr>
                <td>
                    Purpose of the Tour:
                </td>
                <td>
                    <input type="text" name="tour_purpose">
                </td>
            </tr>
            <tr>
                <td>
                    Date of Arrival:
                </td>
                <td>
                    <input type="date" name="arrival_date">
                </td>
            </tr>
            <tr>
                <td>
                    Time of Arrival:
                </td>
                <td>
                    <input type="time" name="arrival_time">
                </td>
            </tr>
            <tr>
                <td>
                    Expectations:
                </td>
                <td>
                    <input type="text" name="expectations">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <input type="submit" value="Submit">
            </tr>
        </table>
    </form>
</body>

</html>