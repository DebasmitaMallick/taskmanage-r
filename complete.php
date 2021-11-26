<?php
  session_start();
  if (isset($_POST['submit'])) {
    if ($_FILES['file']['name']) {
      $_SESSION['message'] = "<p style='color: green'>File is uploaded successfully!</p>";;
    }
    else {
      $_SESSION['message'] = "<p style='color: red'>Please select a file to upload!</p>";;
    }
    header("Location: complete.php");
    return;
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
      <?php echo "<p style='font-size: 2em'>This tasks are assigned for ",$_SESSION['emp'],"</p>"; ?>
    </div>
    <div class="container" id="scrollBar">
      <ul id="tasks" class="list-group">
        <li class="list-group-item">
          <div id="countTasks">3 tasks</div>
        </li>
        <li class="list-group-item">
          <input title="Complete Task" type="button" class="btn-lg btn-outline-success" value="&#x2713;" onclick="checkListItem(this)"> task 1
        </li>
        <li class="list-group-item">
          <input title="Complete Task" type="button" class="btn-lg btn-outline-success" value="&#x2713;" onclick="checkListItem(this)">
           task 2
        </li>
        <li class="list-group-item">
          <input title="Complete Task" type="button" class="btn-lg btn-outline-success" value="&#x2713;" onclick="checkListItem(this)">
           task 3
        </li>
      </ul>
    </div>
    <div class="container py-3">
      <form method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">
      </form>
      <?php
        if (isset($_SESSION['message'])) {
          echo $_SESSION['message'];
          unset($_SESSION['message']);
        }
      ?>
    </div>
    <!--   f00e78 -->
  </body>
  <script type="text/javascript">
    var x,y, taskCounter=0;
    function checkListItem(currentElement){
      $(currentElement).parent().css("background-color", "rgba(91, 192, 222, 0.2)");
      currentElement.className = "btn-lg btn-success";
      Swal.fire({
        icon: 'success',
        title: 'Your work has been marked completed',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>
  </html>
