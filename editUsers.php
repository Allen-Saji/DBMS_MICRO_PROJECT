<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>


<?php
if (isset($_SESSION['user_id'])) {
    if (strpos($_SESSION['user_id'], 'admin')) {

        if (isset($_POST['update'])) {

            $name = filter_input(
                INPUT_POST,
                'name',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

            $user_id = filter_input(
                INPUT_POST,
                'user_id',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

            $phn = filter_input(
                INPUT_POST,
                'phn',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

            $password = filter_input(
                INPUT_POST,
                'password',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

            $role = filter_input(
                INPUT_POST,
                'role',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

            $sql1 = "UPDATE user SET name = '{$name}', password = '{$password}',  
            phone_number = '{$phn}', role = '{$role}'
            WHERE user_id = '{$user_id}'";
            if (mysqli_query($conn, $sql1)) {
                // success
                header('Location: manageUsers.php');
            } else {
                // error
                echo 'Error: ' . mysqli_error($conn);
            }
        }

        if (isset($_POST['delete'])) {
            $user_id = filter_input(
                INPUT_POST,
                'user_id',
                FILTER_SANITIZE_FULL_SPECIAL_CHARS
            );

            $sql2 = "DELETE FROM user WHERE user_id = '{$user_id}'";
            if (mysqli_query($conn, $sql2)) {
                // success
                header('Location: manageUsers.php');
            } else {
                // error
                echo 'Error: ' . mysqli_error($conn);
            }
        }
?>
        <div class="editProduct-form">

            <form action="" method="POST" class="addUserForm">
                <h2>Edit User</h2>
                <div class="editProduct-fields">
                    <label for="user_id">User Id:</label>
                    <input type="text" name="user_id" placeholder="Enter User Id" required>
                </div>
                <div class="editProduct-fields">
                    <label for="name">Name:</label>
                    <input type="text" name="name" placeholder="Enter Name" required>
                </div>
                <div class="editProduct-fields">
                    <label for="password">Password:</label>
                    <input type="text" name="password" placeholder="Enter Password" required>
                </div>
                <div class="editProduct-fields">
                    <label for="phn">Phone Number:</label>
                    <input type="number" name="phn" placeholder="Enter Phone Number" required>
                </div>
                <div class="editProduct-fields">
                    <label for="role">Role:</label>
                    <input type="text" name="role" placeholder="Enter Role" required>
                </div>
                <input type="submit" value="Update " class="add-user-btn" name="update">
                <input type="submit" value="Remove " class="add-user-btn" name="delete">
            </form>
        </div>


<?php   }
} else {
    header("Location: index.php");
    exit();
}
?>

<?php include 'includes/footer.php' ?>