<?php session_start(); ?>

<form>
    Phone: <input type="text" name="phone"/><br/>
    Name: <input type="text" name="name"/>

    <input type="submit"/>
</form>

<?php

if (isset($_GET['phone']) && isset($_GET['name'])) {
    $_SESSION['contact' . (count($_SESSION) + 1)] = array($_GET['phone'], $_GET['name']);
} ?>

<table>
    <th><b>Phone</b></th>
    <th><b>Name</b></th>
<?php
foreach ($_SESSION as $contact) { ?>
    <tr>
        <td><?= htmlspecialchars($contact[0]) ?></td>
        <td><?= htmlspecialchars($contact[1]) ?></td>
    </tr>
<?php } ?>
</table>