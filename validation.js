function validate() {
    const ic = document.getElementById("ic");
    const email = document.getElementById("email");
    const name = document.getElementById("name");
    const password = document.getElementById("password");
    const password2 = document.getElementById("password2");

    // Validation for Identification Number
    // Case insensitive alphabet followed by 7 digits, another case insensitive alphabet at the end
    var regex = /^[a-z]{1}[0-9]{7}[a-z]{1}$/i;
    if (ic.value === "") {
        alert("Please enter an identification number.")
        ic.focus();
        return false; //return false to keep form alive
    } else if (!regex.test(ic.value)) {
        alert(`Please enter a valid identification number: \n- An alphabet, followed by 7 digits, followed by an alphabet \n- For eg: X1234567X`);
        ic.focus();
        ic.select();
        return false;
    }

    // Validation for Name
    // Consists of alphanumeric word characters & may include space, period and hyphen
    // Begins with alphabet charater and should not end with a non-word character
    // Case insensitive
    var regex = /^([\w .-])*[\w]$/i;
    if (name.value === "") {
        alert("Please enter a name.");
        name.focus();
        return false;
    } else if (!regex.test(name.value)) {
        alert(`Please enter a valid name: \n- Consists of alphanumeric word characters \n- May include space ( ), period (.) and hyphen (-) \n- Begins with alphabet character and should end with alphanumeric character \n- Case insensitive`)
        name.focus();
        name.select();
        return false;
    }

    // Validation for Email
    // Username (word characters and ._) @ Domain Name (word characters and 2-5 extensions, separated by .)
    // Last extension 2-3 alphabet letters
    regex = /^[\w._]+@([\w]+.){1,4}[\w]{2,3}$/i;
    if (email.value === "") {
        alert("Please enter an email.")
        email.focus();
        return false;
    } else if (!regex.test(email.value)) {
        alert(`Please enter a valid email: \n- Username: letters, numbers, period (.), underscore (_) \n- Domain name: letters and numbers separted by period ('.'), 2-5 extensions allowed, last extension having 2-3 letters`);
        email.focus();
        email.select();
        return false;
    }

    // Validation for Password
    // at least 1 uppercase character, at least 1 numeric digit, at least 1 non-word character such as (!@#$%)
    // length should be at least 10 characters
    regex = /(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%])(?=.{10,})/;
    if (password.value === "") {
        alert("Please enter a password.")
        password.focus();
        return false;
    } else if (!regex.test(password.value)) {
        alert(`Please enter a valid password. \n- - at least 1 uppercase character \n- at least 1 numeric digit \n- at least 1 non-word character such as (!@#$%) \n- length should be at least 10 characters`)
        password.focus();
        password.select();
        return false;
    }

    // Validation for Confirm Password
    // same as password
    if (password2.value === "") {
        alert("Please confirm your password.")
        password2.focus();
        return false;
    } else if (password2.value !== password.value) {
        alert("Passwords do not match. Please try again.")
        password.focus();
        password.select();
        return false;
    }

    else {
        return true;
    }
}