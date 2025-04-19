function underline(i) {

    var menu_item = document.getElementById("menu" + i);

    const array1 = [1, 2, 3, 4, 5, 6];
    const array2 = [i];

    const combinedArray = [...array1, ...array2];

    const numberCountMap = new Map();
    combinedArray.forEach(item => {
        const count = numberCountMap.get(item) || 0;
        numberCountMap.set(item, count + 1);
    });
    const uncommonNumbers = combinedArray.filter(item => numberCountMap.get(item) === 1);

    if (!uncommonNumbers.includes(i)) {
        menu_item.classList.add('menu_under');
        document.getElementById("m-i" + i).classList.add('text_orange');
        document.getElementById("m-i" + i).classList.remove('text-white-50');
    }

    for (let x = 1; x <= uncommonNumbers.length + 1; x++) {
        if (uncommonNumbers.includes(x)) {
            document.getElementById("menu" + x).classList.remove('menu_under');
            document.getElementById("m-i" + x).classList.add('text-white-50');
            document.getElementById("m-i" + x).classList.remove('text_orange');
        }
    }

    if (i == 1) {
        scrollToTop();
        animateText();
    }

}

function highlightActiveMenuItem() {
    const sections = document.querySelectorAll("section");

    sections.forEach((section, index) => {
        const rect = section.getBoundingClientRect();
        if (rect.top <= 0 && rect.bottom >= 0) {

            const menuId = index + 1;
            const menuItemId = `menu${index + 1}`;

            const activeMenuItem = document.getElementById(menuItemId);
            if (activeMenuItem) {
                activeMenuItem.classList.add("menu_under");
                document.getElementById("m-i" + menuId).classList.add('text_orange');
                document.getElementById("m-i" + menuId).classList.remove('text-white-50');

            }

            for (let x = 1; x <= 6; x++) {
                if (x != menuId) {
                    document.getElementById("menu" + x).classList.remove('menu_under');
                    document.getElementById("m-i" + x).classList.add('text-white-50');
                    document.getElementById("m-i" + x).classList.remove('text_orange');
                }
            }
        }
    });
}

window.addEventListener("scroll", () => {
    highlightActiveMenuItem();

    const navbar = document.getElementById("navbar-example2");
    const scrolled = window.scrollY > 0;

    if (scrolled) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }

});

window.addEventListener("load", () => {
    highlightActiveMenuItem();
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

function scrollToSection() {
    const contactSection = document.getElementById("contact_section");
    contactSection.scrollIntoView({ behavior: "smooth" });
}

AOS.init();

$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: true,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 6
        }
    }
});

$(".owl-prev").appendTo(".owl-nav-left");
$(".owl-next").appendTo(".owl-nav-right");

function scrollToReservation() {
    document.getElementById('reservation_section').scrollIntoView();
}

function showAdSignInPassword() {

    var passfield = document.getElementById("adsignin_pass");
    var eye = document.getElementById("eye_sign_in");
    var label = document.getElementById("sign_in_show_pass_label");

    if (passfield.type == "password") {
        passfield.type = "text";
        eye.className = "bi bi-eye-fill";
        label.innerHTML = "Hide Password";
    } else {
        passfield.type = "password";
        eye.className = "bi bi-eye-slash-fill";
        label.innerHTML = "Show Password";
    }

}

var admin_forgot_password_modal;

function resetAdPasswordModal() {
    var m = document.getElementById("adForgotPasswordModal");
    admin_forgot_password_modal = new bootstrap.Modal(m);
    admin_forgot_password_modal.show();
}


function addProductImage() {
    var image = document.getElementById("product_image_up_single");

    image.onchange = function () {
        var file_count = image.files.length;

        if (file_count === 1) {
            var file = this.files[0];
            var url = window.URL.createObjectURL(file);
            document.getElementById("img1").src = url;
        } else {
            alert("Please select 1 image");
        }
    }
}


var updateMenuItemModel;
var modelType;
var menuId;
function updateMenuItem(x, y, z) {
    var m = document.getElementById("updateMenuItem");
    updateMenuItemModel = new bootstrap.Modal(m);
    updateMenuItemModel.show();
    modelType = z;
    menuId = y;
    if (modelType == 1) {
        document.getElementById("modelTitle").innerHTML = "Insert Food";
        document.getElementById("modelButton").innerHTML = "Insert";

    } else if (modelType == 2) {
        document.getElementById("modelTitle").innerHTML = "Update Food";
        document.getElementById("modelButton").innerHTML = "Update";
    }

    let r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let t = r.responseText;
            document.getElementById("modelBody").innerHTML = t;
        }
    }

    r.open("GET", "searchItemforModel.php?id=" + y, true);
    r.send();

}

