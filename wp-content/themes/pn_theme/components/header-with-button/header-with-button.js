// If screen is less than or equalt to 1081 width
window.onload = function () {
    if (screen.width <= 1081) {
        var toggleButton = document.getElementById('_component-header-with-button--toggler');

        toggleButton.onclick = function () {
            toggleButton.classList.toggle('open');
            document.getElementById('_component-header-with-button--menu').classList.toggle('show');
        }

        var openSubmenu = document.getElementsByClassName('menu-item-has-children');
        for (let x = 0; x < openSubmenu.length; x++){

            openSubmenu[x].addEventListener("click", function (e) {

                var navLink = e.target;
                var subMenu = null;
                for (var i = 0; i < navLink.childNodes.length; i++) {
                    if (navLink.childNodes[i].className == "sub-menu") {
                        subMenu = navLink.childNodes[i];
                        subMenu.classList.toggle("show");
                    }        
                }

            }, false);

        }
    };
}