function validate() {
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    if(username == "admin" && password == "123") {
        window.location.replace("index.html");
        return false;
    } else {
        console.log("loginfailed");
    }
}