function saveData() {
    let name = document.getElementById("itemName");
    let price = document.getElementById("itemPrice");
    let details = document.getElementById("itemDetails");
    let category = document.getElementById("itemCategory");
    let status = document.getElementById("itemStatus");
    let image = document.getElementById("product_image_up_single");

    var f = new FormData();

    f.append("name", name.value);
    f.append("price", price.value);
    f.append("details", details.value);
    f.append("category", category.value);
    f.append("status", status.value);
    f.append("modelType", modelType);
    if (image.files.length > 0) {
        f.append("img1", image.files[0]);
    }
    f.append("menuId", menuId);
    f.append("modelType", modelType);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Menu Item Saved Successfully");
                location.reload();
            } else if (t == "successs") {
                alert("Menu Item Updated Successfully");
                location.reload();
            } else if (t == "Not a valid Email or Password please SignIn") {
                window.location = "adminSignIn.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "addProductProcess.php", true);
    r.send(f);
}


function changeDeliverStatus(x, y) {
    var btn = document.getElementById("bt" + x);
    if (y == 1) {
        let email = document.getElementById("userEmail"+x).innerHTML;
        var r = new XMLHttpRequest();

        btn.innerHTML = "Checked";
        btn.classList = "fw-bold text-center statusChnage border-0";

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                var t = r.responseText;
                alert(t);
            }
        }

        r.open("GET", "sendConfirmationEmailProcess.php?email=" + email + "&res_id=" + x, true);
        r.send();
        

    } else {
        alert("Email Already Sent");
    }
}


function showAdResetPassword() {
    var passfield1 = document.getElementById("adrePass1");
    var passfield2 = document.getElementById("adrePass2");
    var eye = document.getElementById("eye_sign_in");
    var label = document.getElementById("sign_in_show_pass_label");

    if (passfield1.type == "password" && passfield2.type == "password") {
        passfield1.type = "text";
        passfield2.type = "text";
        eye.className = "bi bi-eye-fill";
        label.innerHTML = "Hide Password";
    } else {
        passfield1.type = "password";
        passfield2.type = "password";
        eye.className = "bi bi-eye-slash-fill";
        label.innerHTML = "Show Password";
    }

}

function adminLogout() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "adminSignIn.php"
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "adminLogoutProcess.php", true);
    r.send();
}

function menuLoad() {
    window.location.href = "menu.php";
}

function contactUs() {
    var name = document.getElementById("contact_name");
    let email = document.getElementById("contact_email");
    let message = document.getElementById("contact_message");

    let form = new FormData();

    form.append("name", name.value);
    form.append("email", email.value);
    form.append("message", message.value);

    let req = new XMLHttpRequest();

    req.onreadystatechange = function () {
        if (req.readyState == 4) {
            let t = req.responseText;
            if (t == "success") {
                alert("Message Sent Successfully, Keep In Touch With Your Email");
                email.value = "";
                name.value = "";
                message.value = "";
            } else {
                alert(t);
            }
        }
    }

    req.open("POST", "contactUsProcess.php", true);
    req.send(form);
}

function checkTime() {
    const timeInput = document.getElementById("time").value;
    const dateInput = document.getElementById("date").value;

    const [hours, minutes] = timeInput.split(":").map(Number);
    const selectedDateTime = new Date(dateInput);
    selectedDateTime.setHours(hours, minutes, 0, 0);

    const now = new Date();


    const isValidTimeRange =
        hours >= 8 && (hours < 21 || (hours === 21 && minutes === 0));


    const isToday = selectedDateTime.toDateString() === now.toDateString();
    const isFutureTime = selectedDateTime > now;

    if (!isValidTimeRange) {
        alert("Please select a time between 08:00 and 21:00.");
        document.getElementById("time").value = "";
        return;
    }

    if (isToday && !isFutureTime) {
        alert("Please select a future time.");
        document.getElementById("time").value = "";
        return;
    }
}

