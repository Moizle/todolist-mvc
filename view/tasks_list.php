<?php include('view/header.php');?>

<section id="list" class="list">
    <header class="list__row list__header">
    <h1>View tasks</h1>
    <form action="." method="get" id="list__header_select" class="list__header_select">
        <input type="hidden" name="action" value="list_tasks">
        <select name="category_id" required>
            <option value="0">View All</option>
            <?php foreach($categories as $category) :?>
            <?php if($category_id == $category['cateogryID']){?>
                <option value="<?=$category['categoryID']?>" selected>
            <?php} else { ?>
                <option value="<?=$category['categoryID']?>">
            <?php } ?>
                    <?= $category['categoryName']?>
                    </option>
                    <?php endforeach;?>
        </select>
    <button class="add-button bold">Check</button>
    </form>
    </header>
</section>

<section id="add" class="add">
    <h2>Add a task</h2>
    <form action="." method="POST" id="add__form" class="add__form">
    <input type="hidden" name="action" value="add_task">
    <label for="category_id">Category:</label>
    <input type="text" autocomplete="off" id="category_id" name="category_id" maxlength="20" required>
    <br>            
    <label for="newtitle">Title:</label>
    <input type="text" autocomplete="off" id="newtitle" name="newtitle" maxlength="20" required>
    <br>
    <label for="newdesc">Description:</label>
    <input type="text" autocomplete="off" id="newdesc" name="newdesc" maxlength="50" required>
    <br>
    <button type="submit" id="add">+ or press enter</button>
    </form>
</section>

<section id="tasks" class="tasks">
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
                <th>Category</th>
                <th>Done?</th>
            </tr>
            <!-- Display tasks -->
            <?php foreach ($tasks as $task):?>
            <tr>
            <td><?php echo $task['Title'];?></td>
            <td><?php echo $task['Description'];?></td>
            <td><?php echo $task['categoryName'];?></td>
            <td><form action="." method="POST">
                <input type="hidden" name="id"
                    value="<?php $task['ItemNum'];?>">
                <button type="submit" class="delete">✓</button></td>
            </tr>
            <?php endforeach; ?>
            </table>
        </div>
        </section>

<?php include('view/footer.php');?>