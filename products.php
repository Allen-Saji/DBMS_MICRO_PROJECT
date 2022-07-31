<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$sql = 'SELECT * FROM product ';
$result = mysqli_query($conn, $sql);
$product_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="product-header">
    <h1 id="inventory">Inventory</h1>
</div>
<div class="product-content">
    <h2>Select Category: </h2>
    <div class="category">
        <div class="category-card" onclick="location.href='sport.php'">
            Sports
        </div>
        <div class="category-card" onclick="location.href='personal_care.php'">
            Personal Care
        </div>
        <div class="category-card" onclick="location.href='electronics.php'">
            Electronics
        </div>
        <div class="category-card" onclick="location.href='grocery.php'">
            Grocery
        </div>
    </div>

    <a href="addProduct.php"><button id="add-product" type="submit">Add Product</button></a>
    <a href="editProduct.php"><button id="edit-product" type="submit">Edit Product</button></a>

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

<script src="script.js"></script>
<?php include 'includes/footer.php'; ?>