function checkDate() {
    let date = document.getElementById("date").value;
    const selectedDate = new Date(date);
    const today = new Date();
    today.setHours(0, 0, 0, 0);

    if (selectedDate < today) {
        alert("Please select a date that is today or in the future.");
        document.getElementById("date").value = "";
    }
}

function reservation() {
    let fname = document.getElementById("fname");
    let lname = document.getElementById("lname");
    let email = document.getElementById("email");
    let date = document.getElementById("date");
    let time = document.getElementById("time");
    let mobile = document.getElementById("mobile");
    let message = document.getElementById("message");


    if (fname.value == "" || lname.value == "" || email.value == "" || date.value == "" || time.value == "" || mobile.value == "" || message.value == "") {
        alert("Please Fill All Fields");
    } else {

        let form = new FormData();

        form.append("fname", fname.value);
        form.append("lname", lname.value);
        form.append("email", email.value);
        form.append("date", date.value);
        form.append("time", time.value);
        form.append("mobile", mobile.value);
        form.append("message", message.value);

        let req = new XMLHttpRequest();

        req.onreadystatechange = function () {
            if (req.readyState == 4) {
                let t = req.responseText;
                alert(t);
                email.value = "";
                fname.value = "";
                lname.value = "";
                date.value = "";
                time.value = "";
                mobile.value = "";
                message.value = "";
                location.reload();
            }
        }

        req.open("POST", "reservationBookingProcess.php", true);
        req.send(form);
    }
}

function adminsignIn() {
    let email = document.getElementById("adsignin_email");
    let pass = document.getElementById("adsignin_pass");
    let remeberme = document.getElementById("rememberme");

    let f = new FormData();

    f.append("email", email.value);
    f.append("pass", pass.value);
    f.append("rmbrme", remeberme.checked);

    let r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let t = r.responseText;
            if (t == "success") {

                window.location = "menuMng.php";

                email.value = "";
                pass.value = "";

            } else if (t == "Not a valid Email or Password") {

                email.value = "";
                pass.value = "";

                alert(t);

            } else {
                alert(t);
            }
        }
    };

    r.open("POST", "adminSignInProcess.php", true);
    r.send(f);
}

function adminSettings() {
    let email = document.getElementById("adsignin_email");
    let pass = document.getElementById("adrePass1");
    let pass1 = document.getElementById("adrePass2");
    let f = new FormData();

    if (pass.value == pass1.value) {

        f.append("email", email.value);
        f.append("pass", pass.value);

        let r = new XMLHttpRequest();

        r.onreadystatechange = function () {
            if (r.readyState == 4) {
                let t = r.responseText;
                if (t == "success") {
                    adminLogout();
                } else if (t == "Not a valid User") {
                    alert(t);
                } else {
                    alert(t);
                }
            }
        };

        r.open("POST", "adminSettingsProcess.php", true);
        r.send(f);
    } else {
        alert("Password Not Matched");
        location.reload();
    }
}

function bookingSearchByName() {
    let name = document.getElementById("cus_name");
    if (name.value == "") {
        location.reload();
    }

    let r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let t = r.responseText;
            document.getElementById("viewArea").innerHTML = t;
        }
    }

    r.open("GET", "customerSearchByName.php?name=" + name.value, true);
    r.send();
}

function bookingSearchByDate() {
    let date = document.getElementById("to_date");
    if (date.value == "") {
        location.reload();
    }
    let r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            let t = r.responseText;
            document.getElementById("viewArea").innerHTML = t;
        }
    }

    r.open("GET", "customerSearchByDate.php?date=" + date.value, true);
    r.send();
}

function changeRating(id) {
    var checkbox = document.getElementById("dswitch" + id);
    var isChecked = checkbox.checked ? 1 : 0;

    document.getElementById("popu" + id).innerHTML = isChecked ? " Popular" : " Not Popular";

    let r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            alert(r.responseText);
        }
    };

    r.open("GET", "updateRating.php?id=" + id + "&check=" + isChecked, true);
    r.send();
}

function searchManageProduct(x) {
    var search = document.getElementById("menu_name").value;
    if (search == "") {
        location.reload();
    }
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            document.getElementById("menuViewArea").innerHTML = t;
        }
    }

    r.open("GET", "searchMenuProcess.php?txt=" + search + "&page=" + x, true);
    r.send();
}
