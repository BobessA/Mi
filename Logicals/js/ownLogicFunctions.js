export const PageSelector = () => {
    const url = window.location.href;
    if (url.includes("signInUp")) {
        SignInUpCheck();
    } else if (url.includes("gallery")) {
        DisplayFileName();
    } else if (url.includes("contact")) {
        MailCheck()
    }
}

const hasInvalidBorderColor = (inputClass) => {
    var inputFields = document.getElementsByClassName(inputClass);
    //console.log(`mezokszama: ${inputFields.length == null ? 0 : inputFields.length}`);
    for (var i = 0; i < inputFields.length; i++) {
        console.log(`mezok: ${inputFields[i]}`);
        if (inputFields[i].style.borderColor === 'lightcoral') {
            return true;
        }
    }
    return false;
}

const SignInUpCheck = () => {
    const lastNameInput = document.querySelector('input[name="lastName"]');
    const firstNameInput = document.querySelector('input[name="firstName"]');
    const signUpUserInput = document.getElementById('signUpUserInput');
    const signUpPasswInput = document.getElementById('signUpPasswInput');
    const registrationButton = document.getElementById('registrationButton');

    const signInUserInput = document.getElementById('signInUserInput');
    const signInPasswInput = document.getElementById('signInPasswInput');
    const loginButton = document.getElementById('loginButton');

//Regisztráció
    // Vezetéknév validációja
    const validateLastName = () => {
        if (lastNameInput.value.trim().length < 2 || lastNameInput.value == '  ') {
            lastNameInput.style.borderColor = 'lightcoral';
        } else {
            lastNameInput.style.borderColor = '';
        }
    }

    // Keresztnév validációja
    const validateFirstName = () => {
        if (firstNameInput.value.trim().length < 2 || firstNameInput.value == '  ') {
            firstNameInput.style.borderColor = 'lightcoral';
        } else {
            firstNameInput.style.borderColor = '';
        }
    }

    // Regisztráció Felhasználónév validációja
    const validateSignUpUsername = () => {
        if (signUpUserInput.value.trim().length < 3) {
            signUpUserInput.style.borderColor = 'lightcoral';
        } else {
            signUpUserInput.style.borderColor = '';
        }
    }

    // regisztráció Jelszó validációja
    const validateSignUpPassword = () => {
        if (signUpPasswInput.value.length < 6) {
            signUpPasswInput.style.borderColor = 'lightcoral';
        } else {
            signUpPasswInput.style.borderColor = '';
        }
    }

    registrationButton.addEventListener('click', function(event) {
        if (hasInvalidBorderColor('signUp')) {
            event.preventDefault();
            alert('A regisztrációhoz kérjük, ellenőrizze a megjelölt mezők adatait.');
        }
    });

//Bejelentkezes
    // Bejelentkezes Felhasználónév validációja
    const validateSignInUsername = () => {
        if (signInUserInput.value.trim().length < 3) {
            signInUserInput.style.borderColor = 'lightcoral';
        } else {
            signInUserInput.style.borderColor = '';
        }
    }

    // Bejelentkezes Jelszó validációja
    const validateSignInPassword = () => {
        if (signInPasswInput.value.length < 6) {
            signInPasswInput.style.borderColor = 'lightcoral';
        } else {
            signInPasswInput.style.borderColor = '';
        }
    }

    loginButton.addEventListener('click', function(event) {
        if (hasInvalidBorderColor('signIn')) {
            event.preventDefault(); 
            alert('A bejelentkezéshez kérjük, ellenőrizze a megjelölt mezők adatait.');
        }
    });

    // Hívjuk meg az ellenőrző függvényeket a mezők elhagyásakor (blur esemény)
    lastNameInput.addEventListener('blur', validateLastName);
    firstNameInput.addEventListener('blur', validateFirstName);
    signUpUserInput.addEventListener('blur', validateSignUpUsername);
    signUpPasswInput.addEventListener('blur', validateSignUpPassword);
    signInUserInput.addEventListener('blur', validateSignInUsername);
    signInPasswInput.addEventListener('blur', validateSignInPassword);

}

const DisplayFileName = () => {
    const fileUpload = document.getElementById('file-upload');

    fileUpload.addEventListener('change', function(event) {
        const selectedFile = event.target.files[0].name;
        console.log('Kiválasztott fájl:', selectedFile);
        document.getElementById('selected-file').textContent = `Kép: ${selectedFile}`;
        });
}

const MailCheck = () => {
    const emailInput = document.querySelector('input[name="email"]');
    const subjectInput = document.querySelector('input[name="subject"]');
    const phoneInput = document.querySelector('input[name="phone"]');
    const mailTextInput = document.querySelector('textarea.mail');
    const sendMailButton = document.getElementById('sendMailButton');

    // email validációja
    const validateEmailInput = () => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(emailInput.value)) {
            emailInput.style.borderColor = '';
        } else {
            emailInput.style.borderColor = 'lightcoral';
        }
    }

    // tárgy validációja
    const validateSubjectInput = () => {
        if (subjectInput.value.trim().length < 3 || subjectInput.value.trim() === '') {
            subjectInput.style.borderColor = 'lightcoral';
        } else {
            subjectInput.style.borderColor = '';
        }
    }

    // telefonszám validációja
    const validatePhoneInput = () => {
        const phoneNumberRegex = /^[0-9+]+$/;
        if (phoneInput.value.trim() == '') {
            phoneInput.style.borderColor = '';
        } else {
            if (!phoneNumberRegex.test(phoneInput.value)) {
                phoneInput.style.borderColor = '';
            } else {
                phoneInput.style.borderColor = 'lightcoral';
            }
        }
    }

    // email szöveg validációja
    const validateMailTextInput = () => {
        if (mailTextInput.value.length < 20) {
            mailTextInput.style.borderColor = 'lightcoral';
        } else {
            mailTextInput.style.borderColor = '';
        }
    }

    sendMailButton.addEventListener('click', function(event) {
        if (hasInvalidBorderColor('mail')) {
            event.preventDefault();
            alert('Kérjük ellenőrizze a megjelölt mezők adatait.');
        }
    });

    emailInput.addEventListener('blur', validateEmailInput);
    subjectInput.addEventListener('blur', validateSubjectInput);
    phoneInput.addEventListener('blur', validatePhoneInput);
    mailTextInput.addEventListener('blur', validateMailTextInput);
}