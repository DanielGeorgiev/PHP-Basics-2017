<!DOCTYPE html>
<html>
<head>
    <style>
        table, th, td {
            border: 1px solid #584e31;
            background-color: rosybrown;
        }
    </style>
</head>
<body>

<form>
    <div>
        <textarea name="input" cols="50"></textarea>
    </div>
    <div>
        <input type="submit" name="count" value="Count words!"/>
    </div>
</form>

<?php
    if (isset($_GET['count'])):
        $input = preg_match_all('/\w+/', strtolower($_GET['input']), $matches);
        $wordMap = [];

        foreach ($matches[0] as $word){
            if (!isset($wordMap[$word])){
                $wordMap[$word] = 0;
            }

            $wordMap[$word]++;
        } ?>
<table>
<?php foreach ($wordMap as $word => $occurrences): ?>
    <tr>
        <td style="padding-right: 17px"><?= $word ?></td>
        <td><?= $occurrences ?></td>
    </tr>
<?php endforeach;?>
</table>
<?php endif; ?>
</body>
</html>