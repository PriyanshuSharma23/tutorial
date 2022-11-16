<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (file_exists('credentials.xml')) {
                $xml = simplexml_load_file('credentials.xml');
                foreach ($xml->user as $user) {
                    echo "<tr>";
                    echo "<td>" . $user->name . "</td>";
                    echo "<td>" . $user->email . "</td>";
                    echo "<td>" . $user->password . "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
        </thead>
    </table>
</body>

</html>