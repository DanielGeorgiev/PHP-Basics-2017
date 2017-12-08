<form>
    Name:
    <div>
       <input type="text" name="name"/>
    </div>
    Age:
    <div>
        <input type="text" name="age"/>
    </div>
    <div>
        <input type="radio" name="gender" value="male"> Male<br>
        <input type="radio" name="gender" value="female"> Female<br>
    </div>
    <div>
        <input type="submit" name="submit"/>
    </div>
</form>

<?php
if (isset($_GET['submit'])){
    $name = $_GET['name'];
    $age = $_GET['age'];
    $gender = $_GET['gender'];
    echo "My name is $name. I am $age years old. I am $gender.";
}