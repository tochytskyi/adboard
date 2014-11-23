
$(document).ready(function() {
    $(".errorField").click(function() {
        $(this).hide();
    });
    $(".infoField").click(function() {
        $(this).hide();
    });
    $("#categories li:has(a)").click(function() {
        window.location = $("a:first", this).attr("href");
    });
    $(".cat-adv-list .advert:has(a)").click(function() {
        window.location = $("a:first", this).attr("href");
    });
    $(".content-wrapper").height($(document).height()-100);
    $(".post").mouseover(function() {
        $(this).children(".bg-date").children(".post-date").show();
        $(this).children(".bg-date").show();
    });
    $(".post").mouseleave(function() {
        $(this).children(".bg-date").children(".post-date").hide();
        $(this).children(".bg-date").hide();
    });
});



function showWriteForm(){
   $('#write-form').show();
   var body = $("html, body");
   var topY = $('#write-form').offset().top;
   body.animate({scrollTop:topY}, '500', 'swing');

}

function msg(text) {
    $(".infoField").hide();
    $(".errorField").hide();
    var close = "<div id=\"hideErrorField\"><img src=\"../images/close.png\" height=\"50\" width=\"50\"></div>";
    $(".errorField").html(text + close);
    $(".errorField").fadeIn(500);

}

function info(text) {
    $(".errorField").hide();
    $(".infoField").hide();
    var close = "<div id=\"hideErrorField\"><img src=\"../images/close.png\" height=\"50\" width=\"50\"></div>";
    $(".infoField").html(text + close);
    $(".infoField").fadeIn(500);
}

function signin(form) {
    var login = $(form).children("[name=login]").val();
    var pwd = $(form).children("[name=pwd]").val();
    if (login === "" || pwd === "") {
        msg("Пустий логін або пароль!");
    } else {
        var userData = {login: login, pwd: pwd};
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../user/signin',
            data: userData,
            success: function(data) {
                if (data.result) {
                    info(data.msg);
                    setInterval(function() {
                        window.location = "../user/cabinet";
                    }, 3000);
                } else {
                    msg(data.msg);
                }

            },
            error: function(data) {
                msg("Помилка");
            }
        });
    }


}

function signup(form) {

    var name = $(form).children("input[name=name]").val();
    var sername = $(form).children("input[name=sername]").val();
    var city = $(form).children("input[name=city]").val();
    var tel = $(form).children("input[name=tel]").val();
    var email = $(form).children("input[name=email]").val();
    var login = $(form).children("input[name=login]").val();
    var pwd1 = $(form).children("input[name=pwd1]").val();
    var pwd2 = $(form).children("input[name=pwd2]").val();

    isValid = true;
    
    $('input[type="text"], input[type="password"]').each(function() {
        if ($.trim($(this).val()) === '' || $(this).val()==="underfined" ) {
            isValid = false;
            $(this).addClass("errorInput");
        }else{
            $(this).removeClass("errorInput");
        }
    });
    
    if(!isValid){
        return false;
    }

    if (pwd1 !== pwd2) {
        msg("Паролі не співпадають!");
    } else {
        var userData = {
            name: name,
            sername: sername,
            city: city,
            tel: tel,
            login: login,
            pwd: pwd1,
            email: email
        };
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../user/signup',
            data: userData,
            success: function(data) {
                if (data.result) {
                    info(data.msg);
                    setInterval(function() {
                        window.location = "../user/signin"
                    }, 4000);
                } else {
                    msg(data.msg);
                }
            },
            error: function(data) {
                msg(data);
            }
        });
    }
}

function newAdvert(form) {

    var title = $(form).children("input[name=title]").val();
    var holder = $(form).children("input[name=holder]").val();
    var type = $(form).children("select[name=type]").val();
    var tel = $(form).children("input[name=tel]").val();
    var email = $(form).children("input[name=email]").val();
    var content = $(form).children("textarea[name=content]").val();
    var category = $(form).children("select[name=category]").val();

    isValid = true;
    
    $('input[type="text"], textarea').each(function() {
        if ($.trim($(this).val()) === '' || $(this).val()==="underfined" ) {
            isValid = false;
            $(this).addClass("errorInput");
        }else{
            $(this).removeClass("errorInput");
        }
    });
    
    if(!isValid){
        return false;
    }

    
        var userData = {
            title: title,
            holder: holder,
            type: type,
            tel: tel,
            email: email,
            content: content,
            category: category
        };
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../user/addadvert',
            data: userData,
            success: function(data) {
                if (data.result) {
                    info(data.msg);
                    setInterval(function() {
                        window.location = "../user/adverts"
                    }, 4000);
                } else {
                    msg(data.msg);
                }
            },
            error: function(data) {
                msg(data);
            }
        });
}

function addToBookmarks(id,userid) {
    
        var userData = {id: id, userid: userid};
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../addtobookmarks',
            data: userData,
            success: function(data) {
                if (data.result) {
                    alert(data.msg);
                } else {
                    msg(data.msg);
                }
            },
            error: function(data) {
                msg(data);
            }
        });
}

function sendMsg(){
    alert("Лист відправлено автору");
}

function search() {
    //var text = $(form).children("#search").val();
    alert();
}

function checkEmail(email) {
    var re = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return re.test(email);
}

function checkLogin(login) {
    var re = /^[a-zA-Z0-9]+$/;
    return re.test(login);
}
function checkNumber(value) {
    var re = /^[0-9]+$/;
    return re.test(value);
}

