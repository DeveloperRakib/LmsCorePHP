<?php 
require_once('header.php');
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
                            <li><i class="" aria-hidden="true"></i><a href="javascript:avoid(0)">Return Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
           
          
            <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            <!--SEARCHING, ORDENING & PAGING-->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Return Book</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Roll</th>
                                        <th>Phone</th>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                        <th>Return Book</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                    $query = "SELECT  `issue_book` . `id`,  `issue_book` . `book_issue_date`, `std`. `fname` , `std` . `lname`, `std`. `roll`, `std`. `phone`, `books`. `book_name`, `books`. `book_image`
                                    FROM `issue_book`
                                    INNER JOIN `std` ON `std`.`id` = `issue_book`. `std_id`
                                    INNER JOIN `books` ON 	`books`. `id` = `issue_book` . `book_id`
                                    WHERE `issue_book` . `book_return_date` = ''";

                                     $result = mysqli_query($dbcon, $query);
                                     while($row = mysqli_fetch_assoc($result)){ 

                                 
                                    ?>
                                    <tr>
                                    <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                                    <td><?= $row['roll']  ?></td>
                                    <td><?= $row['phone']  ?></td>
                                    <td><?= $row['book_name']  ?></td>
                                    <td><img style= "width:100px" src="../image/books/<?= $row['book_image']  ?>" alt=""></td>
                                    <td><?= $row['book_issue_date']  ?></td>
                                    <td><a href="return_book.php?id=<?= $row['id']  ?>">Return Book</a></td>
                                  
                                    <td>
                                    
                                      
                                      
                                    </td>
                                        
                                    </tr>
                                   <?php 
                                    }
                                   ?>
                           
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
            
        <?php 
         if(isset($_GET['id'])){  
          $id = $_GET['id'];
          $date = date('d-m-yy');
          $query = "UPDATE `issue_book` SET `book_return_date`='$date' WHERE `id`='$id'";

          $result = mysqli_query($dbcon,$query);
         }

         if($result){ 
          ?>
          <script type="text/javascript">
           alert('Book Return Sucsessfully')
          </script>
          <?php
         }else{
          ?>
          <script type="text/javascript">
           alert('Someting Rong ')
          </script>
          <?php
         }
        
        ?>
    
    <?php 
        require_once('footer.php')
    ?>
     