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
    <!-- <main>
    <!-- <?php if(!$newtitle) {?>
        <!-- Add a task to DB -->
        <section>
            <h2>Add a task</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label for="newtitle">Title:</label>
            <input type="text" autocomplete="off" id="newtitle" name="newtitle" maxlength="20" required>
            <br>
            <label for="newdesc">Description:</label>
            <input type="text" autocomplete="off" id="newdesc" name="newdesc" maxlength="50" required>
            <br>
            <button type="submit" id="add">+ or press enter</button>
            </form>
        </section>
        <section>
            <div id="table">
            <h2>Current Tasks</h2>
            <!-- Check for tasks -->
            <?php if (!$tasks)
            {
                echo "No to do list items exist yet.";
            }
            else
            {
                echo "Here's what is on the to do list.";
            }
            ?>
            <br>
            <table>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Done?</th>
            </tr>
            <!-- Display tasks -->
            <?php foreach ($tasks as $task):?>
            <tr>
            <td><?php echo $task['Title'];?></td>
            <td><?php echo $task['Description'];?></td>
            <td><form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <?php require("database.php");
                $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
                // Delete Task
                if ($id != false)
                {
                    $query = 'DELETE FROM todoitems
                                WHERE ItemNum = :id';
                    $statement= $db->prepare($query);
                    $statement->bindValue(':id',$id);
                    $success = $statement->execute();
                    $statement->closeCursor();
                    header("Location:.");
                }
                ?>
                <input type="hidden" name="id"
                    value="<?php $task['ItemNum'];?>">
                <button type="submit" class="delete">✓</button></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        </section>

        <?php } else {?>
            <?php require("database.php"); ?>
            <?php 
                if ($newtitle)
                {
                    $query ='INSERT INTO todoitems
                                (Title,Description)
                            VALUES
                                (:newtitle,:newdesc)';
                    $statement = $db->prepare($query);
                    $statement->bindValue(':newtitle', $newtitle);
                    $statement->bindValue(':newdesc', $newdesc);
                    $statement->execute();
                    $statement->closeCursor();
                    header("Location:.");
                }
            ?>

        <?php }?> -->
    </main> -->
</body>
</html>