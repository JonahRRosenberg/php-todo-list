<?php

require_once('app/init.php');

$dateToSqlDateStr = function($date) {
    return date('Y-m-d', strtotime($date));
};

if (isset($_POST['description'])) {
    $tasksQuery = $db->prepare("
    INSERT INTO tasks (description, due_date, is_complete, user_id)
    VALUES (:description, :due_date, 0, :user_id)
    ");

    $tasksQuery->execute([
        'description' => $_POST['description'],
        'due_date' => $dateToSqlDateStr($_POST['due_date']),
        //'due_date' => '2015-02-10',
        'user_id' => $_SESSION['user_id']
    ]);
}

header('Location: index.php');