function upload() {
    
    alert("something1");
    var file = document.getElementById('fileupload');
    var bookname = document.forms["book-form"]["bookname"].value;
    var author = document.forms["book-form"]["author"].value;
    var price = document.forms["book-form"]["price"].value;
    var isbn = document.forms["book-form"]["isbn"].value;
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
    formData.set('file', file.files[0]);
    var httpReq = new XMLHttpRequest();
    httpReq.open("POST", "php/upload.php", false);
    //httpReq.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    httpReq.onload = function() {
        //alert("something2");
        //res = this.responseText;
        res = JSON.parse(this.responseText);
        //alert("something3");
        
        //var resp = JSON.parse(this.response);
        //var image = document.createElement('img');
        //image.src = resp.dataUrl;
        //document.body.appendChild(image);
    };
    httpReq.send(formData);
    
    return false;
}