

var myC ="'"+ document.getElementById("myCity").innerHTML +"'";

document.getElementById(myC).selected = true;
document.getElementById("myCity").innerHTML = "123123";
function codeAddress() {
    document.getElementById("myCity").innerHTML = "123123";
}
window.onload = codeAddress;