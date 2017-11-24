<section id="todoList">
  <article id="todoListTitle">  
    <p><?=$todoListTitle['title']?></p>
    <a href="."><i class="material-icons">mode_edit</i></a>
    <a href="action_removeTodoList.php?id=<?=$todoListId?>"><i class="material-icons">delete</i></a>
  </article>
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li>
          <article>
            <p><?=$listItem['content']?></p>
            <a href="."><i class="material-icons">mode_edit</i></a>
            <a href="action_removeTodoItem.php?id=<?=$listItem['ID']?>&todoList=<?=$listItem['todoList']?>"><i class="material-icons">delete</i></a>
          </article>
        </li>
      <?php }?>
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
