const onload = () => {
    //alert("load");
    let ref = window.location.href;
    if( ref.charAt(ref.length - 1) === '?' ) {
        //alert("?");
        doRegister();
        //alert("?");
    }
};

function doLogin() {
    //alert("hallo login1");
    document.getElementById("signup-form").style.display = "none";
    //alert("hallo login2");
    document.getElementById("login-form").style.display = "block";
    //document.getElementById("login").style.display = "none";
}

function doRegister() {
    //alert("hallo register");
    document.getElementById("signup-form").style = "display: block";
    document.getElementById("login-form").style = "display: none";
}
//var res;
function login() {
    //alert("login");
    
    var res,resString;
    var Uname = document.forms["login-form"]["username"].value;
    //alert(Uname);
    var pass = document.forms["login-form"]["password"].value;
    var formData = new FormData();
    formData.set('Uname', Uname);
    
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/signin.php", false);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        resString = this.responseText;
        //alert(this.responseText);
        res = JSON.parse(this.responseText);
        //alert("something");
        //alert(res);
    };
    httpReq.send(formData);
    //alert(pass);
    
    if(resString === "[]" || pass === "" || res[0].user_password != pass ) {
        alert("invalid details!!!");
        //d = document.getElementById("demo");
        //d.setAttribute("align", "center");
        //d.style.color = "red";
        //d.innerHTML = "<p>invalid username or password 1</p>";
        //return false;
    }
    else {
        //alert("Login Sucesss!!!!");
        self.location = "/";
        //alert("Login Sucesss!!!!");
        return false;
        //alert("Login Sucesss!!!!");
    }
    
    //doLogin();
    
    //alert("login success");
    //var loginCookie = document.cookie = resString;
    //var loginCookie = document.cookie;
    //alert(res);
    //alert(res[0].user_role);
    /*if(res[0].user_role === "manager") {
        self.location = "/upload.html";
        return false;
    }*/
    
    
}

function register() {
    //alert("script activated");
    var res;
    var user = document.forms["signup-form"]["username"].value;
    var mail = document.forms["signup-form"]["email"].value;
    var pass = document.forms["signup-form"]["password"].value;
    //var params = "Uname=" + user + "&Umail=" + mail + "&passwd=" + pass;
    //alert(params);
    var formData = new FormData();
    formData.set('Uname', user);
    formData.set('Umail', mail);
    formData.set('passwd', pass);
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/signup.php", false);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        res = JSON.parse(this.responseText);
        alert(this.responseText);
    };
    httpReq.send(formData);
    alert(res);
    //self.location = "/index.html";
    return false;
}

function result(r) {
    document.cookie = JSON.stringify(r);
    //alert(document.cookie);
    self.location = "/view.html";
    return false;
}

function setuser(resp) {
    var e = document.createElement("div");
    e.onclick = function(){result(resp)};
    e.style.cursor = "pointer";
    
    var e1 = document.createElement("div");
    //e.setAttribute("align", "left");
    e1.style.width = "200";
    e1.style.padding = "50";
    //e1.style.color = "red";
    //e1.style.border = "thin solid #000000";
    e1.style.display = "inline-block";
    e1.innerHTML = resp.user_name + "_" + resp.user_id;
    
    var e2 = document.createElement("div");
    //e.setAttribute("align", "left");
    e2.style.padding = "50";
    //e1.style.color = "blue";
    e2.style.display = "inline-block";
    e2.innerHTML = "rating (/5.0) = " + resp.user_rating;
    
    e.appendChild(e1);
    e.appendChild(e2);
    document.getElementById("userlist").appendChild(e);
}

function viewUsers() {
    var res;
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/responses.php", false);
    httpReq.onload = function() {
        res = JSON.parse(this.responseText);
        for(var i = 0; i < res.length; i ++) {
            setuser(res[i]);
        }
    };
    httpReq.send("");
    
}
