<section id="listLists">
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li>
          <article>
            <a href="todoPage.php?list=<?=$listItem['ID']?>"><?=$listItem['title'] ?></a>
            <a href="action_removeTodoList.php?id=<?=$listItem['ID']?>"><i class="material-icons">delete</i></a>
          </article>
        </li>
      <?php }?>
      <li>
          <article>
            <form action="action_addTodoList.php" method="post" id="addTodoList">
              <input type="text" placeholder="New Todo List" name="title" id="title">
              <label for="public">Public</label>
              <input type="checkbox" name="public" id="public">
              <input type="submit" value="Add">
            </form>
          </article>
        </li>
  </ul>
</section>
