;
(function (){

    "use strict";

    var $self = extendNamespace(applicationNamespace, "applicationNamespace.stockControl.stockControlFunctions");

    function onClickOptionCreateProduct()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                document.getElementById("stockContent").innerHTML = xhttp.responseText;
                bindEvents();
            }
        };
        xhttp.open("GET", "/../new_project/public/ajaxXml/xmlCreate.php", true);
        xhttp.send();
    }

    function onClickOptionReadProduct()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                document.getElementById("stockContent").innerHTML = xhttp.responseText;
                bindEvents();
            }
        };
        xhttp.open("GET", "/../new_project/public/ajaxXml/xmlRead.php", true);
        xhttp.send();
    }

    function onClickOptionUpdateProduct()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                document.getElementById("stockContent").innerHTML = xhttp.responseText;
                bindEvents();
            }
        };
        xhttp.open("GET", "/../new_project/public/ajaxXml/xmlUpdate.php", true);
        xhttp.send();
    }

    function onClickOptionDeleteProduct()
    {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (xhttp.readyState === 4 && xhttp.status === 200) {
                document.getElementById("stockContent").innerHTML = xhttp.responseText;
                bindEvents();
            }
        };
        xhttp.open("GET", "/../new_project/public/ajaxXml/xmlDelete.php", true);
        xhttp.send();
    }

    function bindEvents()
    {
        $("#stockOptionCreateButton").on("click", function () {

            onClickOptionCreateProduct();
        });

        $("#stockOptionReadButton").on("click", function () {

            onClickOptionReadProduct();
        });

        $("#stockOptionUpdateButton").on("click", function () {

            onClickOptionUpdateProduct();
        });

        $("#stockOptionDeleteButton").on("click", function () {

            onClickOptionDeleteProduct();
        });
    }

    $self.bindEvents = bindEvents;

}());
