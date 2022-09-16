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
    else{
        passWordd.classList = "border-none"
        repassWordd.classList = "border-none"
    }
    if (value1 == '') {
        passWordd.classList = "red-border"

    }
    else {
        passWordd.classList="border-none"
    }
    if (value2 == '') {
        repassWordd.classList = "red-border"

    }
    else {
        repassWordd.classList="border-none"
    }
    if (value3 == '') {
        userFin.classList = "red-border"

    }
    else {
        userFin.classList="border-none"
    }
    if (value4 == '') {
        userName.classList = "red-border"

    }
    else {
        userName.classList="border-none"
    }
    if (value5 == '') {
        userM.classList = "red-border"

    }
    else {
        userM.classList="border-none"
    }

})

let showPass= document.querySelector(".show-pass")
showPass.addEventListener("click", function(){
    if(passWordd.type==="password"){
        passWordd.type="text"
        showPass.name="eye"
    }
    else {
        passWordd.type="password"
        showPass.name="eye-off"
    }
})
let showrePass= document.querySelector(".show-repass")
showrePass.addEventListener("click", function(){
    if(repassWordd.type==="password"){
        repassWordd.type="text"
        showrePass.name="eye"
    }
    else{
        repassWordd.type="password"
        showrePass.name="eye-off"
    }
})
