<section id="todoList">
  <ul>
      <?php foreach ($listitems as $listitem) { ?>
        <li>
          <article>
            <a href="."><?=$listitem['title'] ?></a>
            <a href="."><i class="material-icons">delete</i></a>
          </article>
        </li>
      <?php }?>
  </ul>
</section>
