<article>
    <p onclick="markAsOngoing(<?=$listItem['ID']?>)"><?=$listItem['content']?> </p>
    <a href="javascript:void(0);"><i class="material-icons" onclick="markAsDone(<?=$listItem['ID']?>)">done</i></a>
    <a href="javascript:void(0);"><i class="material-icons" onclick="editItem(<?=$listItem['ID']?>)"  >mode_edit</i></a>
    <a href="javascript:void(0);"><i class="material-icons" onclick="deleteItem(<?=$listItem['ID']?>)">delete</i></a>
</article>
<?php include('editTodoItem.php'); ?>
    