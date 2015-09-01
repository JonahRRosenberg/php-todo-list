<?php

require_once('app/init.php');
require_once('app/load_tasks.php');

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>My Todo List</title>

    <link rel="stylesheet" href="css/styles.css?v=1.0">
</head>

<body>
    <h1>TODO</h1>

    <ul>
        <?php foreach ($tasks as $task): ?>
            <li <?php echo ($task['is_complete'] ? ' class="done"' : '') ?> >
                <?php echo $task['description'] ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <form>
        <input type="text" placeholder="What do you have to do?">
    </form>
</body>

</html>