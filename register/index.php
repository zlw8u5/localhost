<!doctype html>
<html lang="en">
<head >
    <meta charset="UTF-8"
</head>
<body>
<?php
require ('connect.php');

if (isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $query);

    if($result){
        $success_msg = "Регистрация пройдена";
    } else {
        $fault_msg = "Неправильно введенные данные";
    }
}
?>


    <div class="container">
        <form class="form-signin" method="POST">
            <h1>Registration</h1>
            <?php if(isset($success_msg)){ ?><div role="alert"> <?php echo $success_msg; ?> </div><?php }?>
            <?php if(isset($fault_msg)){ ?><div role="alert"> <?php echo $fault_msg; ?> </div><?php }?>
            <input type="text" name="username" class="form-control" placeholder="Username" required><br>
            <input type="email" name="email" class="form-control" placeholder="Email" required><br>
            <input type="password" name="password" class="form-control" placeholder="Password" required><br>
            <button type="submit">Зарегаться!</button>
        </form>
    </div>
</body>
</html>