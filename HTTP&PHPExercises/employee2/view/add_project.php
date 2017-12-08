<form method="POST" action="/employee2/index.php?controller=Employee&action=addProject&employee_id=<?= $objects['employee_id'] ?>">
    Project name: <input type="text" name="project_name" /><br/>
    Project desc: <input type="text" name="description" /><br/>
    Start date: <input type="date" name="start_date" /><br/>
    End date: <input type="date" name="end_date" /><br/>
    <input type="submit"/>
</form>