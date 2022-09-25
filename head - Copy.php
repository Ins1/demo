<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="styles.css" />
    <title>Northampton News-<?php echo $tag ?></title>

</head>

<body>
    <header>
        <section>
            <h1>Northampton News</h1>
        </section>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="latest.php">Latest Posts</a></li>
            <li><a href="javascript:void">Select Category</a>
                <ul>
                    <?php
                    require 'connect.php';
                    $sql = "SELECT * FROM category";

                    foreach ($pdo->query($sql) as $row) {
                        echo '<li><a href="category.php?cat=' . $row['Name'] . '">' . $row['Name'] . '</a></li>';
                    }

                    ?>

                </ul>
            </li>
            <li><a href="contact.php">Contact us</a></li>
            <?php
            //if the session variable is set which is 'users' then display sign out on navbar
            if (isset($_SESSION['users'])) {
                echo '<li><a href="logout.php">Sign Out</a></li>';
            }
            //if user is not logged in then display the option to sign up and sign in
            else {
                echo '<li><a href="login.php">Sign In</a></li>
				<li><a href="register.php">Sign Up</a></li>';
            }
            ?>

        </ul>
    </nav>

    <img src="images/banners/3.jpg" />
    <main>
        <article>