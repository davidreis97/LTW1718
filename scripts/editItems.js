function markAsDone(id){
    let status;
    let item = document.getElementById(`listTodoItem-${id}`);
    item.classList.toggle('checked');
    if(item.classList=='checked'){
        status="done";
    }
    else if(item.classList=='ongoing checked'){
        item.classList.toggle('ongoing');
        status="done";
    }
    else{
        status="notdone";
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", `action_doneTodoItem.php?id=${id}`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`status=${status}&todoItem=${id}`);
}

function markAsOngoing(id){
    let status;
    let item = document.getElementById(`listTodoItem-${id}`);
    item.classList.toggle('ongoing');
    if(item.classList=='checked ongoing'){
        item.classList.toggle('checked');
        status="ongoing";
    }
    else if(item.classList=='ongoing'){
        status="ongoing"
    }
    else{
        status="notdone";
    }
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", `action_doneTodoItem.php?id=${id}`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`status=${status}&todoItem=${id}`);
}

function addItem(todoListID) {
    var inputValue = document.getElementById("content").value;
    if (inputValue === '') {
        alert("You must write something!");
    } else {
    console.log("Adding item to todo list: " +todoListID);
    let content = document.getElementById(`content`).value; 
    var ul = document.getElementById("TodoItemlu");
    var li = document.createElement("li");
    var article =document.createElement("article");
    var editlit=document.createElement("li");
    editlit.setAttribute("class","editTodoItemListItem");
    var articleedit=document.createElement("article");
    
    article.appendChild(document.createTextNode(inputValue));
    //li.setAttribute("id", "listTodoItem"); // added line
    li.appendChild(article);
    ul.appendChild(li);
    var xhttp = new XMLHttpRequest(); 
    xhttp.open("POST", `action_addTodoItem.php`, true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`content=${content}&todoList=${todoListID}`);
    document.getElementById("content").value = "";
    }
    
    
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

