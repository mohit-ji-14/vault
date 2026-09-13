<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>SecureVault - Dashboard</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Common CSS -->
    <link
        rel="stylesheet"
        href="css/common.css">
        <link rel="stylesheet" href="css/dashboard.css">

</head>

<body>

<div class="dashboard-layout">

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar">

        <!-- Logo -->

        <div class="sidebar-logo">

            <div class="logo-icon">
                🛡️
            </div>

            <div>

                <h4>SecureVault</h4>

                <small>
                    Your Security, Your Control
                </small>

            </div>

        </div>


        <!-- Navigation -->

        <nav class="sidebar-nav">

            <a href="#" class="nav-item active">
                🏠
                <span>Dashboard</span>
            </a>

            <a href="#" class="nav-item">
                🔐
                <span>Password Vault</span>
            </a>

            <a href="#" class="nav-item">
                ✨
                <span>Password Generator</span>
            </a>

            <a href="#" class="nav-item">
                🛡️
                <span>Security Check</span>
            </a>

            <a href="#" class="nav-item">
                📊
                <span>Security Dashboard</span>
            </a>

            <a href="#" class="nav-item">
                🔄
                <span>Sync & Backup</span>
            </a>

            <a href="#" class="nav-item">
                🔔
                <span>Alerts</span>
            </a>

            <a href="#" class="nav-item">
                ⚙️
                <span>Settings</span>
            </a>

        </nav>


        <!-- Sync Status -->

        <div class="sync-status">

            <div class="sync-icon">
                ☁️
            </div>

            <div>

                <strong>
                    Sync Status
                </strong>

                <p>
                    All data is
                    <span>synced</span>
                </p>

                <small>
                    Last synced: Just now
                </small>

            </div>

        </div>


        <!-- Logout -->

        <a
            href="logout.php"
            class="logout-link">

            🚪
            <span>Logout</span>

        </a>

    </aside>


    <!-- MAIN CONTENT WILL COME HERE -->

    <main class="dashboard-main">

        <header class="dashboard-header">

    <!-- Welcome -->

    <div class="welcome-section">

        <h1>
            Welcome back, <?= htmlspecialchars($_SESSION["user_name"]) ?> 👋
        </h1>

        <p>
            Here's your security overview for today.
        </p>

    </div>


    <!-- Header Actions -->

    <div class="header-actions">

        <!-- Search -->

        <div class="dashboard-search">

            <span class="search-icon">
                🔍
            </span>

            <input
                type="search"
                placeholder="Search your vault..."
                aria-label="Search your vault">

        </div>


        <!-- Notification -->

        <button
            class="header-icon-btn"
            type="button"
            title="Notifications">

            🔔

            <span class="notification-dot"></span>

        </button>


        <!-- Profile -->

        <div class="profile-section">

            <div class="profile-avatar">
                <?= strtoupper(substr($_SESSION["user_name"], 0, 1)) ?>
            </div>

            <div class="profile-info">

                <strong>
                    <?= htmlspecialchars($_SESSION["user_name"]) ?>
                </strong>

                <small>
                    Personal Vault
                </small>

            </div>

        </div>

    </div>

</header>
<section class="summary-cards">

    <!-- Security Score -->

    <div class="summary-card security-score-card">

        <div class="card-icon">
            🛡️
        </div>

        <div class="card-content">

            <span class="card-title">
                Security Score
            </span>

            <div class="score-row">

                <strong>84</strong>

                <span>/100</span>

            </div>

            <span class="score-status">
                Good
            </span>

        </div>

        <div class="score-circle">
            <span>84%</span>
        </div>

    </div>


    <!-- Total Passwords -->

    <div class="summary-card">

        <div class="card-icon blue">
            🔐
        </div>

        <div class="card-content">

            <span class="card-title">
                Total Passwords
            </span>

            <strong class="card-number">
                28
            </strong>

            <span class="card-description">
                Saved passwords
            </span>

        </div>

        <div class="card-action-icon purple">
            🔒
        </div>

    </div>


    <!-- Weak Passwords -->

    <div class="summary-card">

        <div class="card-icon orange">
            ⚠️
        </div>

        <div class="card-content">

            <span class="card-title">
                Weak Passwords
            </span>

            <strong class="card-number">
                3
            </strong>

            <span class="card-description">
                Needs attention
            </span>

        </div>

        <div class="card-action-icon orange-bg">
            ◷
        </div>

    </div>


    <!-- Reused Passwords -->

    <div class="summary-card">

        <div class="card-icon red">
            ▦
        </div>

        <div class="card-content">

            <span class="card-title">
                Reused Passwords
            </span>

            <strong class="card-number">
                2
            </strong>

            <span class="card-description">
                Consider changing
            </span>

        </div>

        <div class="card-action-icon red-bg">
            ↻
        </div>

    </div>

