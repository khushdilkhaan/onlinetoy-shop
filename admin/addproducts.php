<?php include "header.php"; ?>



<form method="post" action="addproducts.php" enctype="multipart/form-data">
<div class="col-lg-12">
    <div class="card">


    <?php 
                        if(isset($_POST["submit"])){
                            $title = $_POST["name"];
                            $details = $_POST["details"];
                            $price = $_POST["price"];
                            $quantity = $_POST["quantity"];
                            $category = $_POST["category"];
                            $image = $_FILES["img"]["name"];
                            $path = "products_images/";

                    
                             

                       
                            
                        $add_info_query = "insert into products(product_name,product_details,price,quantity_available,category,product_image)value('$title','$details', '$price','$quantity', '$category', '$image')";
                       if(mysqli_query($link,$add_info_query) && move_uploaded_file($_FILES["img"]["tmp_name"],$path.$image)){
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>DEAR ADMIN!</strong> Data Inserted Successfully.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>';
                       }else{
                            echo " error".mysqli_error($link);
                       }
                    }
                    


                        
                        ?>






        <div class="card-header">
            <strong>ADD</strong>
            <small> PRODUCTS</small>
        </div>
        <div class="card-body card-block">
            <div class="form-group">
                <label for="name" class="form-control-label">NAME</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="details" class="form-control-label">DETAILS</label>
                <input type="text" name="details" id="details" class="form-control">
            </div>
            <div class="form-group">
                <label for="price" class="form-control-label">PRICE</label>
                <input type="text" name="price" id="price" class="form-control">
            </div>
            <div class="form-group">
                <label for="quantity" class="form-control-label">QUANTITY</label>
                <input type="text" name="quantity" id="quantity" class="form-control">
            </div>
            <div class="form-group">
                <label for="category" class="form-control-label">CATEGORY</label>
                <input type="text" name="category" id="category" class="form-control">
            </div>
        
            <div class="form-group">
                <label for="country" class="form-control-label">IMAGE</label>
                <input type="file" name="img" id="img" class="form-control">
            </div>
            <div class="form-group">
            <input type="submit" name="submit" value="submit" class="btn btn-primary " >
            </div>
        </div>
    </div>
</div>
</form>

<?php include "footer.php"; ?>
