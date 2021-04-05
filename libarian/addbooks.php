

<?php 


require_once('header.php');

if(isset($_POST['save_book'])){ 
    $book_name= $_POST['book_name'];
    
    $book_author_name = $_POST['book_author_name'];
    $book_purchease_date = $_POST['book_purchease_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];

   

    $image = explode('.',$_FILES['book_image']['name']);

    $image_ext = end($image);

    $image = date('Ymdhis.'). $image_ext;

   
     $query = "INSERT INTO `books`( `book_name`, `book_image`, `book_author_name`, `book_purchease_date`, `book_price`, `book_qty`, `available_qty` ) VALUES ('$book_name','$image','$book_author_name','$book_purchease_date','$book_price','$book_qty','$available_qty')";
    $datasubmit = mysqli_query($dbcon, $query);


if(isset($datasubmit)){ 

    move_uploaded_file($_FILES['book_image']['tmp_name'],'../image/books/'.$image);
                   $booksuc = "Well done!";
                 }else{  
                     $bookerro = "Some Error";
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
                            <li><i class="" aria-hidden="true"></i><a href="javascript:avoid(0)">Add Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                    <div class="col-sm-8 col-sm-offset-2 ">
                        <div class="row">
                            
                        <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">


                                <?php 
                    if(isset($booksuc)){ 

                    ?>

                        <div class="alert alert-primary" role="alert">
                        <h3><?php echo $booksuc; ?></h3>
                        <p>your registation success full</p>
                        </div>
                    <?php

                    }
                    
                    ?>

                    <?php 
                    if(isset($bookerro)){ 

                    ?>

                        <div class="alert alert-primary" role="alert">
                        <h3><?php echo $bookerro; ?></h3>
                        <p>your success full</p>
                        </div>
                    <?php

                    }
                    
                    ?>



                                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                                        <h5 class="mb-lg">Add Book</h5>

                                        <div class="form-group">
                                            <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                            <div class="col-sm-7">
                                                <input type="file" class="form-control" id="book_image" placeholder="Book Image" name="book_image">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                            <div class="col-sm-7">
                                                <input type="text" class="form-control" id="book_author_name"  placeholder="Book Author Name" name="book_author_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchease_date" class="col-sm-4 control-label">Purchase Date</label>
                                            <div class="col-sm-7">
                                                <input type="date" class="form-control" id="book_purchease_date" placeholder="Book Purchase Date" name="book_purchease_date">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                            <div class="col-sm-7">
                                                <input type="number" class="form-control" id="book_price" placeholder="Book Price" name="book_price">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                            <div class="col-sm-7">
                                                <input type="number" class="form-control" id="book_qty" placeholder="Book Quantity" name="book_qty">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty" class="col-sm-4 control-label">Book Available Quantity</label>
                                            <div class="col-sm-7">
                                                <input type="number" class="form-control" id="available_qty"  placeholder="Book Available Quantity" name="available_qty">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="form-group">
                                            <div class="col-sm-offset-6 col-sm-6">
                                                <button type="submit" class="btn btn-primary" name="save_book"> <i class="fa fa-save"></i> Save Book</button>
                                            </div>
                                        </div>
                                    </form>
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
    