</section>
<!-- =========================================
     PASSWORD WORKSPACE
========================================= -->

<section class="password-workspace">


    <!-- ================= PASSWORD GENERATOR ================= -->

    <div class="workspace-card generator-card">

        <div class="workspace-header">

            <div>

                <h2>
                    Password Generator
                </h2>

                <p>
                    Create a strong and secure password
                </p>

            </div>

            <span class="workspace-icon">
                🔑
            </span>

        </div>


        <!-- Generator Tabs -->

        <div class="generator-tabs">

            <button
                type="button"
                class="generator-tab active">

                Generate

            </button>

            <button
                type="button"
                class="generator-tab">

                Custom

            </button>

        </div>


        <!-- Generated Password -->

        <div class="generated-password">

            <input
                type="text"
                value="X7!kP9@Lm2#Qa8"
                readonly
                id="generatedPassword">

            <button
                type="button"
                title="Copy password">

                📋

            </button>

            <button
                type="button"
                title="Generate again">

                🔄

            </button>

        </div>


        <!-- Strength -->

        <div class="password-strength">

            <div class="strength-header">

                <span>
                    Password Strength
                </span>

                <strong>
                    Strong
                </strong>

            </div>

            <div class="strength-bar">

                <div class="strength-progress"></div>

            </div>

        </div>


        <!-- Length -->

        <div class="generator-option">

            <div class="option-header">

                <span>
                    Password Length
                </span>

                <strong>
                    16
                </strong>

            </div>

            <input
                type="range"
                min="8"
                max="32"
                value="16"
                class="password-range">

        </div>


        <!-- Character Options -->

        <div class="character-options">

            <label class="character-option">

                <input
                    type="checkbox"
                    checked>

                <span>
                    A-Z
                </span>

            </label>


            <label class="character-option">

                <input
                    type="checkbox"
                    checked>

                <span>
                    a-z
                </span>

            </label>


            <label class="character-option">

                <input
                    type="checkbox"
                    checked>

                <span>
                    0-9
                </span>

            </label>


            <label class="character-option">

                <input
                    type="checkbox"
                    checked>

                <span>
                    Symbols
                </span>

            </label>

        </div>


        <!-- Generate Button -->

        <button
            type="button"
            class="generate-password-btn">

            🔄 Generate New Password

        </button>

    </div>



    <!-- ================= SAVE PASSWORD ================= -->

    <div class="workspace-card save-card">

        <div class="workspace-header">

            <div>

                <h2>
                    Save Password
                </h2>

                <p>
                    Store a new credential securely
                </p>

            </div>

            <span class="workspace-icon">
                🔐
            </span>

        </div>


        <form action="backend/save_password.php" method="POST">


            <!-- Website -->

            <div class="vault-field">

                <label>
                    Website / App
                </label>

                <input
                    type="text"
                    placeholder="e.g. GitHub">

            </div>


            <!-- Username -->

            <div class="vault-field">

                <label>
                    Username / Email
                </label>

                <input
                    type="text"
                    placeholder="Enter username or email">

            </div>


            <!-- Password -->

            <div class="vault-field">

                <label>
                    Password
                </label>

                <div class="password-input">

                    <input
                        type="password"
                        placeholder="Enter password">

                    <button
                        type="button"
                        title="Show password">

                        👁️

                    </button>

                </div>

            </div>


            <!-- Category -->

            <div class="vault-field">

                <label>
                    Category
                </label>

                <select>

                    <option>
                        Personal
                    </option>

                    <option>
                        Work
                    </option>

                    <option>
                        Finance
                    </option>

                    <option>
                        Social
                    </option>

                    <option>
                        Other
                    </option>

                </select>

            </div>


            <!-- Notes -->

            <div class="vault-field">

                <label>
                    Notes
                </label>

                <textarea
                    rows="2"
                    placeholder="Optional notes"></textarea>

            </div>


            <!-- Actions -->

            <div class="save-actions">

                <button
                    type="reset"
                    class="cancel-btn">

                    Cancel

                </button>

                <button
                    type="submit"
                    class="save-password-btn">

                    🔒 Save Password

                </button>

            </div>


        </form>

    </div>

