function display() {
    var checkRadio = document.querySelector('input[name="radio"]:checked');
}

let video = document.getElementById("myVideo");
let muteButton = document.getElementById("muted");
let modeToggle = document.querySelector(".fabs");

if (modeToggle != null) {
    modeToggle.addEventListener("click", function () {
        if (video.muted) {
            video.muted = false;
        } else {
            video.muted = true;
        }
        modeToggle.classList.toggle("active");
    });
}
/////////////////////////////// course category //////////////////////////////////////
$(document).ready(function () {
    $(".categories-course li").click(function () {
        $(".categories-course li").removeClass("active-li");
        $(this).addClass("active-li");
        var a = $(this).attr("catid");
        if (a == "*") {
            $(".course-a").show();
        } else {
            $(".course-a").hide();
            $(".course-a")
                .filter($("." + a))
                .show();
        }
    });
});

///////////////////////////////Reyting teacher category //////////////////////////////////////
$(document).ready(function () {
    $(".T-R li").click(function () {
        $(".T-R li").removeClass("active-li");
        $(this).addClass("active-li");
        var a = $(this).attr("catid");
        if (a == "*") {
            $(".reyting").show();
        } else {
            $(".reyting").hide();
            $(".reyting")
                .filter($("." + a))
                .show();
        }
    });

});

///////////////////////////////Vip teacher category //////////////////////////////////////
$(document).ready(function () {
    $(".categories-techer li").click(function () {
        $(".categories-techer li").removeClass("active-li");
        $(this).addClass("active-li");
        var a = $(this).attr("catid");
        if (a == "*") {
            $(".vip").show();
        } else {
            $(".vip").hide();
            $(".vip")
                .filter($("." + a))
                .show();
        }
    });

});

/////////////////////////////// student category //////////////////////////////////////
$(document).ready(function () {
    $(".categories-ul li").click(function () {
        $(".categories-ul li").removeClass("active-li");
        $(this).addClass("active-li");
        var a = $(this).attr("catid");
        if (a == "*") {
            $(".student").show();
        } else {
            $(".student").hide();
            $(".student")
                .filter($("." + a))
                .show();
        }
    });

});




