function markAsDone(id){
    console.log("Marking as done: " + id);
}

function addItem(todoListID) {
    console.log("Adding item to todo list: " +todoListID);
}

function deleteItem(id){
    let item = document.getElementById(`listTodoItem-${id}`);
    item.style.display = "none";

    var xhttp = new XMLHttpRequest();

    xhttp.open("GET", `action_removeTodoItem.php?id=${id}`, true);
    xhttp.send(); 
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
        document.getElementById(`listTodoItem-${id}`).innerHTML = this.responseText;
    }
    xhttp.open("GET", `templates/todolist/getTodoItem.php?todoItem=${id}`, true);
    xhttp.send();
    
    let list = document.getElementById(`listTodoItem-${id}`);
    list.style.display = "block";
}