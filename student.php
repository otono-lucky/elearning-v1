<?php
  include "connect.php";
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  

  <title>Student Dashboard</title>

<script>
function showVid(str) {
  if (str == "") {
    document.getElementById("vid").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("vid").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getuser.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

   

</head>
<body>
 


<!-- <div class="embed-responsive embed-responsive-21by9" id="vid">
 <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
</div> -->

 <div class="container-fluid">

                     <div class="col-lg-6">

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Topics</h6>
        </div>
        <div class="card-body">
            <!-- t -->
           
            <div class="my-2"></div>
            <!-- <a href="#" class="btn btn-secondary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-arrow-right"></i>
                </span>
                <span class="text">Update Record</span>
            </a> -->
            

            <div class="my-2"></div>

    <form method="post" action="">
    <div class="form-group">
      <label for="sel1">Click here to select topic as you go:</label>
      
        <?php
             $con = connect();
            $sql = 'SELECT topic_name FROM topics';
            $result = mysqli_query($con, $sql) or die(mysqli_error($con));
            echo "<select name='topic_name' class='form-control' id='sel1'>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option>".$row['topic_name']."</option>";
            }
            echo "</select>";

            
        ?>
      </select>
    </div>

    

    
  </form>
     

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>