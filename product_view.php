<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Lists</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <h3>Product Lists</h3>
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#addModal">Add New</button>
 
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Jumlah</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($product as $row):?>
                <tr>
                    <td><?= $row->product_name;?></td>
                    <td><?= $row->product_price;?></td>
                    <td><?= $row->product_jumlah;?></td>
                    <td><?= $row->category_name;?></td>
                    <td>
                        <a href="#" class="btn btn-info btn-sm btn-edit" data-id="<?= $row->product_id;?>" data-name="<?= $row->product_name;?>" data-price="<?= $row->product_price;?>" data-jumlah="<?= $row->product_jumlah;?>" data-category_id="<?= $row->product_category_id;?>">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row->product_id;?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
 
    </div>
     
    <!-- Modal Add Product-->
    <form action="/product/save" method="post">
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" class="form-control" name="product_jumlah" placeholder="Product Jumlah">
                </div>
 
                <div class="form-group">
                    <label>Category</label>
                    <select name="product_category" class="form-control">
                        <option value="">-Select-</option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Add Product-->
 
    <!-- Modal Edit Product-->
    <form action="/product/update" method="post">
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control product_name" name="product_name" placeholder="Product Name">
                </div>
                 
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control product_price" name="product_price" placeholder="Product Price">
                </div>

                <div class="form-group">
                    <label>Jumlah</label>
                    <input type="text" class="form-control product_jumlah" name="product_jumlah" placeholder="Product Jumlah">
                </div>
 
                <div class="form-group">
                    <label>Category</label>
                    <select name="product_category" class="form-control product_category">
                        <option value="">-Select-</option>
                        <?php foreach($category as $row):?>
                        <option value="<?= $row->category_id;?>"><?= $row->category_name;?></option>
                        <?php endforeach;?>
                    </select>
                </div>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="product_id">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Edit Product-->
 
    <!-- Modal Delete Product-->
    <form action="/product/delete" method="post">
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
             
               <h4>Are you sure want to delete this product?</h4>
             
            </div>
            <div class="modal-footer">
                <input type="hidden" name="product_id" class="productID">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" class="btn btn-primary">Yes</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    <!-- End Modal Delete Product-->
 
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            const name = $(this).data('name');
            const price = $(this).data('price');
            const jumlah = $(this).data('jumlah');
            const category = $(this).data('category_id');
            // Set data to Form Edit
            $('.product_id').val(id);
            $('.product_name').val(name);
            $('.product_price').val(price);
            $('.product_jumlah').val(jumlah);
            $('.product_category').val(category).trigger('change');
            // Call Modal Edit
            $('#editModal').modal('show');
        });
 
        // get Delete Product
        $('.btn-delete').on('click',function(){
            // get data from button edit
            const id = $(this).data('id');
            // Set data to Form Edit
            $('.productID').val(id);
            // Call Modal Edit
            $('#deleteModal').modal('show');
        });
         
    });
</script>
</body>
</html>