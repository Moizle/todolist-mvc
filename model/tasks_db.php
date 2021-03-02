<?php

    function get_tasks_by_category($category_id)
    {
        global $db;
        if ($category_id)
        {
            $query = 'SELECT T.ItemNum, T.Title, T.Description, C.categoryName FROM todoitems T LEFT JOIN
            categories C ON T.categoryID = T.categoryID WHERE T.categoryID = :category_id ORDER by T.ItemNum';
        } else
        {
            $query = 'SELECT T.ItemNum, T.Title, T.Description, C.categoryName FROM todoitems T LEFT JOIN
            categories C ON T.categoryID = T.categoryID ORDER by C.categoryID';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $category_id);
        $statement->execute();
        $tasks = $statement->fetchAll();
        $statement->closeCursor();
        return $tasks;
    }

    function delete_tasks($task_id)
    {
        global $db;
        $query ='DELETE FROM todoitems WHERE ItemNum = :task_id';
        $statement = $db->prepare($query);
        $statement->bindValue(':task_id', $task_id);
        $statement->execute();
        $statement->closeCursor();
    }

    function add_tasks($category_id,$newtitle,$newdesc)
    {
        global $db;
        $query ='INSERT INTO todoitems
            (categoryID,Title,Description)
            VALUES
            (:category_id,:newtitle,:newdesc)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->bindValue(':newtitle', $newtitle);
        $statement->bindValue(':newdesc', $newdesc);
        $statement->execute();
        $statement->closeCursor();
    }
    ?>