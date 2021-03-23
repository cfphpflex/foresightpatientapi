/*var header = document.getElementById("myTab");
var btns = header.getElementsByClassName("nav-item");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}*/

/*$(document).ready(function () {
    $('.nav-tabs .nav-link').click(function(e){
        let path = $(this).attr('href');

        let pagename = path.split("/").pop();

        localStorage.setItem('navState',pagename);

        $('.nav-tabs .nav-link').removeClass('active');
        console.log('tesing_active');
        $(this).addClass('active');
        console.log('active');
    })

    $('.dropdown-menu').click(function(){
        alert('dropdown_alert');
        let pagename = $(location).attr('href');
        localStorage.setItem('navDropdown',pagename);
        $('.nav-tabs .nav-link').removeClass('active');
        console.log('tesing_active');
        $(this).addClass('active');
        console.log('active');
    })
});*/



