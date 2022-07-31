<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$name = $category = $qty = $price =  '';
$nameErr = $catErr = $quantErr = $priceErr =  '';

if (isset($_POST['submit'])) {

    if (empty($_POST['name'])) {
        $nameErr = 'product name is required';
    } else {

        $name = filter_input(
            INPUT_POST,
            'name',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }


    if (empty($_POST['category'])) {
        $catErr = 'category is required';
    } else {
        $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_EMAIL);
    }


    if (empty($_POST['qty'])) {
        $quantErr = 'product quantity is required';
    } else {
        $qty = filter_input(
            INPUT_POST,
            'quantity',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }


    if (empty($_POST['price'])) {
        $phnErr = 'product price is required';
    } else {
        // $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(
            INPUT_POST,
            'price',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    if (empty($nameErr) && empty($catErr) && empty($quantErr) && empty($priceErr)) {
        // add to database
        $sql = "INSERT INTO product (product_name, category, quantity, price)
         VALUES ('$name', '$category', '$qty', '$price')";
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: products.php');
        } else {
            // error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>

<div class="editProduct-form">
    <form action="" method="POST">

        <h2>Add Product</h2>
        <div class="editProduct-fields">
            <label for="name">Product Name:</label>
            <input type="text" placeholder="Enter Product Name" name="name" required>
        </div>

        <div class="editProduct-fields">
            <label for="category">Category:</label>
            <input type="text" placeholder="Enter Category" name="category" required>
        </div>

        <div class="editProduct-fields">
            <label for="qty">Qty:</label>
            <input type="number" placeholder="Enter Quantity" name="qty" required>
        </div>

        <div class="editProduct-fields">
            <label for="price">Price:</label>
            <input type="number" placeholder="Enter Price" name="price" required>
        </div>

        <div class="edit-prod-btns">
            <input type="submit" name="submit" value="Add" class="add-prod-btn">
        </div>


    </form>
</div>


<?php include 'includes/footer.php'; ?>