window.onload = function () {
    //If screen is less than or equalt to 1081 width
    if (screen.width <= 1081) {
        var toggleButton = document.getElementById('_component-header--toggler');
        toggleButton.onclick = function () {
            toggleButton.classList.toggle('rotate');
            document.getElementById('_component-header--menu').classList.toggle('show');
        }

        //create arrow
        var arrow = document.createElement("i");
        arrow.className = "_icon--arrow-right open-menu";
        var navlinks = document.querySelectorAll(".menu-item");
        
        //add arrow to nav item
        for (let i = 0; i < navlinks.length; i++) {
            navlinks[i].insertBefore(arrow.cloneNode(true), navlinks[i].children[1]);
        }

        //for all arrows open sub menu when clicked
        var openSubmenu = document.getElementsByClassName("open-menu");
        for (let x = 0; x < openSubmenu.length; x++){

            openSubmenu[x].addEventListener("click", function (e) {

                if (e.target.className == '_icon--arrow-right open-menu') {
                    e.target.nextSibling.classList.toggle("show");
                }

            }, false);
        }
    };
}