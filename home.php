<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>


<?php
if (isset($_SESSION['user_id'])) {
?>
    <div class="content-main-cards">
        <div class="customers-card card">
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
            <div class="stat">
                <div class="sql">
                    <?php
                    $date1 =  date('Y') . "-" . date('m') . "-" . date('d');
                    $date2 =  date('Y') . "-" . date('m') . "-" . date('d')  . date('H') . ":" . date('i') . ":" . date('s');

                    $sql1 = 'SELECT COUNT(DISTINCT customer_id) AS cust_count FROM sales
                WHERE date <= NOW() AND date >= CURDATE()';

                    $result1 = mysqli_query($conn, $sql1);
                    $count = mysqli_fetch_assoc($result1);
                    ?><h1><?php echo  $count['cust_count'];
                            ?><h1>
                </div>
                <div class="label1">
                    <h5>Daily Customer Count</h5>
                </div>
            </div>
        </div>
        <div class="amt-card card">
            <div class="icon">
                <img src="libs/images/rupee.png" alt="rupee" width="90px" height="90px">
            </div>
            <div class="stat">
                <div class="sql1">
                    <?php
                    $sql2 = 'SELECT SUM(total_amt) as daily_rev FROM sales WHERE date <= NOW() AND date >= CURDATE()';
                    $result2 = mysqli_query($conn, $sql2);
                    $sum = mysqli_fetch_assoc($result2);
                    ?><h2><?php echo  $sum['daily_rev'];
                            ?><h2>
                </div>
                <div class="label1">
                    <h5>Daily Revenue Generated</h5>
                </div>
            </div>
        </div>
        <div class="cart-card card " onclick="location.href='cart.php'">
            <div class="icon">
                <img src="libs/images/shopping-cart.png" alt="cart" width="50px" height="50px">
            </div>
            <div class="text">
                <strong>Bill a cart</strong>
            </div>
        </div>
    </div>
    </div>

    <?php
    $sql3 = 'SELECT sales.product_id,  product.product_name, SUM(sales.quantity) as qty FROM sales, product
WHERE sales.product_id = product.product_id GROUP BY product_id ORDER BY qty DESC';
    $result3 = mysqli_query($conn, $sql3);
    $info1 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
    ?>

    <?php
    $sql4 = 'SELECT product.product_name, sales.quantity FROM sales,product
 WHERE sales.product_id = product.product_id ORDER BY sales.date DESC LIMIT 20';
    $result4 = mysqli_query($conn, $sql4);
    $info2 = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    ?>

    <div class="dashboard-tables">
        <div class="highest-selling-table">
            <h1>Highest Selling Products</h1>
            <table id="customer-table">
                <tr>
                    <th>Product Name</th>
                    <th>Qty Sold</th>
                </tr>
                <?php foreach ($info1 as $item) : ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['qty']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

        <div class="recent-sales">
            <h1>Recent Sales</h1>
            <table id="customer-table">
                <tr>
                    <th>Product Name</th>
                    <th>Qty Sold</th>
                </tr>
                <?php foreach ($info2 as $item) : ?>
                    <tr>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>



<?php   } else {
    header("Location: index.php");
    exit();
}
?>


<?php include 'includes/footer.php' ?>