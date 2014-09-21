
$(document).ready(function(){
    $(".errorField").click(function(){$(this).hide(); });
    $(".infoField").click(function(){$(this).hide(); });
});


function msg(text){
    $(".infoField").hide();
    $(".errorField").hide();
    var close = "<div id=\"hideErrorField\"><img src=\"../images/close.png\" height=\"50\" width=\"50\"></div>";
    $(".errorField").html(text+close);
    $(".errorField").fadeIn(500);  
    
}

function info(text){
    $(".errorField").hide();
    $(".infoField").hide();
    var close = "<div id=\"hideErrorField\"><img src=\"../images/close.png\" height=\"50\" width=\"50\"></div>";
    $(".infoField").html(text+close);
    $(".infoField").fadeIn(500);  
}

function login(){
    var login = $("[name='login']").val();
    var pwd = $("[name='pwd']").val();
    
    if(login==="" || pwd ===""){
        msg("Пустой логин или пароль!");
    }else{
        data = "login="+login+"&pwd="+pwd;
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: 'login',
            data: data,
            success: function(data){
              if(data.login==="true"){
                  window.location = "user";
              }else{
                  msg(data.result); 
              }
              
            },
            error: function(data){
               msg("Извините, произошла ошибка. Попробуйте еще раз.");
            }
        }); 
    }
    
}

function registration(){
    
    var name = $("[name='name']").val();
    var sername = $("[name='sername']").val();
    var email = $("[name='email']").val();
    var pwd1 = $("[name='pwd1']").val();
    var pwd2 = $("[name='pwd2']").val();
    var login = $("[name='login']").val();
    var checked = true;
    
    if(name.length < 2){
        $("label[for='name'] a").html("слишком короткое имя");
        checked = false;
    }else{
        $("label[for='name'] a").html("");
    };
    
    if(sername.length < 2){
        $("label[for='sername'] a").html("слишком короткая фамилия");
        checked = false;
    }else{
        $("label[for='sername'] a").html("");
    };
    
    if(login.length < 2){
        $("label[for='login'] a").html("слишком короткий логин");
        checked = false;
    }else if(!checkLogin(login)){
                $("label[for='login'] a").html("не корректный логин");
                checked = false;
            }else{
                $("label[for='login'] a").html("");
            };
    
    if(!checkEmail(email)){
        $("label[for='email'] a").html("не коректный email");
        checked = false;
    }else{
        $("label[for='email'] a").html("");
    };
    
    if(pwd1.length < 4 || pwd2.length < 4 ){
        $("label[for='pwd1'] a").html("слишком короткий пароль");
        checked = false;
    }else{
        $("label[for='pwd1'] a").html("");
    };
    

    if(pwd1!==pwd2 || pwd1=="" || pwd2=="" ){
        msg("Пароли не совпадают!");
        checked = false;
    }else{
        $(".errorField").hide();
    };

    if(checked){
        var userData = {
            name: name,
            sername: sername,
            login: login,
            pwd: pwd1,
            email: email
        };
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: 'registration',
            data: userData,
            success: function(data){
                if(data.result==="true"){
                    info("Аккаунт успешно создан. На ваш email отправлено письмо.");
                    setInterval(function(){window.location = "login"},3000);
                }else if(data.result==="false"){
                    msg("Ошибка.");
                }else{
                   msg(data.result); 
                }
            },
            error: function(data){
               msg("Извините, произошла ошибка. Попробуйте еще раз.");
            }
        }); 
    }
}

