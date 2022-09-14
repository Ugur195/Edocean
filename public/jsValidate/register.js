let passWordd = document.getElementById("passwordd")
let repassWordd = document.getElementById("re-passwordd")
let userFin = document.getElementById("user_fin")
let userName = document.getElementById("user_name")
let userEmaill = document.getElementById("re-passwordd")
let btnSubmit = document.getElementById("submit-btn")

btnSubmit.addEventListener("click", function (e) {
    e.preventDefault()
    value1 = passWordd.value
    value2 = repassWordd.value
    if (value1 !== value2) {
        passWordd.value = ""
        repassWordd.value = ""
        passWordd.classList = "red-border"
        repassWordd.classList = "red-border"
    }
})
