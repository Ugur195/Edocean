let drpDwn=document.querySelector("#drp_dwn_li a")
drpDwn.addEventListener("click", function(e){
    e.preventDefault()
    this.parentElement.nextElementSibling.classList.toggle("dropdown_active")
    document.querySelector("#drp_dwn_li .drp-icn").style.transform.rotate="180deg"
})
let userProfile= document.querySelector(".user_img_a")
userProfile.addEventListener("click", function(e){
    e.preventDefault()
    this.nextElementSibling.classList.toggle("dropdown_active")
})
let offCanvas=document.querySelector(".hmbrgr_icon")
let canvasMenu=document.querySelector(".navbar_links")
let closeMenu= document.getElementById("close_menu")
offCanvas.addEventListener("click", function() {
    canvasMenu.classList.add("menu_open")
})
closeMenu.addEventListener("click", function(){
    canvasMenu.classList.remove("menu_open")
})