</section>
<!-- =========================================
     SECURITY & SYNC SECTION
========================================= -->

<section class="security-sync-grid">


    <!-- ================= SYNC & BACKUP ================= -->

    <div class="workspace-card sync-backup-card">

        <div class="workspace-header">

            <div>

                <h2>
                    Sync & Backup
                </h2>

                <p>
                    Keep your vault synchronized
                </p>

            </div>

            <span class="workspace-icon">
                ☁️
            </span>

        </div>


        <div class="sync-main">

            <div class="sync-status-large">

                <div class="sync-status-icon">
                    ✓
                </div>

                <div>

                    <strong>
                        All data synced
                    </strong>

                    <p>
                        Your vault is up to date
                    </p>

                </div>

            </div>


            <div class="sync-details">

                <div>

                    <span>
                        Last synced
                    </span>

                    <strong>
                        Just now
                    </strong>

                </div>

                <div>

                    <span>
                        Device
                    </span>

                    <strong>
                        💻 Laptop
                    </strong>

                </div>

            </div>


            <button
                type="button"
                class="sync-now-btn">

                🔄 Sync Now

            </button>

        </div>

    </div>


    <!-- ================= SECURITY OVERVIEW ================= -->

    <div class="workspace-card security-overview-card">

        <div class="workspace-header">

            <div>

                <h2>
                    Security Overview
                </h2>

                <p>
                    Password strength distribution
                </p>

            </div>

            <span class="workspace-icon">
                🛡️
            </span>

        </div>


        <!-- Strong -->

        <div class="security-row">

            <div class="security-row-header">

                <span>
                    Strong
                </span>

                <strong>
                    23
                </strong>

            </div>

            <div class="security-progress">

                <div
                    class="security-progress-bar strong"
                    style="width: 82%;">

                </div>

            </div>

        </div>


        <!-- Medium -->

        <div class="security-row">

            <div class="security-row-header">

                <span>
                    Medium
                </span>

                <strong>
                    3
                </strong>

            </div>

            <div class="security-progress">

                <div
                    class="security-progress-bar medium"
                    style="width: 38%;">

                </div>

            </div>

        </div>


        <!-- Weak -->

        <div class="security-row">

            <div class="security-row-header">

                <span>
                    Weak
                </span>

                <strong>
                    2
                </strong>

            </div>

            <div class="security-progress">

                <div
                    class="security-progress-bar weak"
                    style="width: 25%;">

                </div>

            </div>

        </div>


        <div class="security-summary">

            <span>
                Overall security
            </span>

            <strong>
                Good
            </strong>

        </div>

    </div>

</section>
<!-- =========================================
     YOUR PASSWORDS
========================================= -->

