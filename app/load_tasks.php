<?php

$tasksQuery = $db->prepare("
    SELECT ID, description, due_date, is_complete
    FROM tasks
    WHERE user_id = :user
");
$tasksQuery->execute([
    'user' => $_SESSION['user_id']
]);

$tasks = $tasksQuery->rowCount() ? $tasksQuery : [];