<section id="todoList">
  <article id="todoListTitle">
    <p><?=$todoListTitle['title']?></p>
    <a href="action_removeTodoList.php?id=<?=$todoListId?>"><i class="material-icons">delete</i></a>
  </article>
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li id="listTodoItem-<?=$listItem['ID']?>">
          <?php include('todoItem.php'); ?>
        </li>
      <?php } ?>
        <li>
          <article>
            <form action="#" method="post" id="addTodoItem">
              <input type="text" placeholder="New Todo Item" name="content" id="content">
              <input type="button" value="Add" onclick="addItem(<?=$todoListId?>)">
            </form>
          </article>
        </li>
  </ul>
</section>
