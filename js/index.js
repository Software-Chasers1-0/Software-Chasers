const onload = () => {
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
 }
 
 const loadbooks = (query = "") => {
    var resarr;
    //alert("something");
    let heading = document.getElementById('heading');
    if( query === "") {
        query = document.getElementById('search').value;
        //alert("something1");
    }
    if( query === "") {
        heading.innerHTML = "<u>Recently Uploaded</u>";
        //alert("something2");
    }
    else {
        heading.innerHTML = "<u>Search Results: </u><i>" + query+"</i>";
        //alert("something3");
    }
    //alert("something");
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
        books.innerHTML += '<div class="books">'
                            + '<img src="'+v.book_image+'" alt="IMG" width="120" height="150" />'
                            + '<a>'+v.book_name+'</a> <br />' + '<a>R'+v.book_price+'</a>' +
                            '</div>';
    });
    //alert("something");
    return false;
 }