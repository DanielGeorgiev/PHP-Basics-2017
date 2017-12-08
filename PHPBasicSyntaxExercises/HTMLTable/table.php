<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
<form>
    Name:
    <div>
        <input type="text" name="name"/>
    </div>
    Phone number:
    <div>
        <input type="text" name="phone"/>
    </div>
    Age:
    <div>
        <input type="text" name="age"/>
    </div>
    Address:
    <div>
        <input type="text" name="address"/>
    </div>
    <div>
        <input type="submit" name="submit" value="Get table"/>
    </div>
</form>

<?php if (isset($_GET['submit'])):
    $name = $_GET['name'];
    $phoneNumber = $_GET['phone'];
    $age = $_GET['age'];
    $address = $_GET['address'];
?>
<table>
    <tr>
        <th style="background-color: orange;">Name:</th>
        <td><?= $name ?></td>
    </tr>
    <tr>
        <th style="background-color: orange;">Phone Number:</th>
        <td><?= $phoneNumber ?></td>
    </tr>
    <tr>
        <th style="background-color: orange;">Age:</th>
        <td><?= $age ?></td>
    </tr>
    <tr>
        <th style="background-color: orange;">Address:</th>
        <td><?= $address ?></td>
    </tr>
</table>
<?php endif; ?>


