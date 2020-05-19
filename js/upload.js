const onload = () => {
    var v;
    if( getCookie("user_name") === ""){
        self.location = "/signup.html";
        return false;
    }
    
}
const upload=()=> {
    
    //alert("something1");
    var file = document.getElementById('fileupload');
    var bookname = document.forms["book-form"]["bookname"].value;
    var author = document.forms["book-form"]["author"].value;
    var price = document.forms["book-form"]["price"].value;
    var isbn = document.forms["book-form"]["isbn"].value;
    var faculty = document.forms["book-form"]["faculty"].value;
    var school = document.forms["book-form"]["school"].value;
    var user_id = getCookie("user_id");
    //alert("something");
    //alert(document.cookie);
    //alert(document.cookie[0]);
    //for(var i = 0; i < file.files.length; i++) {
    var res;
    
    var formData = new FormData();
    formData.set('bookname', bookname);
    formData.set('author', author);
    formData.set('price', price);
    formData.set('isbn', isbn);
    formData.set('faculty', faculty);
    formData.set('school', school);
    formData.set('file', file.files[0]);
    formData.set('user', user_id);
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/upload.php", false);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        //alert("something2");
        //alert(this.responseText);
        res = JSON.parse(this.responseText);
        //alert("something3");
        
        //var resp = JSON.parse(this.response);
        //var image = document.createElement('img');
        //image.src = resp.dataUrl;
        //document.body.appendChild(image);
    };
    httpReq.send(formData);
    
    //return false;
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