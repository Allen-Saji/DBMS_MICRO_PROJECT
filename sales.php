<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$sql = 'SELECT * FROM sales ORDER BY date DESC LIMIT 20';
$result = mysqli_query($conn, $sql);
$sale_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="customer-header">
    <h1>Sales Details</h1>
</div>


<div class="customer-table">
    <table id="customer-table">
        <tr>
            <th>Sale Id</th>
            <th>Customer Id</th>
            <th>Product Id</th>
            <th>Quantity</th>
            <th>Total Amount</th>
            <th>Sale Date</th>
        </tr>
        <?php foreach ($sale_info as $sale) : ?>
            <tr>
                <td><?php echo $sale['sale_id']; ?></td>
                <td><?php echo $sale['customer_id']; ?></td>
                <td><?php echo $sale['product_id']; ?></td>
                <td><?php echo $sale['quantity']; ?></td>
                <td><?php echo $sale['total_amt']; ?></td>
                <td><?php echo $sale['date']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>



<?php include 'includes/footer.php'; ?>