function registrationVK(){
    var name = $("[name='name']").val();
    var sername = $("[name='sername']").val();
    var email = $("[name='email']").val();
    var login = $("[name='login']").val();
    var pwd1 = $("[name='pwd1']").val();
    var checked = true;
    
    if(name.length < 2){
        $("label[for='name'] a").html("слишком короткое имя");
        checked = false;
    }else{
        $("label[for='name'] a").html("");
    };
    
    if(sername.length < 2){
        $("label[for='sername'] a").html("слишком короткая фамилия");
        checked = false;
    }else{
        $("label[for='sername'] a").html("");
    };
    
    if(login.length < 2){
        $("label[for='login'] a").html("слишком короткий логин");
        checked = false;
    }else if(!checkLogin(login)){
                $("label[for='login'] a").html("не корректный логин");
                checked = false;
            }else{
                $("label[for='login'] a").html("");
            };
    if(!checkEmail(email) || email.length<4){
        $("label[for='email'] a").html("не коректный email");
        checked = false;
    }else{
        $("label[for='email'] a").html("");
    };
    if(checked){
        var userData = {
            name: name,
            sername: sername,
            login: login,
            pwd: pwd1,
            email: email,
            vk: true
        };
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../registration',
            data: userData,
            success: function(data){
                if(data.result==="true"){
                    info("Аккаунт успешно создан. На ваш email отправлено письмо.");
                    setInterval(function(){window.location = "../user"},3000);
                }else if(data.result==="false"){
                    msg("Ошибка.");
                }else{
                   msg(data.result); 
                }
            },
            error: function(data){
               msg("Извините, произошла ошибка. Попробуйте еще раз.");
            }
        }); 
    }
}

function addCard(){
    var number = $("[name='number']").val();
    var company = $("[name='company']").val();
    var checked = true;
    
    if(number.length<3 || company.length<3){
        msg("Слишком короткие данные!");
        checked = false;
    }
    if(!checkNumber(number)){
        msg("Не коретный номер карты!");
        checked = false;
    }
    
    if(checked){
   
        var card = {
            number: number,
            company: company
        }

        $.ajax({
                dataType: 'json',
                type: 'post',
                url: '../addCard',
                data: card,
                success: function(data){
                    if(data.result){
                        info(data.msg);
                        setInterval(function(){window.location = "../user"},3000);
                    }else{
                        msg(data.msg);
                    }
                },
                error: function(data){
                   msg("Извините, произошла ошибка. Попробуйте еще раз.");
                }
            });         
    }
    
}

function deleteCard(id){
    if (confirm("Удалить карту?")) {
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../deleteCard',
            data: {id:id},
            success: function(data){
                if(data.result){
                    info(data.msg);
                    setInterval(function(){window.location = "../user"},3000);
                }else{
                    msg(data.msg);
                }
            },
            error: function(data){
               msg("Извините, произошла ошибка. Попробуйте еще раз.");
            }
        }); 
    } else {
        /*window.location = "../user";*/
    }

}

function showSearchFiled(){
    $("#search-filed").fadeToggle(500)
}

function search(text){
    if (text !== "") {
        $(".pagination").hide();
    }else{
        $(".pagination").show();
    }
    $.ajax({
        dataType: 'json',
        type: 'post',
        url: '../search',
        data: {text: text},
        success: function(data) {
            if (data.card1) {
                var result = "<tr><td>Номер карты</td><td>Организация</td><td></td></tr>";
                for (property in data) {
                    result += "<tr><td>" + data[property].number + "</td><td>" + data[property].company + "</td>" +
                            "<td width='50'><a href='' onclick='deleteCard(" + data[property].id + ")'>[удалить]</a></td><tr/>";
                }
                $("#cardsList").html(result);
            } else {
                $("#cardsList").html("<center>Нет совпадений</center>");
            }
        },
        error: function(data) {
            msg("Извините, произошла ошибка. Попробуйте еще раз.");
        }
    }); 

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

function feedbackSend(){
    var name = $("[name='name']").val();
    var email = $("[name='email']").val();
    var text = $("[name='text']").val();
    var checked = true;
    
    if(name.length < 2){
        $("label[for='name'] a").html("слишком короткое имя");
        checked = false;
    }else{
        $("label[for='name'] a").html("");
    };
    
    if(!checkEmail(email) || email.length<4){
        $("label[for='email'] a").html("не коректный email");
        checked = false;
    }else{
        $("label[for='email'] a").html("");
    };
    
    if(text.length < 2){
        msg("Слишком корткий текст сообщения!");
        checked = false;
    }
    
    if(checked){
        var userData = {
            name: name,
            email: email,
            text: text
        };
        $.ajax({
            dataType: 'json',
            type: 'post',
            url: '../feedback',
            data: userData,
            success: function(data){
                if(data.result){
                    info(data.msg);
                    setInterval(function(){window.location = "../user"},3000);
                }else{
                    msg(data.msg);
                }
            },
            error: function(data){
               msg("Извините, произошла ошибка. Попробуйте еще раз.");
            }
        }); 
    }
}

 
