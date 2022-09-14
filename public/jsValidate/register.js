let passWordd = document.getElementById("passwordd")
let repassWordd = document.getElementById("re-passwordd")
let userFin = document.getElementById("user_fin")
let userName = document.getElementById("user_name")
let userM = document.getElementById("user_email")
let btnSubmit = document.getElementById("submit-btn")

btnSubmit.addEventListener("click", function (e) {
    value1 = passWordd.value
    value2 = repassWordd.value
    value3 = userFin.value
    value4 = userName.value
    value5 = userM.value
    if (value1 !== value2) {

        passWordd.value = ""
        repassWordd.value = ""

        passWordd.classList = "red-border"
        repassWordd.classList = "red-border"
    }
    if (value1 == '') {
        passWordd.classList = "red-border"

    }
    if (value2 == '') {
        repassWordd.classList = "red-border"

    }
    if (value3 == '') {
        userFin.classList = "red-border"

    }
    if (value4 == '') {
        userName.classList = "red-border"

    }
    if (value5 == '') {
        userM.classList = "red-border"

    }

})
