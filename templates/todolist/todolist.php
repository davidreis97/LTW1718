<section id="todoList">
  <article id="todoListTitle">
    <p><?=$todoListTitle['title']?></p>
    <a href="action_removeTodoList.php?id=<?=$todoListId?>"><i class="material-icons">delete</i></a>
  </article>
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li id="listTodoItem-<?=$listItem['ID']?>">
          <article>
            <p id="content-<?=$listItem['ID']?>"><?=$listItem['content']?></p>
            <a href="#" onclick="markAsDone(<?=$listItem['ID']?>)" href="javascript:void(0);"><i class="material-icons">done</i></a>
            <a href="#" onclick="editItem(<?=$listItem['ID']?>)"   href="javascript:void(0);"><i class="material-icons">mode_edit</i></a>
            <a href="action_removeTodoItem.php?id=<?=$listItem['ID']?>&todoList=<?=$listItem['todoList']?>"><i class="material-icons">delete</i></a>
          </article>
          <?php include('editTodoItem.php'); ?>
        </li>
      <?php } ?>
        <li>
          <article>
            <form action="action_addTodoItem.php" method="post" id="addTodoItem">
              <input type="text" placeholder="New Todo Item" name="content" id="content">
              <input type="hidden" name="todoList" id="todoList" value="<?=$todoListId?>">
              <input type="submit" value="Add">
            </form>
          </article>
        </li>
  </ul>
</section>
