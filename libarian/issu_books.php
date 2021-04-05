<?php 
require_once('header.php');

if(isset($_POST['issubook'])){ 
  

  
 
    $std_id= $_POST['std_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];

    $query = mysqli_query($dbcon,"INSERT INTO `issue_book`( `std_id`, `book_id`, `book_issue_date`) VALUES ('$std_id','$book_id','$book_issue_date')");
 
    if($query){  
    ?>
      <script type="text/javascript">
        alert('Book Issue Successfully');
      </script>
    <?php
      
      }else{ 
        ?>
<script type="text/javascript">
        alert('Book Issue Not Successfully');
      </script>
        <?php
      }



}


 ?>
<!-- ========================================================= -->
<div class="content">
 <!-- content HEADER -->
 <!-- ========================================================= -->
 <div class="content-header">
  <!-- leftside content header -->
  <div class="leftside-content-header">
   <ul class="breadcrumbs">
    <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
    <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Issue Books</a></li>
   </ul>
  </div>
 </div>
 <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
 <div class="row animated fadeInUp">
  <div class="col-sm-12 col-lg-9">
   <div class="row">



    <div class="col-md-12 col-md-offset-6">
     <h4>Issue Books</h4>
     <form class="form-inline" method="post">

      <div class="form-group">



       <select class="form-control" name="student_id">
        <option>Select </option>

        <?php 
          $query = mysqli_query($dbcon,"SELECT * FROM std");
           while($row = mysqli_fetch_assoc($query)){                    
            ?>
        <option value=<?= $row['id']; ?>>
         <?php echo  ucwords($row['fname'].''.$row['lname'].' - '. '( '.$row['roll'].' )')?> </option>


        <?php
         }
         ?>
       </select>




      </div>

      <div class="form-group">
       <button type="search" class="btn btn-primary" name="search">search</button>
      </div>
     </form>

     <?php
     
      if(isset($_POST['search'])){ 

       
       $id = $_POST['student_id'];
       $result = mysqli_query($dbcon, "SELECT * FROM std WHERE `id`='$id' AND `status`='1'");
       $row = mysqli_fetch_assoc($result);

       


       
      }
     
     ?>

     

    </div>





   </div>

   <div class="panel col-md-6 col-md-offset-6">
      <div class="panel-content">
       <div class="row">
        <div class="col-md-12">
         <form method="post">
          <h5 class="mb-md ">Show Student Details</h5>

          <div class="form-group">
       
           <input type="email" class="form-control" id="email" placeholder="Name" Value="<?php echo  ucwords($row['fname'].''.$row['lname'])?>" readonly>
           <input type="hidden" name="std_id" value="<?= $row['id'] ?>">
          </div>

          <div class="form-group">


          <h5>Book Name</h5>
       <select class="form-control" name="book_id">
        
        <option>Select </option>

        <?php 
          $query = mysqli_query($dbcon,"SELECT * FROM `books` WHERE `available_qty`>'0'");
           while($row = mysqli_fetch_assoc($query)){                    
            ?>
        <option value=<?= $row['id']; ?>>
         <?php echo  $row['book_name']?> </option>


        <?php
         }
         ?>
       </select>
      </div>
      <div class="form-group">
       <h5>Book Issue Date</h5>
       <input type="date" name="book_issue_date" class="form-control"  value="<?php echo date('Y-d-m');?>">
       
      </div>
          <div class="form-group">
           <button type="submit" class="btn btn-primary" name="issubook">Issue BOok</button>
          </div>
         </form>
        </div>
       </div>
      </div>
     </div>

  </div>
 </div>
 <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
</div>



<?php 
        require_once('footer.php')
    ?>