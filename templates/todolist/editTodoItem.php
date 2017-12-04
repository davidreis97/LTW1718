<li class="editTodoItemListItem" id="editTodoItem-<?=$listItem['ID']?>">
    <article>
        <form action="#" method="post" id="editTodoItem">
            <input type="text" value="<?=$listItem['content']?>" name="content" id="editContent-<?=$listItem['ID']?>">
            <input type="button" value="Done" onclick="finishEditing(<?=$listItem['ID']?>)">
        </form>
    </article>
</li>