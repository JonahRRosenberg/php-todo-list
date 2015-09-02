<?php

$tasksQuery = $db->prepare("
    SELECT ID, description, due_date, is_complete
    FROM tasks
    WHERE user_id = :user
    ORDER BY due_date ASC
");
$tasksQuery->execute([
    'user' => $_SESSION['user_id']
]);

$tasks = $tasksQuery->rowCount() ? $tasksQuery : [];