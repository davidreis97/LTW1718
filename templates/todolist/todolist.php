<section id="todoList">
  <ul>
      <?php foreach ($listItems as $listItem) { ?>
        <li>
          <article>
            <p><?=listitem['content']?></p>
            <a href="."><i class="material-icons">mode_edit</i></a>
            <a href="."><i class="material-icons">delete</i></a>
          </article>
        </li>
      <?php }?>
  </ul>
</section>
