<?php

  include_once "../../connection/connection.php";

  $sql = "SELECT * FROM `todo_list` ORDER BY `date` DESC";

  $query = $db->prepare($sql);
  $query->execute();

  $todos = $query->fetchAll(PDO::FETCH_ASSOC);

  if(isset($_POST["delete_todo_id"])){
    $todoID = $_POST["delete_todo_id"];

    $deleteSql = "DELETE FROM `todo_list` WHERE `id` =:id";

    $deleteQuery = $db->prepare($deleteSql);
    $deleteQuery->bindValue(":id", $todoID, PDO::PARAM_INT);

    $deleteQuery->execute();

    header("Location: index.php");
  }
?>


<div class="mt-[6rem]">
    <table class="">
      <thead class="border-[0.1rem] border-black">
        <tr>
          <th class="border-[0.1rem] border-black">Date</th>
          <th class="border-[0.1rem] border-black">Title</th>
          <th class="border-[0.1rem] border-black">Description</th>
          <th class="border-[0.1rem] border-black">Action</th>
        </tr>
      </thead>
      <tbody class="border-[0.1rem] border-black">
        <?php foreach($todos as $todo): ?> 

          <tr>
            <td class="border-[0.1rem] border-black"><strong><?= $todo ? $todo["date"] : "-"; ?></strong></td>
            <td class="border-[0.1rem] border-black"><p><?= $todo ? $todo["title"] : "-"; ?></p></td>
            <td class="border-[0.1rem] border-black"><p><?= $todo ? $todo["description"] : "-"; ?></p></td>
            <td class="border-[0.1rem] border-black">
              <div class="flex p-2"> 
                  <a href="../views/edit_todo.php?id=<?= $todo ? $todo["id"] : null ?>" class="bg-green-200 w-[5rem] text-center mr-2">Edit</a>
                  <form method="POST" onsubmit="return confirm('Are you sure you want to delete this todo?');">
                    <input type="hidden" name="delete_todo_id" value="<?= $todo ? $todo["id"] : null ?>">
                    <button type="submit" class="bg-red-500 w-[5rem] text-center">Delete</button>
                  </form>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>