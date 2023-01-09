<?php


include_once 'model/User.php';
include_once 'model/Task.php';
include_once 'model/TaskProvider.php';
$pdo = require "db.php";
session_start();

$username = null;

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username']->getUsername();

} else {
    header("Location: /");
    die();
}

$taskProvider = new TaskProvider($pdo);

if (isset($_GET['action']) && $_GET['action'] === 'add')
{
    $taskProvider->addTask(new Task($_POST['task']));
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] === 'done')
{
    $id = $_GET['id'];
    $taskProvider->doDoneTask($id);
    header("Location: /?controller=tasks");
    die();
}

if (isset($_GET['action']) && $_GET['action'] ==='apidone') {
    $id = $_GET['ID'];
    $taskProvider->doDoneTask($id);
    $response = [
        'status' => 'ok',
        'id' => $id
    ];

    echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    die();
}

$pageHeader = "Tasks";

$tasks = $taskProvider->getUndoneList();

include "view/tasks.php";


