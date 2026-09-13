<?php

session_start();


// If already logged in
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

    <title>Password Vault - Login</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <!-- Custom CSS -->

    <link rel="stylesheet" href="css/common.css">
</head>


<body class="body">


<div class="page-wrapper">

    <div class="main-container">


        <!-- Logo -->

        <div class="text-center mb-4">

            <div class="vault-icon">
                🔐
            </div>

            <h2 class="fw-bold mt-3">
                Password Vault
            </h2>

            <p class="text-muted-custom">
                Secure access to your vault
            </p>

        </div>


        <!-- Error -->

        <?php if (!empty($error)): ?>

            <div class="alert alert-danger">

                <?= htmlspecialchars($error) ?>

            </div>

        <?php endif; ?>


        <!-- Login Form -->

        <form
            action="backend/login.php"
            method="POST">


            <!-- Email -->

            <div class="mb-3">

                <label
                    for="email"
                    class="form-label">

                    Email

                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control-custom"
                    placeholder="Enter your email"
                    autocomplete="username"
                    required>

            </div>


            <!-- Password -->

            <div class="mb-4">

                <label
                    for="password"
                    class="form-label">

                    Master Password

                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control-custom"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    required>

            </div>


            <!-- Login Button -->

            <button
                type="submit"
                class="btn-primary-custom w-100">

                Unlock Vault

            </button>

        </form>


        <!-- Footer -->

        <div class="text-center mt-4">

            <small class="text-muted-custom">

                🔒 Private personal vault

            </small>

        </div>


    </div>

</div>


<!-- Bootstrap JS -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>

</body>

</html>