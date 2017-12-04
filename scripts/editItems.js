function markAsDone(id){
    
}

function editItem(id) {
    let edit = document.getElementById(`editTodoItem-${id}`);
    edit.style.display = "block";
    let list = document.getElementById(`listTodoItem-${id}`);
    list.style.display = "none";
}

function finishEditing(id) {
    var xhttp = new XMLHttpRequest(); 

    let content = document.getElementById(`editContent-${id}`).value;    

    xhttp.open("POST", "action_editTodoItem.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`content=${content}&todoItem=${id}`); 

    let edit = document.getElementById(`editTodoItem-${id}`);
    edit.style.display = "none";
    
    xhttp = new XMLHttpRequest(); 

    xhttp.onreadystatechange = function() {
        document.getElementById(`content-${id}`).innerText = this.responseText;
    }
    xhttp.open("GET", `templates/todolist/getTodoItem.php?todoItem=${id}`, true);
    xhttp.send();
    
    let list = document.getElementById(`listTodoItem-${id}`);
    list.style.display = "block";
}