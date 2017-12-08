<h1>YOUR PROFILE</h1>

<a href="logout.php">Logout</a>

<form method="post">
    <div>
        <label>
            Username:
            <input type="text" name="username" value="<?= $_SESSION['username'] ?>"/>
        </label>
    </div>
    <div>
        <label>
            Password:
            <input type="password" name="password" value="<?= $_SESSION['password'] ?>"/>
        </label>
    </div>
    <div>
        <label>
            First Name:
            <input type="text" name="first_name" value="<?= $_SESSION['firstName'] ?>"/>
        </label>
    </div>
    <div>
        <label>
            Last Name:
            <input type="text" name="last_name" value="<?= $_SESSION['lastName'] ?>"/>
        </label>
    </div>
    <div>
        <label>
            Birthday:
            <input type="text" name="birthday" value="<?= $_SESSION['birthday'] ?>"/>
        </label>
    </div>

    <div>
        <input type="submit" name="edit" value="Edit"/>
    </div>
</form>
