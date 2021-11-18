<?php include "nav.php" ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Biking@Parks</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <header class="banner">
            <a href="index.php"><img id="img-left" src="assets/logo.png"></a>
            <h1>Biking@Parks</h1>
        </header>
        <nav>
            <div class="left-nav">
                <ul>
                    <?php left_navigation(); ?>
                </ul>
            </div>
            <div class="right-nav">
                <ul>
                    <?php right_navigation(); ?>
                </ul>
            </div>
        </nav>
        <div class="content center">
            <img src="assets/id.png" alt="Biking@Parks">
            <h1>Profile</h1>

            <!-- Profile Display -->
            <div id="profile-display">
                <p><strong>Identification Number</strong></p><?php echo $_SESSION['valid_user_ic'] ?><br>
                <p><strong>Name</strong></p><?php echo $_SESSION['valid_user_name'] ?><br>
                <p><strong>Email Address</strong></p><?php echo $_SESSION['valid_user_email'] ?><br>
                <button id="edit-btn">Edit</button>
            </div>

            <!-- Update Profile Form -->
            <div id="form-display">
            <form class="center" id="loginForm" action="updateUser.php" method="post">
                <label for="ic">Identification Number</label><br>
                <input type="text" id="ic" name="ic"><br>
                <label for="name">Name</label><br>
                <input type="text" id="name" name="name"><br>
                <label for="email">Email</label><br>
                <input type="email" id="email" name="email"><br>

                <button type="submit" name="submit">Update</button>
            </form>
            </div>
        </div>
        <footer>
            <p>All Rights Reserved &copy; Vivian Cho 2021</p>
        </footer>

    </body>
</html>

<script>
document.getElementById("edit-btn").onclick = showForm;

function showForm() {
    document.getElementById("profile-display").style.display = "none";
    document.getElementById("form-display").style.display = "block";
}
</script>
