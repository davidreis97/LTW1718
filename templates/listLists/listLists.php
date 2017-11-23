<section id="todoList">
  <ul>
      <?php foreach ($listitems as $listitem) { ?>
        <li>
          <article>
            <a href="/todoPage.php?list=<?=$listitem['id']?>"><?=$listitem['title'] ?></a> 
            <a href="."><i class="material-icons">delete</i></a>
          </article>
        </li>
      <?php }?>
  </ul>
</section>
