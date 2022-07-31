<?php include 'config/database.php' ?>
<?php include 'includes/header.php' ?>

<?php
$name = $email = $phn = '';
$nameErr = $emailErr = $phnErr = '';

if (isset($_POST['submit'])) {
    // Validate name
    if (empty($_POST['name'])) {
        $nameErr = 'Name is required';
    } else {
        // $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $name = filter_input(
            INPUT_POST,
            'name',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }

    // Validate email
    if (empty($_POST['email'])) {
        $emailErr = 'Email is required';
    } else {
        // $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    }

    // Validate body
    if (empty($_POST['phn'])) {
        $phnErr = 'phone number is required';
    } else {
        // $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $body = filter_input(
            INPUT_POST,
            'phn',
            FILTER_SANITIZE_FULL_SPECIAL_CHARS
        );
    }
    if (empty($nameErr) && empty($emailErr) && empty($phnErr)) {
        // add to database
        $sql = "INSERT INTO customer (name, email, phone_number) VALUES ('$name', '$email', '$body')";
        if (mysqli_query($conn, $sql)) {
            // success
            header('Location: customers.php');
        } else {
            // error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}

?>

<div class="add-customer">
    <h3>Add New Customer</h3>
    <form action="" method="POST">
        <div class="field1">
            <div class="label1">
                <label for="customer_name">Customer Name:</label>
            </div>
            <div class="input1">
                <input type="text" placeholder="Enter Customer Name" name='name' size="20" required>
            </div>
        </div>
        <div class="field1">
            <div class="label1">
                <label for="email">Email:</label>
            </div>
            <div class="input2">
                <input type="text" placeholder="Enter Email" name="email" size="20" required>
            </div>
        </div>
        <div class="field1">
            <div class="label1">
                <label for="phone">Phone Number:</label>
            </div>
            <div class="input3">
                <input type="number" placeholder="Enter Phone Number" name="phn" size="20" required>
            </div>
        </div>
        <input type="submit" id="add-cust-btn" name="submit"></input>
    </form>
</div>



<?php include 'includes/footer.php'; ?>