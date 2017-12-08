<table>

    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Job Title</th>
        <th>Department</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($objects['employees'] as $employee) { ?>
        <tr>
            <td><?= $employee['first_name'] ?></td>
            <td><?= $employee['last_name'] ?></td>
            <td><?= $employee['job_title'] ?></td>
            <td><?= $employee['department_name'] ?></td>
            <td>
                <a href="/employee2/index.php?controller=Employee&action=addProject&employee_id=<?= $employee['employee_id']?>">
                    Add Project
                </a>
                <hr>
                <a href="/employee2/index.php?controller=Employee&action=viewProjects&employee_id=<?= $employee['employee_id'] ?>">
                    View Projects
                </a>
            </td>
        </tr>
    <?php } ?>

</table>
