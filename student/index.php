<?php 
require_once('header.php');
require_once('../dbcon.php')
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
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-md-12 ">
                        <div class="row">
                            <!--SEARCHING, ORDENING & PAGING-->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>All Esuue Book</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <table id="basic-table" class="data-table table-bordered table table-striped nowrap table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Book Name</th>
                                        <th>Book Image</th>
                                        <th>Book Issue Date</th>
                                       
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                  
                                    <?php
                                        print_r($_SESSION);

                                        $std_id = $_SESSION['std_id'];
                                        echo $std_id;

                                        $query = "SELECT `issue_book` . `book_issue_date`, `books` . `book_name` , `books` . `book_image`
                                        FROM `books` 
                                        INNER JOIN `issue_book` ON `issue_book` . `book_id` = `books` .	`id`
                                        WHERE `issue_book` . `std_id` = '$std_id;'";
                                        $result = mysqli_query($dbcon, $query);
                                        

                                        while($data = mysqli_fetch_assoc($result)){ 
                                            ?>
                                           

                                            <tr>
                                    <td><?= $data['book_name'] ?></td>
                                    <td><img style= "width:200px" src="../image/books/<?= $data['book_image'] ?>" alt=""></td>
                                    <td><?= $data['book_issue_date'] ?></td>
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
                            
                        </div>
                        
                        
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
            
        
    
    <?php 
        require_once('footer.php')
    ?>
    