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

function deleteItem(id){
    let item = document.getElementById(`listTodoItem-${id}`);
    item.style.display = "none";

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        console.log(this.responseText);
    }
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

    xhttp.onreadystatechange = function() {
        xhttp2 = new XMLHttpRequest(); 
        
        xhttp2.onreadystatechange = function() {
            document.getElementById(`listTodoItem-${id}`).innerHTML = this.responseText;
        }
        xhttp2.open("GET", `action_getTodoItem.php?todoItem=${id}`, true);
        xhttp2.send();
            
        let list = document.getElementById(`listTodoItem-${id}`);
        list.style.display = "block";

        let edit = document.getElementById(`editTodoItem-${id}`);
        edit.style.display = "none";
    }
    xhttp.open("POST", "action_editTodoItem.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`content=${content}&todoItem=${id}`); 
}

