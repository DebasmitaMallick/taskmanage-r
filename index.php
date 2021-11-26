<?php
  session_start();
  if (isset($_POST['assign'])) {
    $_SESSION['emp'] = $_POST['name'];
    header("Location: complete.php");
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" data-auto-replace-svg="nest"></script>
    <title></title>
    <style media="screen">
      #scrollBar {
        float:auto;
        overflow-y: auto;
        height: 275px;
      }
      #addButton:hover {
        transform: scale(1.1);
        background-color: red;
      }
    </style>
  </head>
  <body>
    <h3 class="py-3 bg-dark pl-3" style="margin-bottom: 35px; color: #f54260"><i class="fa fa-clock" style="color: #f54260"></i> Task Manager</h3>
    <div class="container mb-3">
      <form method="post">
        <input id="assign" type="submit" name="assign" value="Assign"><br><br>
        <label for="employee">Select an employee: </label>
        <select name="name" id="employee">
          <option value="0">Names</option>
          <option value="Rohit">Rohit</option>
          <option value="Alex">Alex</option>
          <option value="Neha">Neha</option>
          <option value="Sonam">Sonam</option>
          <option value="Robin">Robin</option>
          <option value="Kunal">Kunal</option>
          <option value="Ragini">Ragini</option>
          <option value="Sakshi">Sakshi</option>
          <option value="Ayan">Ayan</option>
          <option value="Sandy">Sandy</option>
          <option value="Mohit">Mohit</option>
          <option value="Rekha">Rekha</option>
          <option value="Anwesha">Anwesha</option>
          <option value="Avik">Avik</option>
        </select>
      </form>
      <input style="display: inline; width: 80%" type="text" class="form-control border-primary" id="add" placeholder="enter task...">
      <button id="addButton" type="button" class="btn btn-lg text-white mb-2" style="background: #f54260;" onclick="addtask()">ADD</button>
    </div>
    <div class="container" id="scrollBar">
      <ul id="tasks" class="list-group">
        <li class="list-group-item">
          <div id="countTasks">No Tasks</div>
        </li>
    </div>
    <!--   f00e78 -->
  </body>
  <script type="text/javascript">
    var x,y,e, taskCounter=0;
    function addtask(){
      x=document.getElementById("add");
      y=document.getElementById("tasks");
      e = document.getElementById('employee');
      if(x.value != "" && e.value != "0"){
        taskCounter ++ ;
        var item = document.createElement('li');
        item.className = "list-group-item";
        item.innerHTML = '<input title="<input title="Delete Task" type="button" class="btn-lg btn-danger" value="&#x2715;" onclick="removeListItem(this)"> <input title="Mark Important" type="button" class="btn-lg btn-warning" value=" ! " onclick="markImp(this)" />' + " " + x.value;
        y.appendChild(item);
        x.value = "";
        x.placeholder = "add new task...";
        if(taskCounter == 1)
          {
            $("#countTasks").html(taskCounter + " Task");
          }
        else{
          $("#countTasks").html(taskCounter + " Tasks");
        }
        // e.value = "0";
      }
      else if (x.value == "") {
        Swal.fire({
          title: 'Please add a task!',
          icon: 'warning',
          confirmButtonColor: '#d33',
          confirmButtonText: 'OK',
        })
      }
      else {
        Swal.fire({
          title: 'Please select an employee!',
          icon: 'warning',
          confirmButtonColor: '#d33',
          confirmButtonText: 'OK',
        })
      }
    }
    function removeListItem(currentElement){
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.isConfirmed) {
        taskCounter -- ;
        $(currentElement).parent().hide();
        if(taskCounter > 1){
          $("#countTasks").html(taskCounter + " Tasks");
        }
        else if(taskCounter == 1){
          $("#countTasks").html(taskCounter + " Task");
        }
        else{
          $("#countTasks").html("No Tasks");
        }
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
      })
    }
    function markImp(currentElement){
      $(currentElement).parent().css("background-color", "rgba(255, 213, 0, 0.3)");
      Swal.fire({
      icon: 'success',
      title: 'Your work has been marked important',
      showConfirmButton: false,
      timer: 1500
      })
    }
  </script>
  </html>
