<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<div class="bill-form">
    <form id="cart-form" action="" method="POST">
        <div class="sale-info">
            <div class="customer-input">
                <label for="cust_id">Customer ID:</label>
                <input type="number" placeholder="Enter Customer ID" name="cust_id" value="?php echo (isset($cust_id))?$cust_id:'';?>">
                <a href="addCustomer.php"><button type="button" class="bill-add-cust-btn">Add New Customer</button></a>
            </div>
        </div>
        <div class="product-info">
            <label for="product_id">Product ID:</label>
            <input type="number" placeholder="Enter Customer ID" name="product_id">
            <label for="qty">Qty:</label>
            <input type="number" name="qty" placeholder="Enter Quantity">
            <input type="submit" value="Add" name="submit" class="bill-add-cust-btn">
        </div>
        <input id="generate-bill" type="submit" value="Generate Bill" name="generate_bill" class="bill-add-cust-btn">
    </form>
</div>


<?php

$cust_id = $product_id = $qty = '';
$date =  date('Y') . "-" . date('m') . "-" . date('d') . "-" . date('H') . "-" . date('i') . "-" . date('s');

if (isset($_POST['submit'])) {

    $cust_id = filter_input(
        INPUT_POST,
        'cust_id',
        FILTER_SANITIZE_FULL_SPECIAL_CHARS
    );

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

    $sql1 = 'CREATE TABLE IF NOT EXISTS temp_sale(
        sale_id int NOT NULL AUTO_INCREMENT,
        customer_id int NOT NULL ,
        product_id int NOT NULL,
        product_name varchar(50) NOT NULL,
        quantity int NOT NULL,
        total_amt int NOT NULL,
        sale_date datetime NOT NULL,
        PRIMARY KEY (sale_id)
    );';
    $result1 = mysqli_query($conn, $sql1);

    $sql2 = "SELECT * FROM product WHERE product_id = '{$product_id}';";
    $result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_array($result2);

    $tot_amt  = $row['price'] * $qty;
    $name = $row['product_name'];



    // while ($row = mysqli_fetch_array($result2)) {
    //     echo $row["price"]; // Print a single column data
    // }

    $sql3 = "INSERT INTO temp_sale (customer_id, product_id, product_name, quantity, total_amt, sale_date)
     VALUES ('$cust_id', '$product_id', '$name' ,'$qty', '$tot_amt', '$date' )";
    $result3 = mysqli_query($conn, $sql3);

    $sql4 = "SELECT * FROM temp_sale;";
    $result4 = mysqli_query($conn, $sql4);
    $item_info = mysqli_fetch_all($result4, MYSQLI_ASSOC);

    $sql5 = "UPDATE product SET quantity = quantity-'{$qty}' WHERE product_id =  '{$product_id}'";
    $result5 = mysqli_query($conn, $sql5);

?>
    <div class="cart-item-list">
        <div class="customer-table">
            <table id="customer-table">
                <tr>
                    <th>Product Id</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Total Amt.</th>
                </tr>
                <?php foreach ($item_info as $item) : ?>
                    <tr>
                        <td><?php echo $item['product_id']; ?></td>
                        <td><?php echo $item['product_name']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo $item['total_amt']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>

    <?php
}
    ?>

    <!-- <script>
        $("#cart-form").submit(function(e) {
            e.preventDefault();
        });
    </script> -->


    <?php
    if (isset($_POST['generate_bill'])) {
        $sql6 = 'SELECT SUM(total_amt) AS total_sum FROM temp_sale';
        $result6 = mysqli_query($conn, $sql6);
        $sum = mysqli_fetch_assoc($result6);

        $sql4 = "SELECT * FROM temp_sale;";
        $result4 = mysqli_query($conn, $sql4);
        $item_info = mysqli_fetch_all($result4, MYSQLI_ASSOC);
    ?>
        <div class="cart-item-list">
            <div class="customer-table">
                <table id="customer-table">
                    <tr>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Total Amt.</th>
                    </tr>
                    <?php foreach ($item_info as $item) : ?>
                        <tr>
                            <td><?php echo $item['product_id']; ?></td>
                            <td><?php echo $item['product_name']; ?></td>
                            <td><?php echo $item['quantity']; ?></td>
                            <td><?php echo $item['total_amt']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="bill-amt">
                <h2 id="bill-amount">Bill Amount: <?php echo $sum['total_sum'] ?></h2>
            </div>


        <?php

        $sql7 = 'INSERT INTO sales (customer_id, product_id, quantity, total_amt, date)
        SELECT customer_id, product_id, quantity, total_amt, sale_date FROM temp_sale';
        $result7 = mysqli_query($conn, $sql7);


        $sql8 = 'DROP TABLE temp_sale';
        $result8 = mysqli_query($conn, $sql8);
    }

        ?>






        <?php include 'includes/footer.php' ?>