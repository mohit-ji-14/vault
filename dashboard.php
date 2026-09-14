<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.php");
    exit;
}

$userName = $_SESSION["user_name"] ?? "User";
$userInitial = strtoupper(substr($userName, 0, 1));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SecureVault - Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Common & Dashboard CSS -->
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

<div class="dashboard-layout">

    <!-- Soft Background Blobs -->
    <div class="dash-bg-blob dash-blob-1"></div>
    <div class="dash-bg-blob dash-blob-2"></div>

    <!-- ================= SIDEBAR ================= -->
    <aside class="sidebar">

        <!-- Logo -->
        <div class="sidebar-logo">
            <div class="logo-icon">
                <i class="bi bi-lock-fill"></i>
            </div>
            <div>
                <h4>Password Vault</h4>
                <small>Private Credential Manager</small>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <a href="#" class="nav-item active">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <a href="#passwordsSection" class="nav-item">
                <i class="bi bi-key-fill"></i>
                <span>Password Vault</span>
                <span class="nav-badge">28</span>
            </a>

            <a href="#generatorSection" class="nav-item">
                <i class="bi bi-lightning-charge-fill"></i>
                <span>Generator</span>
            </a>

            <a href="#securitySection" class="nav-item">
                <i class="bi bi-shield-check"></i>
                <span>Security Audit</span>
            </a>

            <a href="#syncSection" class="nav-item">
                <i class="bi bi-cloud-check-fill"></i>
                <span>Sync & Backup</span>
            </a>

            <a href="#" class="nav-item">
                <i class="bi bi-gear-fill"></i>
                <span>Settings</span>
            </a>
        </nav>

        <!-- Sync Status Box -->
        <div class="sync-status">
            <div class="sync-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <div>
                <strong>Vault Synced</strong>
                <p>Status: <span>Protected</span></p>
            </div>
        </div>

        <!-- Logout -->
        <a href="logout.php" class="logout-link">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
        </a>

    </aside>

    <!-- ================= MAIN CONTENT ================= -->
    <main class="dashboard-main">

        <!-- Dashboard Header -->
        <header class="dashboard-header">
            <div class="welcome-section">
                <h1>Welcome back, <?= htmlspecialchars($userName) ?></h1>
                <p>Here is your real-time security overview and vault summary.</p>
            </div>

            <div class="header-actions">
                <!-- Search Bar -->
                <div class="dashboard-search">
                    <i class="bi bi-search search-icon"></i>
                    <input type="search" id="globalSearchInput" placeholder="Search vault... (Ctrl + K)" aria-label="Search your vault">
                </div>

                <!-- Notifications Button -->
                <button class="header-icon-btn" type="button" title="Notifications">
                    <i class="bi bi-bell"></i>
                    <span class="notification-dot"></span>
                </button>

                <!-- Profile Badge -->
                <div class="profile-section">
                    <div class="profile-avatar">
                        <?= $userInitial ?>
                    </div>
                    <div class="profile-info d-none d-sm-block">
                        <strong><?= htmlspecialchars($userName) ?></strong>
                        <small>Personal Vault</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Metrics Overview Section -->
        <section class="summary-cards">

            <!-- Security Score Card -->
            <div class="summary-card">
                <div class="card-icon-circle emerald">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div class="card-content">
                    <span class="card-title">Security Score</span>
                    <strong class="card-number">84/100</strong>
                    <div class="mt-1">
                        <span class="security-score-pill">
                            <i class="bi bi-check-circle-fill"></i> Safe Rating
                        </span>
                    </div>
                </div>
            </div>

            <!-- Total Saved Passwords -->
            <div class="summary-card">
                <div class="card-icon-circle indigo">
                    <i class="bi bi-lock"></i>
                </div>
                <div class="card-content">
                    <span class="card-title">Total Credentials</span>
                    <strong class="card-number">28</strong>
                    <span class="card-description">Encrypted items</span>
                </div>
            </div>

            <!-- Weak Passwords Warning -->
            <div class="summary-card">
                <div class="card-icon-circle orange">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="card-content">
                    <span class="card-title">Weak Credentials</span>
                    <strong class="card-number">3</strong>
                    <span class="card-description">Recommend updating</span>
                </div>
            </div>

            <!-- Reused Passwords -->
            <div class="summary-card">
                <div class="card-icon-circle red">
                    <i class="bi bi-arrow-repeat"></i>
                </div>
                <div class="card-content">
                    <span class="card-title">Reused Passwords</span>
                    <strong class="card-number">2</strong>
                    <span class="card-description">Duplicate risk</span>
                </div>
            </div>

        </section>

        <!-- Password Generator & Save Workspace -->
        <section class="password-workspace" id="generatorSection">

            <!-- Password Generator Card -->
            <div class="workspace-card generator-card">
                <div class="workspace-header">
                    <div>
                        <h2>Password Generator</h2>
                        <p>Generate high-entropy secure credentials</p>
                    </div>
                    <div class="workspace-circle-icon">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                </div>

                <!-- Generated Output Field -->
                <div class="generated-password">
                    <input type="text" value="X7!kP9@Lm2#Qa8" readonly id="generatedPassword">
                    <button type="button" class="action-icon-btn" id="copyPasswordBtn" title="Copy to clipboard">
                        <i class="bi bi-copy"></i>
                    </button>
                    <button type="button" class="action-icon-btn generate-password-btn" title="Generate new">
                        <i class="bi bi-arrow-clockwise"></i>
                    </button>
                </div>

                <!-- Strength Meter Bar -->
                <div class="password-strength">
                    <div class="strength-header">
                        <span>Entropy Rating</span>
                        <strong id="strengthText">Strong (84 bits)</strong>
                    </div>
                    <div class="strength-bar">
                        <div class="strength-progress" id="strengthBar"></div>
                    </div>
                </div>

                <!-- Length Range Slider -->
                <div class="generator-option">
                    <div class="option-header">
                        <span>Length</span>
                        <strong id="lengthValue">16 characters</strong>
                    </div>
                    <input type="range" min="8" max="32" value="16" class="password-range" id="passwordRange">
                </div>

                <!-- Character Options Toggles -->
                <div class="character-options">
                    <label class="character-option">
                        <input type="checkbox" checked id="optUpper">
                        <span>A-Z</span>
                    </label>

                    <label class="character-option">
                        <input type="checkbox" checked id="optLower">
                        <span>a-z</span>
                    </label>

                    <label class="character-option">
                        <input type="checkbox" checked id="optNumbers">
                        <span>0-9</span>
                    </label>

                    <label class="character-option">
                        <input type="checkbox" checked id="optSymbols">
                        <span>#$&!</span>
                    </label>
                </div>

                <!-- Action CTA -->
                <button type="button" class="generate-password-btn w-100">
                    <i class="bi bi-arrow-clockwise"></i>
                    <span>Generate Password</span>
                </button>
            </div>

            <!-- Save New Password Form Card -->
            <div class="workspace-card save-card">
                <div class="workspace-header">
                    <div>
                        <h2>Add New Password</h2>
                        <p>Store new login details securely in your vault</p>
                    </div>
                    <div class="workspace-circle-icon">
                        <i class="bi bi-plus-lg"></i>
                    </div>
                </div>

                <form action="backend/save_password.php" method="POST">

                    <div class="vault-field">
                        <label for="siteName">Website / Application</label>
                        <input type="text" id="siteName" name="website" placeholder="e.g. GitHub, Netflix, Google" required>
                    </div>

                    <div class="vault-field">
                        <label for="siteUser">Username or Email</label>
                        <input type="text" id="siteUser" name="username" placeholder="name@example.com" required>
                    </div>

                    <div class="vault-field">
                        <label for="sitePass">Password</label>
                        <div class="password-input-group">
                            <input type="password" id="sitePass" name="password" placeholder="Enter or paste password" required>
                            <button type="button" class="toggle-btn" onclick="toggleFormPassword('sitePass', this)">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 vault-field">
                            <label for="siteCategory">Category</label>
                            <select id="siteCategory" name="category">
                                <option value="Personal">Personal</option>
                                <option value="Work">Work</option>
                                <option value="Finance">Finance</option>
                                <option value="Social">Social</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="col-md-6 vault-field">
                            <label for="siteNotes">Notes (Optional)</label>
                            <input type="text" id="siteNotes" name="notes" placeholder="e.g. PIN, Recovery codes">
                        </div>
                    </div>

                    <div class="save-actions">
                        <button type="reset" class="cancel-btn">Reset</button>
                        <button type="submit" class="save-password-btn">
                            <i class="bi bi-lock-fill"></i>
                            <span>Save Credential</span>
                        </button>
                    </div>

                </form>
            </div>

        </section>

        <!-- Security & Sync Audit Grid -->
        <section class="security-sync-grid" id="securitySection">

            <!-- Security Audit Progress -->
            <div class="workspace-card security-overview-card">
                <div class="workspace-header">
                    <div>
                        <h2>Vault Strength Distribution</h2>
                        <p>Analysis of password complexity across your vault</p>
                    </div>
                    <div class="workspace-circle-icon">
                        <i class="bi bi-bar-chart-line"></i>
                    </div>
                </div>

                <div class="security-row">
                    <div class="security-row-header">
                        <span>Strong & Unique Passwords</span>
                        <strong>23 items</strong>
                    </div>
                    <div class="security-progress">
                        <div class="security-progress-bar strong" style="width: 82%;"></div>
                    </div>
                </div>

                <div class="security-row">
                    <div class="security-row-header">
                        <span>Medium Strength Passwords</span>
                        <strong>3 items</strong>
                    </div>
                    <div class="security-progress">
                        <div class="security-progress-bar medium" style="width: 38%;"></div>
                    </div>
                </div>

                <div class="security-row">
                    <div class="security-row-header">
                        <span>Weak or Compromised Passwords</span>
                        <strong>2 items</strong>
                    </div>
                    <div class="security-progress">
                        <div class="security-progress-bar weak" style="width: 15%;"></div>
                    </div>
                </div>

                <div class="security-summary">
                    <span>Overall Health Rating</span>
                    <strong><i class="bi bi-shield-check"></i> Good Condition</strong>
                </div>
            </div>

            <!-- Sync & Backup Card -->
            <div class="workspace-card sync-backup-card" id="syncSection">
                <div class="workspace-header">
                    <div>
                        <h2>Sync & Backup Status</h2>
                        <p>Keep your device backups up to date</p>
                    </div>
                    <div class="workspace-circle-icon">
                        <i class="bi bi-cloud-arrow-up"></i>
                    </div>
                </div>

                <div class="sync-main">
                    <div class="sync-status-large">
                        <div class="sync-status-icon">
                            <i class="bi bi-check-lg"></i>
                        </div>
                        <div>
                            <strong>Encrypted Sync Active</strong>
                            <p>Your vault credentials are fully up-to-date across your devices.</p>
                        </div>
                    </div>

                    <div class="sync-details">
                        <div>
                            <span>Last Synchronization</span>
                            <strong>Just now</strong>
                        </div>
                        <div>
                            <span>Active Device</span>
                            <strong>Primary Laptop</strong>
                        </div>
                    </div>

                    <button type="button" class="sync-now-btn" id="syncNowBtn">
                        <i class="bi bi-arrow-repeat"></i>
                        <span>Sync Vault Now</span>
                    </button>
                </div>
            </div>

        </section>

        <!-- Your Passwords Table Section -->
        <section class="passwords-section" id="passwordsSection">
            <div class="workspace-card passwords-card">

                <div class="passwords-header">
                    <div>
                        <h2>Saved Credentials</h2>
                        <p>Manage and access your stored website logins</p>
                    </div>
                    <a href="#generatorSection" class="add-password-btn">
                        <i class="bi bi-plus-lg"></i>
                        <span>Add New Entry</span>
                    </a>
                </div>

                <!-- Toolbar & Filter -->
                <div class="passwords-toolbar">
                    <div class="passwords-search">
                        <i class="bi bi-search"></i>
                        <input type="search" id="vaultTableSearch" placeholder="Filter passwords by site or username...">
                    </div>

                    <select class="password-filter" id="categoryFilter">
                        <option value="ALL">All Categories</option>
                        <option value="Work">Work</option>
                        <option value="Personal">Personal</option>
                        <option value="Social">Social</option>
                        <option value="Finance">Finance</option>
                    </select>
                </div>

                <!-- Password Table -->
                <div class="password-table-wrapper">
                    <table class="password-table" id="vaultTable">
                        <thead>
                            <tr>
                                <th>Website / Service</th>
                                <th>Username / Email</th>
                                <th>Password</th>
                                <th>Category</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1: GitHub -->
                            <tr data-category="Work">
                                <td>
                                    <div class="website-info">
                                        <div class="website-icon github">
                                            <i class="bi bi-github"></i>
                                        </div>
                                        <div>
                                            <strong>GitHub</strong>
                                            <small>github.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>mohit@gmail.com</td>
                                <td>
                                    <div class="hidden-password">
                                        <span class="pass-mask" data-pass="gh_p@ssw0rd99">••••••••••••</span>
                                        <button type="button" onclick="toggleTableRowPassword(this)" title="Show/Hide password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" onclick="copyToClipboard('gh_p@ssw0rd99')" title="Copy password">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="category-badge work">Work</span></td>
                                <td>Today</td>
                                <td>
                                    <div class="table-actions">
                                        <button type="button" title="Edit entry"><i class="bi bi-pencil"></i></button>
                                        <button type="button" class="delete-btn" title="Delete entry"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 2: Gmail -->
                            <tr data-category="Personal">
                                <td>
                                    <div class="website-info">
                                        <div class="website-icon gmail">
                                            <i class="bi bi-envelope-fill"></i>
                                        </div>
                                        <div>
                                            <strong>Google Workspace</strong>
                                            <small>mail.google.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>mohit@gmail.com</td>
                                <td>
                                    <div class="hidden-password">
                                        <span class="pass-mask" data-pass="Google#Sec2026!">••••••••••••</span>
                                        <button type="button" onclick="toggleTableRowPassword(this)" title="Show/Hide password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" onclick="copyToClipboard('Google#Sec2026!')" title="Copy password">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="category-badge personal">Personal</span></td>
                                <td>Yesterday</td>
                                <td>
                                    <div class="table-actions">
                                        <button type="button" title="Edit entry"><i class="bi bi-pencil"></i></button>
                                        <button type="button" class="delete-btn" title="Delete entry"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 3: Instagram -->
                            <tr data-category="Social">
                                <td>
                                    <div class="website-info">
                                        <div class="website-icon instagram">
                                            <i class="bi bi-instagram"></i>
                                        </div>
                                        <div>
                                            <strong>Instagram</strong>
                                            <small>instagram.com</small>
                                        </div>
                                    </div>
                                </td>
                                <td>mohit@example.com</td>
                                <td>
                                    <div class="hidden-password">
                                        <span class="pass-mask" data-pass="Insta_Social_77">••••••••••••</span>
                                        <button type="button" onclick="toggleTableRowPassword(this)" title="Show/Hide password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" onclick="copyToClipboard('Insta_Social_77')" title="Copy password">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="category-badge social">Social</span></td>
                                <td>2 days ago</td>
                                <td>
                                    <div class="table-actions">
                                        <button type="button" title="Edit entry"><i class="bi bi-pencil"></i></button>
                                        <button type="button" class="delete-btn" title="Delete entry"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Row 4: College Portal -->
                            <tr data-category="Personal">
                                <td>
                                    <div class="website-info">
                                        <div class="website-icon college">
                                            <i class="bi bi-mortarboard-fill"></i>
                                        </div>
                                        <div>
                                            <strong>College Portal</strong>
                                            <small>college.edu</small>
                                        </div>
                                    </div>
                                </td>
                                <td>student@example.com</td>
                                <td>
                                    <div class="hidden-password">
                                        <span class="pass-mask" data-pass="Edu_Pass_2026">••••••••••••</span>
                                        <button type="button" onclick="toggleTableRowPassword(this)" title="Show/Hide password">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <button type="button" onclick="copyToClipboard('Edu_Pass_2026')" title="Copy password">
                                            <i class="bi bi-copy"></i>
                                        </button>
                                    </div>
                                </td>
                                <td><span class="category-badge personal">Personal</span></td>
                                <td>3 days ago</td>
                                <td>
                                    <div class="table-actions">
                                        <button type="button" title="Edit entry"><i class="bi bi-pencil"></i></button>
                                        <button type="button" class="delete-btn" title="Delete entry"><i class="bi bi-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Footer Pagination -->
                <div class="passwords-footer">
                    <span>Showing 4 of 28 passwords</span>
                    <div class="pagination">
                        <button type="button"><i class="bi bi-chevron-left"></i></button>
                        <button type="button" class="active">1</button>
                        <button type="button">2</button>
                        <button type="button">3</button>
                        <button type="button"><i class="bi bi-chevron-right"></i></button>
                    </div>
                </div>

            </div>
        </section>

    </main>

</div>

<!-- Toast Container -->
<div class="vault-toast" id="vaultToast">
    <i class="bi bi-check-circle-fill text-success"></i>
    <span id="toastMessage">Password copied to clipboard!</span>
</div>

<!-- Scripts -->
<script src="js/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>