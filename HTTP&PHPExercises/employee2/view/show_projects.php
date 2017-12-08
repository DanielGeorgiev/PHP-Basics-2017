<table>

    <tr>
        <th>Project name</th>
        <th>Project description</th>
        <th>Start date</th>
        <th>End date</th>
    </tr>
    <?php foreach ($objects['projects'] as $project) { ?>
        <tr>
            <td><?= $project['name'] ?></td>
            <td><?= $project['description'] ?></td>
            <td><?= $project['start_date'] ?></td>
            <td><?= (empty($project['end_date'])) ? "NO END DATE" : $project['end_date'] ?></td>
        </tr>
    <?php } ?>

</table>
