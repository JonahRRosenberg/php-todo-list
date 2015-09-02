<?php

require_once('app/init.php');
require_once('app/load_tasks.php');

$strToDate = function($date) {
    return date('D M j, Y', strtotime($date));
};
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>My Todo List</title>

    <link rel="stylesheet" href="css/styles.css?v=1.0">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="jquery-ui/jquery-ui.min.js"></script>

    <script>
        $(document).ready(
            function () {
                $("#duedatepicker").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    dateFormat: 'D M d, yy',
                });
                $('#duedatepicker').datepicker('setDate', new Date());
            }
        );
    </script>
</head>

<body>
    <h1>TODO</h1>

    <table class="todo-table">
        <tr>
            <th>Description</th>
            <th>Due Date</th>
        </tr>
        <?php foreach ($tasks as $task): ?>
            <tr>
                <td class="<?php echo ($task['is_complete'] ? ' done' : '') ?>">
                    <?php echo $task['description'] ?>
                </td>
                <td class="<?php echo ($task['is_complete'] ? ' done' : '') ?>">
                    <?php echo $strToDate($task['due_date']) ?>
                </td>
                <td>
                    <form method="post"
                          action="set_complete.php"
                          class="<?php echo ($task['is_complete'] ? ' hidden' : '')?>">
                        <input type="submit" value="Complete">
                        <input type="hidden" name="task_id" value="<?php echo $task['ID'] ?>">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <form method="post" action="add_task.php">
        <input type="text" name="description" placeholder="What do you have to do?">
        <div style="padding-top: 10px">
            <label for="due_date">Due Date:</label>
            <input type="text" name="due_date" id="duedatepicker">
        </div>
        <input type="submit" style="visibility: hidden">

    </form>
</body>

</html>