<form>
    <div>
        Text:
        <input type="text" name="input"/>
    </div>
    <div>

        <input type="submit" name="color" value="Color text!"/>
    </div>
</form>

<?php

if (isset($_GET['color'])){
    $text = $_GET['input'];

    for ($i = 0; $i < strlen($text); $i++){
        if (ord($text[$i]) % 2 !== 0){
            $color = 'blue';
        }else{
            $color = 'red';
        }
        echo "<span style='color: $color'>$text[$i]</span>";
    }
}