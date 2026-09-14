```php
<?php
session_start();

// If already logged in, redirect to dashboard
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit;
}

$error = $_GET["error"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Password Vault - Welcome Back</title>


    <!-- Bootstrap CSS -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Google Fonts -->

    <link
        href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">


    <!-- Custom CSS -->

    <link
        rel="stylesheet"
        href="css/common.css">

</head>


<body class="login-page">


    <!-- =========================================
         BACKGROUND DECORATION
    ========================================== -->

    <div class="bg-blob blob-1"></div>

    <div class="bg-blob blob-2"></div>

    <div class="bg-blob blob-3"></div>


    <!-- =========================================
         SECURITY PILL
    ========================================== -->

    <div class="top-right-pill">

        <div class="pill-icon">

            <i class="bi bi-shield-check"></i>

        </div>

        <div class="pill-text">

            Your security<br>
            matters

        </div>

    </div>


    <!-- =========================================
         LEFT HANDWRITTEN MESSAGE
    ========================================== -->

    <div class="annotation-left">

        A safer<br>
        internet<br>
        starts here.

        <span class="annotation-arrow">
            ↗
        </span>

    </div>


    <!-- =========================================
         PLANT DECORATION
    ========================================== -->

    <div class="plant-container" aria-hidden="true">

        <div class="plant-stem"></div>
        <div class="plant-leaf leaf-one"></div>
        <div class="plant-leaf leaf-two"></div>
        <div class="plant-leaf leaf-three"></div>
        <div class="plant-pot"></div>

    </div>


    <!-- =========================================
         RIGHT HANDWRITTEN MESSAGE
    ========================================== -->

    <div class="annotation-right">

        More security<br>
        A brighter you

        <span class="heart">
            ♡
        </span>

    </div>


    <!-- =========================================
         MAIN PAGE
    ========================================== -->

    <main class="login-page-container">


        <div class="main-stage">


            <!-- =================================
                 LOGIN CARD
            ================================== -->

            <section class="login-card">


                <!-- Lock Badge -->

                <div class="card-header-badge-wrapper">

                    <div class="gradient-badge-icon">

                        <i class="bi bi-lock-fill"></i>

                    </div>

                </div>


                <!-- Heading -->

                <h1 class="card-title">

                    Welcome back

                </h1>


                <!-- Subtitle -->

                <p class="card-subtitle">

                    Sign in to access your password vault

                    <br class="desktop-break">

                    and keep your digital life secure.

                </p>


                <!-- =================================
                     ERROR MESSAGE
                ================================== -->

                <?php if (!empty($error)): ?>

                    <div
                        class="login-error-banner"
                        role="alert">

                        <i class="bi bi-exclamation-circle-fill"></i>

                        <span>
                            <?= htmlspecialchars($error) ?>
                        </span>

                    </div>

                <?php endif; ?>


                <!-- =================================
                     LOGIN FORM
                ================================== -->

                <form
                    action="backend/login.php"
                    method="POST"
                    autocomplete="on">


                    <!-- Email -->

                    <div class="form-group-custom">

                        <label
                            for="email"
                            class="label-bold">

                            Email address

                        </label>


                        <div class="input-box">

                            <i
                                class="bi bi-envelope input-icon-left">
                            </i>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="field-control"
                                placeholder="you@example.com"
                                autocomplete="username"
                                required>

                        </div>

                    </div>


                    <!-- Password -->

                    <div class="form-group-custom">

                        <label
                            for="password"
                            class="label-bold">

                            Master password

                        </label>


                        <div class="input-box">

                            <i
                                class="bi bi-lock input-icon-left">
                            </i>


                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="field-control"
                                placeholder="Enter your master password"
                                autocomplete="current-password"
                                required>


                            <!-- Password visibility -->

                            <button
                                type="button"
                                class="eye-toggle-btn"
                                onclick="togglePassword()"
                                aria-label="Show or hide password">

                                <i
                                    id="passwordIcon"
                                    class="bi bi-eye">
                                </i>

                            </button>

                        </div>

                    </div>


                    <!-- =================================
                         OPTIONS
                    ================================== -->

                    <div class="options-row">


                        <!-- Remember -->

                        <label class="checkbox-custom">

                            <input
                                type="checkbox"
                                name="remember"
                                value="1"
                                checked>

                            <span>
                                Remember me
                            </span>

                        </label>


                        <!-- Forgot -->

                        <a
                            href="#"
                            class="forgot-btn">

                            Forgot password?

                        </a>

                    </div>


                    <!-- =================================
                         LOGIN BUTTON
                    ================================== -->

                    <button
                        type="submit"
                        class="btn-gradient-submit">

                        <i class="bi bi-lock-fill"></i>

                        <span>
                            Unlock my vault
                        </span>

                        <i class="bi bi-arrow-right"></i>

                    </button>


                </form>


                <!-- =================================
                     DIVIDER
                ================================== -->

                <div class="divider-or">

                    <span>or</span>

                </div>


                <!-- =================================
                     SECURITY MESSAGE
                ================================== -->

                <div class="security-box-card">


                    <div class="security-box-icon">

                        <i class="bi bi-shield-check"></i>

                    </div>


                    <div class="security-box-content">

                        <h6>
                            Your data stays private
                        </h6>

                        <p>
                            Encrypted, secure, and only accessible
                            with your master password.
                        </p>

                    </div>

                </div>


                <!-- =================================
                     REGISTER
                ================================== -->

                <div class="create-account-text">

                    New here?

                    <a href="register.php">
                        Create an account
                    </a>

                </div>


            </section>


            <!-- =================================
                 RIGHT FEATURES
            ================================== -->

            <aside class="right-features-column">


                <!-- Secure -->

                <div class="feature-item-exact">

                    <div class="feature-circle-icon">

                        <i class="bi bi-lock"></i>

                    </div>


                    <div class="feature-content">

                        <h6>
                            Secure
                        </h6>

                        <p>
                            Protected authentication
                        </p>

                    </div>

                </div>


                <!-- Private -->

                <div class="feature-item-exact">

                    <div class="feature-circle-icon">

                        <i class="bi bi-cloud-check"></i>

                    </div>


                    <div class="feature-content">

                        <h6>
                            Private
                        </h6>

                        <p>
                            Only you can access
                        </p>

                    </div>

                </div>


                <!-- Simple -->

                <div class="feature-item-exact">

                    <div class="feature-circle-icon">

                        <i class="bi bi-lightning-charge"></i>

                    </div>


                    <div class="feature-content">

                        <h6>
                            Simple
                        </h6>

                        <p>
                            All your passwords<br>
                            in one place
                        </p>

                    </div>

                </div>


            </aside>


        </div>


        <!-- =========================================
             COPYRIGHT
        ========================================== -->

        <footer class="copyright-footer">

            © 2026 Password Vault. All rights reserved.

        </footer>


    </main>


    <!-- =========================================
         PASSWORD TOGGLE
    ========================================== -->

    <script>

        function togglePassword() {

            const password =
                document.getElementById("password");

            const icon =
                document.getElementById("passwordIcon");


            if (password.type === "password") {

                password.type = "text";

                icon.classList.remove("bi-eye");

                icon.classList.add("bi-eye-slash");

            } else {

                password.type = "password";

                icon.classList.remove("bi-eye-slash");

                icon.classList.add("bi-eye");

            }

        }

    </script>


    <!-- Bootstrap JS -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>
```
