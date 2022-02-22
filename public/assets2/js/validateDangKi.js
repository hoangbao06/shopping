function kiemTraDangKi() {

    var checkBoolean = true;

    var a = document.getElementById("email").value;
    if (a === '') {
        document.getElementById("error-email").style.display = "block";
        return checkBoolean = false;
    } else {
        document.getElementById("error-email").style.display = "none";
    }

    var name = document.getElementById("name").value;
    if (name === '') {
        document.getElementById("error-name").style.display = "block";
        return checkBoolean = false;
    } else {
        document.getElementById("error-name").style.display = "none";
    }

    var pass = document.getElementById("pass").value;
    if (pass === '') {
        document.getElementById("error-pass").style.display = "block";
        return checkBoolean = false;
    } else {
        document.getElementById("error-pass").style.display = "none";
    }

    var pass = document.getElementById("Repass").value;
    if (pass === '') {
        document.getElementById("error-Repass").style.display = "block";
        return checkBoolean = false;
    } else {
        document.getElementById("error-Repass").style.display = "none";
    }

    var pass = document.getElementById("sdt").value;
    if (pass === '') {
        document.getElementById("error-phone").style.display = "block";
        return checkBoolean = false;
    } else {
        document.getElementById("error-phone").style.display = "none";
    }

    var pass = document.getElementById("adderss").value;
    if (pass === '') {
        document.getElementById("error-adderss").style.display = "block";
        return checkBoolean = false;
    } else {
        document.getElementById("error-adderss").style.display = "none";
    }
    return checkBoolean;
}