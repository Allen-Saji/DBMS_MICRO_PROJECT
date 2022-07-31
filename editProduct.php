<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$product_id = $qty = '';


if (isset($_POST['update'])) {
    $product_id = filter_input(
        INPUT_POST,
        'product_id',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $qty = filter_input(
        INPUT_POST,
        'qty',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $sql1 = "UPDATE product SET quantity = '{$qty}' WHERE product_id = '{$product_id}'";
    if (mysqli_query($conn, $sql1)) {
        // success
        header('Location: products.php');
    } else {
        // error
        echo 'Error: ' . mysqli_error($conn);
    }
}

if (isset($_POST['delete'])) {

    $product_id = filter_input(
        INPUT_POST,
        'product_id',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

    $sql2 = "DELETE FROM product WHERE product_id = '{$product_id}'";
    if (mysqli_query($conn, $sql2)) {
        // success
        header('Location: products.php');
    } else {
        // error
        echo 'Error: ' . mysqli_error($conn);
    }
}
?>


<div class="editProduct-form">
    <form action="" method="POST">

        <h2>Edit Product</h2>
        <div class="editProduct-fields">
            <label for="product_id">Product Id:</label>
            <input type="text" placeholder="Enter Product Id" name="product_id" required>
        </div>
        <div class="editProduct-fields">
            <label for="qty">Qty:</label>
            <input type="number" placeholder="Enter Quantity" name="qty" required>
        </div>

        <div class="edit-prod-btns">
            <input type="submit" name="update" value="Update" class="update-prod">
            <input type="submit" name="delete" value="Delete" class="update-prod">
        </div>


    </form>
</div>


<?php include 'includes/footer.php'; ?>