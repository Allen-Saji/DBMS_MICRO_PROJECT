<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$sql = 'SELECT * FROM customer';
$result = mysqli_query($conn, $sql);
$customer_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="customer-header">
    <h1>Customer Details</h1>
</div>

<a href="addCustomer.php"><button id="add-customer" type="submit">Add customer</button></a>

<div class="customer-table">
    <table id="customer-table">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        <?php foreach ($customer_info as $item) : ?>
            <tr>
                <td><?php echo $item['customer_id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['phone_number']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>



<?php include 'includes/footer.php'; ?>