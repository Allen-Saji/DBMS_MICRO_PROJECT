<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>


<?php
if (isset($_SESSION['user_id'])) {
?>

    <?php
    $sql = 'SELECT * FROM user';
    $result = mysqli_query($conn, $sql);
    $customer_info = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <div class="customer-header">
        <h1>Manage Users</h1>
    </div>

    <div class="manange-user-btns">
        <a href="editUsers.php"><button id="edit-user" type="submit">Edit User</button></a>
        <a href="addUsers.php"><button id="add-user" type="submit">Add User</button></a>
    </div>



    <div class="customer-table">
        <table id="customer-table">
            <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Role</th>
            </tr>
            <?php foreach ($customer_info as $item) : ?>
                <tr>
                    <td><?php echo $item['user_id']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['phone_number']; ?></td>
                    <td><?php echo $item['role']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>


<?php   } else {
    header("Location: index.php");
    exit();
}
?>


<?php include 'includes/footer.php' ?>