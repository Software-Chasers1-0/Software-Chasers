const onload = () => {
    //alert("chat");
    var res;
    //alert("chat");
    var user_id = getCookie("user_id");
    if( user_id === ""){
        self.location = "/signup.html";
        return false;
    }
    //alert(user_id);
    getChats();
    
    
    
    
    
};

const getChats = () => {
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/chats.php", false);
    var formData = new FormData();
    formData.set('user', getCookie("user_id"));
    httpReq.onload = function() {
        res = JSON.parse(this.responseText);
    };
    httpReq.send(formData);
    setChats(res);
    
    let seller_id = getCookie("seller_id");
    if(seller_id !== "") {
        document.getElementById(seller_id).click();
    }
    else {
        if(user_id === res[0].buyer_id) {
            document.getElementById(res[0].seller_id).click();
        }
        else {
            document.getElementById(res[0].buyer_id).click();
        }
    }
};

const setChats = (v) => {
    var list = document.getElementById('chat-list');
    list.innerHTML = "";
    v.forEach( v => {
        let li = document.createElement('li');
        if(v.buyer_id == getCookie("user_id")) {
            li.id = v.seller_id;
            li.innerHTML = '<a>'+v.seller_name+'</a>';
            li.onclick = function() {setChat(v,v.seller_name,v.seller_id)};
        }
        else {
            li.id = v.buyer_id;
            li.innerHTML = "<a>"+v.buyer_name+"</a>";
            li.onclick = function() {setChat(v,v.buyer_name,v.buyer_id)};
        }
        list.append(li);
    });
    
};

const setChat = (v,name,id) => {
    //alert("something");
    var chatbox = document.getElementById('box');
    //alert(name);
    document.getElementById('chat-head').innerHTML = '<h3>'+name+'</h3>';
    //alert("something2");
    if(!v.chat) {
        v.chat = "[]"
    }
    let chat = JSON.parse(v.chat);
    chatbox.innerHTML = "";
    //alert("something");
    //alert(chat);
    //alert(v.chat);
    chat.forEach( v => {
        if(v.id == getCookie("user_name")) {
            chatbox.innerHTML += '<div class="container darker">' +
                                    '<a class="time-right">' + v.id + '</a>'+
                                    '<a>' + v.chat + '</a>'+
                                '</div>';
        }
        else {
            chatbox.innerHTML += '<div class="container">' +
                                    '<a class="time-left">' + v.id + '</a>'+
                                    '<a>' + v.chat + '</a>'+
                                '</div>';
        }
    });
    //alert("something9");
    document.cookie = "seller_id=" + id;
    document.getElementById('chat').onsubmit = function(){sendChat(v)};
    //alert("something99");
};

const sendChat = (v) => {
    
    let chat = JSON.parse(v.chat);
    let value = {id:getCookie("user_name"),chat:document.getElementById('chat-text').value};
    chat.push(value);
    chat.forEach( value => {
        value.chat = manipulate(value.chat);
    });
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/chat.php", false);
    var formData = new FormData();
    formData.set('user', v.buyer_id);
    formData.set('seller', v.seller_id);
    formData.set('chat', JSON.stringify(chat));
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        //alert(this.responseText);
        res = JSON.parse(this.responseText);
    };
    httpReq.send(formData);
    
};

const manipulate = (text) => {
    for(let i = 0; i < text.length; i++) {
        if(text[i] === '"') {
            //alert(text[i]);
            text = [text.slice(0, i), "\\", text.slice(i)].join('');
            i++;
        }
        else if(text[i] === "'") {
            text = [text.slice(0, i), "'", text.slice(i)].join('');
            i++;
        }
    }
    return text;
};

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
      //alert(c);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

setInterval(function() {
    getChats();
    }, 5000);