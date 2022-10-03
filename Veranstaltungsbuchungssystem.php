<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <style>
        .box {
            width: 1850px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 100px;
        }
    </style>
</head>

<body>
<div class="container box">
    <h3 align="center">
        Importieren von JSON-Daten in die Datenbank
    </h3><br/>

    <h3>Eingefügte JSON-Daten</h3><br/>
    <table class="table table-bordered">
        <tr>
            <th>participation_id</th>
            <th>employee_name</th>
            <th>employee_mail</th>
            <th>event_id</th>
            <th>event_name</th>
            <th>participation_fee</th>
            <th>event_date</th>
            <th>version</th>
        </tr>

        <?php

        $connect = mysqli_connect("localhost:330", "root", "root", "project1");

        if (!$connect) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = 'SELECT * FROM test_table;';

        $result = mysqli_query($connect, $query);

        while ($row = mysqli_fetch_assoc($result)){
            echo '
                <tr>
                    <td>' . $row["participation_id"] . '</td>
                    <td>' . $row["employee_name"] . '</td>
                    <td>' . $row["employee_mail"] . '</td>
                    <td>' . $row["event_id"] . '</td>
                    <td>' . $row["event_name"] . '</td>
                    <td>' . $row["participation_fee"] . '</td>
                    <td>' . $row["event_date"] . '</td>
                    <td>' . $row["version"] . '</td>
                </tr>
            ';}
        ?>
    </table>
    <br/>
</div>
</body>
</html>
