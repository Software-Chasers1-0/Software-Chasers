const onload = () => {
    var v;
    //alert("do cookie");
    //alert(document.cookie);
    //var c = decodeURIComponent(document.cookie).split(';');
    var user_name = getCookie("user_name");
    
    loadbooks();
    var res;
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/menu.php", false);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        //res = JSON.parse(this.responseText);
        //alert(this.responseText);
        //document.getElementById('doc').innerHTML = this.responseText;
        res = JSON.parse(this.responseText);
        //image = document.getElementById('img');
        //alert(resarr[0].img_data);
        //image.src = resarr[0].img_data;
        //index = 0;
        //document.getElementById('cover').appendChild(image);
    };
    httpReq.send("");
    
    //let books = document.getElementById('books-cover');
    //books.innerHTML = "";
    res.forEach( v => {
        //alert(v.subcategory_name);
        document.getElementById(v.category_id).innerHTML 
            += '<li><a href="#" onclick="loadbooks(\''+v.subcategory_name+'\')">'+v.subcategory_name+'</a></li>';
    });
 };
 
 const loadbooks = (query = "") => {
    var resarr;
    let heading = document.getElementById('heading');
    if( query === "") {
        query = document.getElementById('search').value;
    }
    if( query === "") {
        heading.innerHTML = "<u>Recently Uploaded</u>";
    }
    else {
        heading.innerHTML = "<u>Search Results: </u><i>" + query+"</i>";
    }

    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/books.php", false);
    var formData = new FormData();
    formData.set('book', query);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        resarr = JSON.parse(this.responseText);
        image = document.getElementById('img');
    };
    httpReq.send(formData);
    
    let books = document.getElementById('books-cover');
    books.innerHTML = "";
    resarr.forEach( v => {
        let div = document.createElement('div');
        div.className = "books";
        div.onclick = function() {getBook(v)};
        div.innerHTML = '<img src="'+v.book_image+'" alt="IMG" width="120" height="150" /> <br />'
                      + '<a>'+v.book_name+'</a> <br />' + '<a>R'+v.book_price+'</a>';
        books.append(div);
    });
    //alert("something");
    return false;
};

const getBook = (v) => {
    //alert("book");
    document.cookie = "book_id="+v.book_id;
    document.cookie = "book_name="+v.book_name;
    document.cookie = "book_isbn="+v.book_isbn;
    document.cookie = "book_author="+v.book_author;
    document.cookie = "book_price="+v.book_price;
    document.cookie = "book_school="+v.subcategory_id;
    //alert(v.subcategory_id);
    self.location = "/book.html";
    //return false;
};

const Mybooks = () => {
    var resarr;
    var id = getCookie("user_id");
    if( id === ""){
        self.location = "/signup.html";
        return false;
    }
    document.getElementById('heading').innerHTML = "<u>My Books</u>";
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/books.php", false);
    var formData = new FormData();
    formData.set('id', id);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        resarr = JSON.parse(this.responseText);
        //image = document.getElementById('img');
    };
    httpReq.send(formData);
    
    let books = document.getElementById('books-cover');
    books.innerHTML = "";
    resarr.forEach( v => {
        let div = document.createElement('div');
        div.className = "books";
        div.onclick = function() {alert("You can't select your own book")};
        div.innerHTML = '<img src="'+v.book_image+'" alt="IMG" width="120" height="150" /> <br />'
                      + '<a>'+v.book_name+'</a> <br />' + '<a>R'+v.book_price+'</a>';
        books.append(div);
    });
    //alert("something");
    return false;
};

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);//.replace("=",":");
  var ca = decodedCookie.split(';');
  //alert(JSON.stringify(ca));
  //ca = ca.replace("=",":");
  //alert(JSON.parse(JSON.stringify(ca)).user_id);
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