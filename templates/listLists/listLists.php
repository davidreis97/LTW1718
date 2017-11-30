<section id="listLists">
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li>
          <article>
            <a href="/todoPage.php?list=<?=$listItem['ID']?>"><?=$listItem['title'] ?></a>
            <a href="."><i class="material-icons">delete</i></a>
          </article>
        </li>
      <?php }?>
      <li>
          <article>
            <form action="action_addTodoList.php" method="post" id="addTodoList">
              <input type="text" placeholder="New Todo List" name="title" id="title">
              <input type="submit" value="Add">
            </form>
          </article>
        </li>
  </ul>
</section>
