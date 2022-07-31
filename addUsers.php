<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
if (isset($_SESSION['user_id'])) {
    if (strpos($_SESSION['user_id'], 'admin')) {

        if (isset($_POST['submit'])) {

            $user_id = $name = $password = $phn = $role = '';

            if (empty($_POST['name'])) {
                $nameErr = 'user name is required';
            } else {

                $name = filter_input(
                    INPUT_POST,
                    'name',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }


            if (empty($_POST['user_id'])) {
                $idErr = 'user id is required';
            } else {

                $user_id = filter_input(
                    INPUT_POST,
                    'user_id',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }


            if (empty($_POST['phn'])) {
                $phnErr = 'product name is required';
            } else {

                $phn = filter_input(
                    INPUT_POST,
                    'phn',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }


            if (empty($_POST['password'])) {
                $passErr = 'product name is required';
            } else {

                $password = filter_input(
                    INPUT_POST,
                    'password',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }

            if (empty($_POST['role'])) {
                $roleErr = 'product name is required';
            } else {

                $role = filter_input(
                    INPUT_POST,
                    'role',
                    FILTER_SANITIZE_FULL_SPECIAL_CHARS
                );
            }


            $sql = "INSERT INTO user (user_id , name, password, phone_number, role)
         VALUES ('$user_id', '$name', '$password', '$phn', '$role')";
            if (mysqli_query($conn, $sql)) {
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
                <h2>Add New User</h2>
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
                <input type="submit" value="Add User" class="add-user-btn" name="submit">
            </form>
        </div>


<?php   }
} else {
    header("Location: index.php");
    exit();
}
?>

<?php include 'includes/footer.php' ?>