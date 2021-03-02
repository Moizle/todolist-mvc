<?php
    require("model/database.php");
    require('model/tasks_db.php');
    require('model/category_db.php');

    // Filter form inputs
    $task_id = filter_input(INPUT_POST,'task_id', FILTER_VALIDATE_INT);
    $newtitle = filter_input(INPUT_POST, "newtitle", FILTER_SANITIZE_STRING);
    $newdesc = filter_input(INPUT_POST, "newdesc", FILTER_SANITIZE_STRING);

    $catgeory_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
    if (!$catgeory_id)
    {
        $category_id = filter_input(INPUT_GET, 'category_id', FILTER_VALIDATE_INT);
    }

    $action = filter_input(INPUT_POST, 'action', FILTER_VALIDATE_INT);
    if (!$action)
    {
        $action = filter_input(INPUT_GET, 'action', FILTER_VALIDATE_INT);
        if (!$action)
        {
            $action = 'list_tasks';
        }
    }

    switch($action)
    {
        default:
            $catgeory_name = get_category_name($catgeory_id);
            $categories = get_categories();
            $tasks = get_tasks_by_category($category_id);
            include('view/tasks_list.php');
    }
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My To-Do List</title>
    <link href='css/main.css'rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Permanent Marker' rel='stylesheet'>
</head>
<body>
    <header>
        <h1>To Do List</h1>
    </header>
   
</body>
</html>