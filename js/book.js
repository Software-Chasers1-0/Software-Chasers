const onload = () => {
    var res;
    //alert("book");
    var book_name = getCookie("book_name");
    if(book_name === ""){
        self.location = "/";
        return false;
    }
    var httpReq = new XMLHttpRequest();
    var formData = new FormData();
    formData.set('book_sub', getCookie("book_school"));
    formData.set('book_id', getCookie("book_id"));
    //alert(getCookie("book_school"));
    httpReq.open("POST", "php/book.php", false);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        //res = JSON.parse(this.responseText);
        //alert(this.responseText);
        //document.getElementById('doc').innerHTML = this.responseText;
        res = JSON.parse(this.responseText);
        //image = document.getElementById('img');
        //image.src = resarr[0].img_data;
    };
    httpReq.send(formData);
    
    document.getElementById('bookname').innerHTML = getCookie("book_name");
    
    document.getElementById('img').src = res[0].book_image;
    document.getElementById('author').innerHTML = "Author: " + getCookie("book_author");
    document.getElementById('price').innerHTML = "Price: " + getCookie("book_price");
    document.getElementById('isbn').innerHTML = "ISBN: " + getCookie("book_isbn");
    
    document.getElementById('faculty').innerHTML = "faculty: " + res[0].category_name;
    document.getElementById('school').innerHTML = "School: " + res[0].subcategory_name;
    document.getElementById('book-form').onsubmit = function(){chat(res[0])};
    
};

const chat = (v) => {
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/chats.php", false);
    var formData = new FormData();
    formData.set('user', getCookie("user_id"));
    formData.set('seller', v.user_id);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        //alert(this.responseText);
        res = JSON.parse(this.responseText);
    };
    httpReq.send(formData);
    document.cookie = "seller_id=" + v.user_id;
};

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);//.replace("=",":");
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) === 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}