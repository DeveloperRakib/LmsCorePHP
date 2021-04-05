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
                            <li><i class="" aria-hidden="true"></i><a href="javascript:avoid(0)">Manage Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                
                            
                            
                <div class="col-sm-12">
                    <h4 class="section-subtitle"><b>Searching, ordering and paging</b></h4>
                    <div class="panel">
                        <div class="panel-content">
                            <div class="table-responsive">
                                <div id="basic-table_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="basic-table_length"><label>Show <select name="basic-table_length" aria-controls="basic-table" class="form-control input-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-6"><div id="basic-table_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="basic-table"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="basic-table" class="data-table table table-striped nowrap table-hover dataTable no-footer" cellspacing="0" width="100%" role="grid" aria-describedby="basic-table_info" style="width: 100%;">

                                    <thead>
                                    <tr role="row">
                                        
                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 161px;">Book Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 265px;">Book Image</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 120px;">Book Author Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 61px;">Book Price</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 117px;">Book Quantity</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 93px;">Book Available Quantity</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-table" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 93px;">Action</th>
                                </tr>
                                    </thead>
                                    <tbody>
                                    
                                  <?php 
                                   $query = mysqli_query($dbcon, "SELECT * FROM books");
                                    while ($row = mysqli_fetch_array($query)){

                                    
                                  ?>                               
                                    <tr role="row" class="odd">
                                        
                                        <td><?php echo $row['book_name'] ?></td>
                                        <td><img style="width: 100px" src="../image/books/<?php echo $row['book_image'] ?>" alt=""></td>
                                        <td ><?php echo $row['book_author_name'] ?></td>
                                        <td><?php echo $row['book_price'] ?></td>
                                        <td><?php echo $row['book_qty'] ?></td>
                                        <td><?php echo $row['available_qty'] ?></td>
                                        <td>
                                            <a class="btn btn-info" href="javascript:avoide(0)" data-toggle="modal" data-target="#book-<?php echo $row['id'] ?>"><i class="fa fa-eye"></i></a>
                                            <a class="btn btn-warning" href="javascript:avoide(0)" data-toggle="modal" data-target="#bookup-<?php echo $row['id'] ?>"><i class="fa fa-pencil"></i></a>
                                            <a class="btn btn-danger" href="delete.php?bookdelete=<?php  echo base64_encode($row['id']) ?>"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                                </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="basic-table_info" role="status" aria-live="polite">Showing 1 to 10 of 30 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="basic-table_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="basic-table_previous"><a href="#" aria-controls="basic-table" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="basic-table" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="basic-table" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="basic-table" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button next" id="basic-table_next"><a href="#" aria-controls="basic-table" data-dt-idx="4" tabindex="0">Next</a></li></ul></div></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                   
    


                <?php 
                                   $query = mysqli_query($dbcon, "SELECT * FROM books");
                                    while ($row = mysqli_fetch_array($query)){

                                    
                                  ?>      

<!-- Modal -->
<div class="modal fade" id="book-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-primary">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-default-label">Book Info</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>Book Name</th>
                                                    <td><?php echo $row['book_name'] ?></td>
                                        
                                                </tr>
                                                <tr>
                                                    <th>Book Image</th>
                                                    <td><img style="width: 100px" src="../image/books/<?php echo $row['book_image'] ?>" alt=""></td>
                                        
                                                </tr>
                                                <tr>
                                                    <th>Book Author Name</th>
                                                    <td ><?php echo $row['book_author_name'] ?></td>
                                        
                                                </tr>
                                                <tr>
                                                    <th> Book Price</th>
                                                    <td><?php echo $row['book_price'] ?></td>
                                       
                                                </tr>
                                                <tr>
                                                    <th>Book Quantity</th>
                                                    <td><?php echo $row['book_qty'] ?></td>
                                        
                                                </tr>
                                                <tr>
                                                    <th>Book Available Quantity</th>
                                                    <td><?php echo $row['available_qty'] ?></td>
                                                </tr>

                                            </table>




                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php } ?>













                            <?php 
                                   $query = mysqli_query($dbcon, "SELECT * FROM books");
                                    while ($row = mysqli_fetch_array($query)){

                                       
                                    
                                  ?>      

<!-- Modal -->
<div class="modal fade" id="bookup-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-default-label">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header state modal-primary">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modal-default-label">Book Update</h4>
                                        </div>
                                        <div class="modal-body">
                                            

                                        
                                            <form method="POST">
                                                <div class="form-group" >
                                                    
                                                    <input type="text" class="form-control" id="email" placeholder="Book Name" name="book_name" value="<?php echo $row['book_name']?>" >
                                                    <input type="hidden" name="id"  value="<?php echo $row['id']?>">
                                                </div>
                                            
                                                <div class="form-group">
                                                   
                                                    <input type="text" class="form-control" id="password" placeholder="Book Author Name" name="book_author_name" value="<?php echo $row['book_author_name']?>" >
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" id="password" placeholder="Book Price" name="book_price" value="<?php echo $row['book_price']?>" >
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" id="password" placeholder="Book Quantity" name="book_qty" value="<?php echo $row['book_qty']?>" >
                                                </div>
                                                <div class="form-group">
                                                    
                                                    <input type="number" class="form-control" id="password" placeholder="Book Available Quantity" name="available_qty" value="<?php echo $row['available_qty']?>" >
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="update"> <i class="fa fa-save"></i> Up Date</button>
                                                </div>
                                            </form>
                                    


                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <?php } 
                            
                            if(isset($_POST['update'])){ 
                                $id= $_POST['id'];
                                $book_name = $_POST['book_name'];
                                $book_author_name = $_POST['book_author_name'];
                                $book_price = $_POST['book_price'];
                                $book_qty = $_POST['book_qty'];
                                $available_qty = $_POST['available_qty'];
                            
                               
                            
                                
                            $query= "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty' WHERE `id`='$id'";
                               
                                 

                                $datasubmit = mysqli_query($dbcon, $query);

                                
                            
                            
                                            
                            }
                            
                            
                            
                            
                            ?>


    
    <?php 
        require_once('footer.php')
    ?>
    