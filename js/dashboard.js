// =========================================
// PASSWORD VAULT INTERACTIVE LOGIC
// js/dashboard.js
// =========================================

document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const generatedPassword = document.getElementById("generatedPassword");
    const passwordRange = document.getElementById("passwordRange");
    const lengthValue = document.getElementById("lengthValue");
    const strengthBar = document.getElementById("strengthBar");
    const strengthText = document.getElementById("strengthText");
    
    const optUpper = document.getElementById("optUpper");
    const optLower = document.getElementById("optLower");
    const optNumbers = document.getElementById("optNumbers");
    const optSymbols = document.getElementById("optSymbols");
    
    const generateBtns = document.querySelectorAll(".generate-password-btn");
    const copyPasswordBtn = document.getElementById("copyPasswordBtn");
    
    // Character pools
    const upperCase = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const lowerCase = "abcdefghijklmnopqrstuvwxyz";
    const numbers = "0123456789";
    const symbols = "!@#$%^&*()_+-=[]{}|;:,.<>?";

    // 1. Password Pool Selector
    function getCharacterPool() {
        let pool = "";
        if (optUpper && optUpper.checked) pool += upperCase;
        if (optLower && optLower.checked) pool += lowerCase;
        if (optNumbers && optNumbers.checked) pool += numbers;
        if (optSymbols && optSymbols.checked) pool += symbols;
        return pool;
    }

    // 2. Crypto Random Character Selector
    function getRandomCharacter(pool) {
        const randomArray = new Uint32Array(1);
        crypto.getRandomValues(randomArray);
        return pool[randomArray[0] % pool.length];
    }

    // 3. Generate Password Function
    function generatePassword() {
        if (!passwordRange || !generatedPassword) return;

        const length = parseInt(passwordRange.value);
        const pool = getCharacterPool();

        if (pool.length === 0) {
            showToast("Select at least one character set.");
            return;
        }

        let password = "";
        for (let i = 0; i < length; i++) {
            password += getRandomCharacter(pool);
        }

        generatedPassword.value = password;
        updateStrengthScore(password, pool.length);
    }

    // 4. Calculate Entropy & Update Strength UI
    function updateStrengthScore(password, poolSize) {
        if (!strengthBar || !strengthText) return;

        const length = password.length;
        const entropy = Math.round(length * Math.log2(poolSize));
        
        let percent = Math.min(100, Math.max(15, (entropy / 120) * 100));
        strengthBar.style.width = percent + "%";

        if (entropy < 40) {
            strengthBar.style.backgroundColor = "#ef4444";
            strengthText.textContent = "Weak (" + entropy + " bits)";
            strengthText.style.color = "#ef4444";
        } else if (entropy < 65) {
            strengthBar.style.backgroundColor = "#f59e0b";
            strengthText.textContent = "Fair (" + entropy + " bits)";
            strengthText.style.color = "#f59e0b";
        } else if (entropy < 90) {
            strengthBar.style.backgroundColor = "#10b981";
            strengthText.textContent = "Strong (" + entropy + " bits)";
            strengthText.style.color = "#10b981";
        } else {
            strengthBar.style.backgroundColor = "#06b6d4";
            strengthText.textContent = "Unbreakable (" + entropy + " bits)";
            strengthText.style.color = "#06b6d4";
        }
    }

    // 5. Event Listeners for Generator Controls
    if (passwordRange && lengthValue) {
        passwordRange.addEventListener("input", function () {
            lengthValue.textContent = this.value + " characters";
            generatePassword();
        });
    }

    [optUpper, optLower, optNumbers, optSymbols].forEach(checkbox => {
        if (checkbox) {
            checkbox.addEventListener("change", generatePassword);
        }
    });

    generateBtns.forEach(btn => {
        btn.addEventListener("click", generatePassword);
    });

    if (copyPasswordBtn && generatedPassword) {
        copyPasswordBtn.addEventListener("click", function () {
            copyToClipboard(generatedPassword.value);
        });
    }

    // Initial password generation on page load
    generatePassword();

    // 6. Table Search Filtering
    const vaultTableSearch = document.getElementById("vaultTableSearch");
    const globalSearchInput = document.getElementById("globalSearchInput");
    const categoryFilter = document.getElementById("categoryFilter");
    const vaultTable = document.getElementById("vaultTable");

    function filterVaultRows() {
        if (!vaultTable) return;

        const query = (vaultTableSearch ? vaultTableSearch.value : "") || (globalSearchInput ? globalSearchInput.value : "");
        const cleanQuery = query.toLowerCase().trim();
        const selectedCat = categoryFilter ? categoryFilter.value : "ALL";

        const rows = vaultTable.querySelectorAll("tbody tr");
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const rowCat = row.getAttribute("data-category") || "";

            const matchesSearch = cleanQuery === "" || text.includes(cleanQuery);
            const matchesCat = selectedCat === "ALL" || rowCat === selectedCat;

            if (matchesSearch && matchesCat) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }

    if (vaultTableSearch) vaultTableSearch.addEventListener("input", filterVaultRows);
    if (globalSearchInput) globalSearchInput.addEventListener("input", filterVaultRows);
    if (categoryFilter) categoryFilter.addEventListener("change", filterVaultRows);

    // Keyboard shortcut Ctrl + K for search focus
    document.addEventListener("keydown", function (e) {
        if ((e.ctrlKey || e.metaKey) && e.key === "k") {
            e.preventDefault();
            if (globalSearchInput) globalSearchInput.focus();
        }
    });

    // Sync button interaction
    const syncNowBtn = document.getElementById("syncNowBtn");
    if (syncNowBtn) {
        syncNowBtn.addEventListener("click", function () {
            const icon = this.querySelector("i");
            if (icon) icon.classList.add("spin-anim");
            showToast("Vault synchronized with cloud storage!");
            setTimeout(() => {
                if (icon) icon.classList.remove("spin-anim");
            }, 1000);
        });
    }
});

// Global Helper Functions

// Copy to Clipboard with Toast Notification
function copyToClipboard(text) {
    if (!text) return;
    navigator.clipboard.writeText(text).then(() => {
        showToast("Password copied to clipboard!");
    }).catch(() => {
        showToast("Failed to copy text.");
    });
}

// Show Toast Banner
function showToast(message) {
    const toast = document.getElementById("vaultToast");
    const toastMessage = document.getElementById("toastMessage");
    if (!toast || !toastMessage) return;

    toastMessage.textContent = message;
    toast.classList.add("show");

    setTimeout(() => {
        toast.classList.remove("show");
    }, 2500);
}

// Toggle Table Row Password Mask
function toggleTableRowPassword(btn) {
    const hiddenDiv = btn.closest(".hidden-password");
    if (!hiddenDiv) return;

    const span = hiddenDiv.querySelector(".pass-mask");
    const icon = btn.querySelector("i");
    if (!span) return;

    const rawPass = span.getAttribute("data-pass");

    if (span.textContent === "••••••••••••") {
        span.textContent = rawPass;
        if (icon) {
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    } else {
        span.textContent = "••••••••••••";
        if (icon) {
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
}

// Toggle Form Input Password Mask
function toggleFormPassword(inputId, btn) {
    const input = document.getElementById(inputId);
    if (!input) return;
    const icon = btn.querySelector("i");

    if (input.type === "password") {
        input.type = "text";
        if (icon) {
            icon.classList.remove("bi-eye");
            icon.classList.add("bi-eye-slash");
        }
    } else {
        input.type = "password";
        if (icon) {
            icon.classList.remove("bi-eye-slash");
            icon.classList.add("bi-eye");
        }
    }
}