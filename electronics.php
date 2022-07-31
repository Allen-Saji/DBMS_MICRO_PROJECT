<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$sql = 'SELECT * FROM product WHERE category = "electronics" ORDER BY quantity';
$result = mysqli_query($conn, $sql);
$product_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="product-header">
    <h1 id="electronics">Electronic Products</h1>
</div>
<div class="product-content">

    <a href="addProduct.php"><button id="add-product-elec" type="submit">Add Product</button></a>

    <table id="customer-table ">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        <?php foreach ($product_info as $item) : ?>
            <tr>
                <td><?php echo $item['product_id']; ?></td>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['category']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


</div>

<script src="/scripts/categories.js"></script>
<?php include 'includes/footer.php'; ?>