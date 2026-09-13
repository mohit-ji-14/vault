// =========================================
// PASSWORD GENERATOR
// =========================================

const generatedPassword =
    document.getElementById("generatedPassword");

const passwordRange =
    document.querySelector(".password-range");

const generateButton =
    document.querySelector(".generate-password-btn");

const characterOptions =
    document.querySelectorAll(".character-option input");


// Character sets

const upperCase =
    "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

const lowerCase =
    "abcdefghijklmnopqrstuvwxyz";

const numbers =
    "0123456789";

const symbols =
    "!@#$%^&*()_+-=[]{}|;:,.<>?";


// =========================================
// GET SELECTED CHARACTERS
// =========================================

function getCharacterPool() {

    let characters = "";

    if (characterOptions[0].checked) {
        characters += upperCase;
    }

    if (characterOptions[1].checked) {
        characters += lowerCase;
    }

    if (characterOptions[2].checked) {
        characters += numbers;
    }

    if (characterOptions[3].checked) {
        characters += symbols;
    }

    return characters;
}


// =========================================
// SECURE RANDOM CHARACTER
// =========================================

function getRandomCharacter(characters) {

    const randomArray =
        new Uint32Array(1);

    crypto.getRandomValues(randomArray);

    const index =
        randomArray[0] % characters.length;

    return characters[index];
}


// =========================================
// GENERATE PASSWORD
// =========================================

function generatePassword() {

    const length =
        parseInt(passwordRange.value);

    const characters =
        getCharacterPool();


    // No character type selected

    if (characters.length === 0) {

        alert(
            "Please select at least one character type."
        );

        return;
    }


    let password = "";


    for (let i = 0; i < length; i++) {

        password +=
            getRandomCharacter(characters);

    }


    generatedPassword.value =
        password;

}


// =========================================
// GENERATE BUTTON
// =========================================

generateButton.addEventListener(
    "click",
    generatePassword
);


// =========================================
// LENGTH DISPLAY
// =========================================

const lengthDisplay =
    document.querySelector(".option-header strong");

passwordRange.addEventListener(
    "input",
    function () {

        lengthDisplay.textContent =
            this.value;

    }
);


// =========================================
// GENERATE PASSWORD ON PAGE LOAD
// =========================================

generatePassword();