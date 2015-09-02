<?php

require_once('app/init.php');

if (isset($_POST['task_id'])) {
    $tasksQuery = $db->prepare("
    UPDATE tasks
    SET is_complete = 1
    WHERE ID = :task_id
    AND user_id = :user_id
    ");

    $tasksQuery->execute([
        'task_id' => $_POST['task_id'],
        'user_id' => $_SESSION['user_id']
    ]);
}

header('Location: index.php');
