<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmaease_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Error: " . $conn->connect_error);
}

$loginUsername = $loginPassword = "";
$loginError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $loginUsername = $_POST["username"];
    $loginPassword = $_POST["password"];

    $stmt = $conn->prepare("SELECT password FROM registered_users WHERE username = ? OR contact_number = ? OR email = ?");
    $stmt->bind_param("sss", $loginUsername, $loginUsername, $loginUsername);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($storedPassword);
        $stmt->fetch();

        if (password_verify($loginPassword, $storedPassword)) {
            $_SESSION['user'] = $loginUsername;
            header("Location: /PharmaEase/PharmaEase-Final/components/homepage/homepage.php");
            exit();
        } else {
            $loginError = "Invalid password.";
        }
    } else {
        $loginError = "No account found with the provided username, contact number, or email.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mainstyles.css">
    <link rel="shortcut icon" type="image/png" href="/PharmaEase/PharmaEase-Final/assets/PharmaEaseLogo.png">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <title>PharmaEase</title>
</head>
<body>
    <div class="page-transition">
        <div class="div"></div>
        <div class="div"></div>
        <div class="div"></div>
        <div class="div"></div>
        <ul class="preload">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
    </div>
    <div class="container">
        <div class="img">
            <img src="/PharmaEase/PharmaEase-Final/assets/LoginCover.png" alt="Cover">
        </div>
        <div class="form">
            <img src="/PharmaEase/PharmaEase-Final/assets/PharmaEaseFull.png" alt="Logo" class="logo-img">
            <h2>LOG IN</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" placeholder="Username, Email, or Contact Number" name="username" value="<?php echo htmlspecialchars($loginUsername); ?>" required>
                <input type="password" placeholder="Password" name="password" required>
                <div class="check">
                    <div>
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                    <span><a href="#" onclick="fadeOutAndRedirect('/PharmaEase/PharmaEase-Final/components/main/forgotpassword.php')">Forget Password</a></span>
                </div>
                <button type="submit" name="login"><strong>LOG IN</strong></button>
                <?php if (!empty($loginError)) echo "<p style='color:red;'>$loginError</p>"; ?>
                <p>Don't have an account yet?</p>
                <button type="button" id="register-button" onclick="fadeOutAndRedirect('/PharmaEase/PharmaEase-Final/components/registration/registration.php')"><strong>REGISTER</strong></button>
            </form>
        </div>
    </div>
    <script>
        function fadeOutAndRedirect(url) {
            const container = document.querySelector('.container');
            container.style.transition = 'opacity 1s ease';
            container.style.opacity = 0;
            setTimeout(() => {
                window.location.href = url;
            }, 1000);
        }

        document.addEventListener("DOMContentLoaded", () => {
            const preloader = document.querySelector(".page-transition");
            const container = document.querySelector(".container");
            const preloaderDivs = document.querySelectorAll(".page-transition .div");
            const preloaderDots = document.querySelectorAll(".preload li");

            const slideDown = gsap.timeline({ paused: true });
            const loading = gsap.timeline({ paused: true, repeat: 1 });
            const slideUp = gsap.timeline({ paused: true });

            // Slide down animation for preloader
            slideDown.to(preloaderDivs, {
                duration: 0.5,
                bottom: "0%",
                ease: "power2.in",
                stagger: 0.2,
            });

            // Loading animation for dots
            loading.from(preloaderDots, {
                duration: 0.5,
                y: -15,
                autoAlpha: 0,
                ease: "power1.in",
                stagger: 0.2,
            }).to(preloaderDots, {
                duration: 0.5,
                y: 35,
                autoAlpha: 0,
                ease: "power1.in",
                stagger: 0.1,
            });

            // Slide up animation for preloader
            slideUp.to(preloaderDivs, {
                duration: 0.5,
                bottom: "100%",
                ease: "power2.out",
                stagger: 0.2,
            });

            // Run animations sequentially
            slideDown
                .play()
                .add(loading.play(), "+=0.5")
                .add(slideUp.play(), "+=0.5")
                .eventCallback("onComplete", () => {
                    preloader.style.display = "none";
                    container.style.opacity = 1;
                });
        });
    </script>
</body>
</html>