<section class="passwords-section">

    <div class="workspace-card passwords-card">

        <!-- Header -->

        <div class="passwords-header">

            <div>

                <h2>
                    Your Passwords
                </h2>

                <p>
                    Manage your saved credentials
                </p>

            </div>

            <button
                type="button"
                class="add-password-btn">

                + Add Password

            </button>

        </div>


        <!-- Search & Filter -->

        <div class="passwords-toolbar">

            <div class="passwords-search">

                <span>
                    🔍
                </span>

                <input
                    type="search"
                    placeholder="Search passwords...">

            </div>


            <select class="password-filter">

                <option>
                    All Categories
                </option>

                <option>
                    Personal
                </option>

                <option>
                    Work
                </option>

                <option>
                    Finance
                </option>

                <option>
                    Social
                </option>

                <option>
                    Other
                </option>

            </select>

        </div>


        <!-- Password Table -->

        <div class="password-table-wrapper">

            <table class="password-table">

                <thead>

                    <tr>

                        <th>
                            Website / App
                        </th>

                        <th>
                            Username
                        </th>

                        <th>
                            Password
                        </th>

                        <th>
                            Category
                        </th>

                        <th>
                            Updated
                        </th>

                        <th>
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>

                    <!-- GitHub -->

                    <tr>

                        <td>

                            <div class="website-info">

                                <div class="website-icon github">
                                    G
                                </div>

                                <div>

                                    <strong>
                                        GitHub
                                    </strong>

                                    <small>
                                        github.com
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>
                            mohit@gmail.com
                        </td>


                        <td>

                            <div class="hidden-password">

                                <span>
                                    ••••••••••••
                                </span>

                                <button
                                    type="button"
                                    title="Show password">

                                    👁

                                </button>

                            </div>

                        </td>


                        <td>

                            <span class="category-badge work">
                                Work
                            </span>

                        </td>


                        <td>
                            Today
                        </td>


                        <td>

                            <div class="table-actions">

                                <button
                                    type="button"
                                    title="Edit">

                                    ✏️

                                </button>

                                <button
                                    type="button"
                                    title="Delete">

                                    🗑️

                                </button>

                            </div>

                        </td>

                    </tr>


                    <!-- Gmail -->

                    <tr>

                        <td>

                            <div class="website-info">

                                <div class="website-icon gmail">
                                    M
                                </div>

                                <div>

                                    <strong>
                                        Gmail
                                    </strong>

                                    <small>
                                        mail.google.com
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>
                            mohit@gmail.com
                        </td>


                        <td>

                            <div class="hidden-password">

                                <span>
                                    ••••••••••••
                                </span>

                                <button
                                    type="button">

                                    👁

                                </button>

                            </div>

                        </td>


                        <td>

                            <span class="category-badge personal">
                                Personal
                            </span>

                        </td>


                        <td>
                            Yesterday
                        </td>


                        <td>

                            <div class="table-actions">

                                <button type="button">
                                    ✏️
                                </button>

                                <button type="button">
                                    🗑️
                                </button>

                            </div>

                        </td>

                    </tr>


                    <!-- Instagram -->

                    <tr>

                        <td>

                            <div class="website-info">

                                <div class="website-icon instagram">
                                    ◎
                                </div>

                                <div>

                                    <strong>
                                        Instagram
                                    </strong>

                                    <small>
                                        instagram.com
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>
                            mohit@example.com
                        </td>


                        <td>

                            <div class="hidden-password">

                                <span>
                                    ••••••••••••
                                </span>

                                <button type="button">
                                    👁
                                </button>

                            </div>

                        </td>


                        <td>

                            <span class="category-badge social">
                                Social
                            </span>

                        </td>


                        <td>
                            2 days ago
                        </td>


                        <td>

                            <div class="table-actions">

                                <button type="button">
                                    ✏️
                                </button>

                                <button type="button">
                                    🗑️
                                </button>

                            </div>

                        </td>

                    </tr>


                    <!-- College -->

                    <tr>

                        <td>

                            <div class="website-info">

                                <div class="website-icon college">
                                    C
                                </div>

                                <div>

                                    <strong>
                                        College Portal
                                    </strong>

                                    <small>
                                        college.edu
                                    </small>

                                </div>

                            </div>

                        </td>


                        <td>
                            student@example.com
                        </td>


                        <td>

                            <div class="hidden-password">

                                <span>
                                    ••••••••••••
                                </span>

                                <button type="button">
                                    👁
                                </button>

                            </div>

                        </td>


                        <td>

                            <span class="category-badge personal">
                                Personal
                            </span>

                        </td>


                        <td>
                            3 days ago
                        </td>


                        <td>

                            <div class="table-actions">

                                <button type="button">
                                    ✏️
                                </button>

                                <button type="button">
                                    🗑️
                                </button>

                            </div>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>


        <!-- Footer -->

        <div class="passwords-footer">

            <span>
                Showing 4 of 28 passwords
            </span>

            <div class="pagination">

                <button type="button">
                    ‹
                </button>

                <button
                    type="button"
                    class="active">

                    1

                </button>

                <button type="button">
                    2
                </button>

                <button type="button">
                    3
                </button>

                <button type="button">
                    ›
                </button>

            </div>

        </div>

    </div>

</section>

    </main>
    

</div>
<script src="js/dashboard.js"></script>

</body>

</html>