function myFunction() {
    var name, date, price, table;
    var filterName, tr, byName, bydate, byPrice;
    var txtValueForName, txtValueForDate, txtValueForPrice;

    name = document.getElementById("name");
    date = document.getElementById("date");
    price = document.getElementById("price");
    table = document.getElementById("myTable");


    filterName = name.value.toUpperCase();
    filterDate = date.value;
    filterPrice = price.value;

    tr = table.getElementsByTagName("tr");


    for (i = 0; i < tr.length; i++) {
        byName = tr[i].getElementsByTagName("td")[0];
        bydate = tr[i].getElementsByTagName("td")[1];
        byPrice = tr[i].getElementsByTagName("td")[2];
        if (byName || bydate || byPrice) {

            txtValueForName = byName.textContent || byName.innerText;
            txtValueForDate = bydate.textContent || bydate.innerText;
            txtValueForPrice = byPrice.textContent || byPrice.innerText;

            console.log("the index is " + i + " " + (txtValueForName.toUpperCase().indexOf(filterName) > -1));
            console.log("the index is " + i + " " + (txtValueForDate.indexOf(filterDate) > -1));
            console.log("the index is " + i + " " + (txtValueForPrice.indexOf(filterPrice) > -1));

            /*if (txtValueForName.toUpperCase().indexOf(filterName) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }*/

            if (txtValueForName.toUpperCase().indexOf(filterName) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }

            /*if (txtValueForDate.indexOf(filterDate) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }

            if (!txtValueForPrice.indexOf(filterPrice) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
                break;
            }*/
        } else {
            console.log("test yad ya mina");
        }

    }

    /*for (i = 1; i < tr.length; i++) {
        byName = tr[i].getElementsByTagName("td")[0];

        if (byName) {
            txtValueForName = byName.textContent || byName.innerText;

            if (txtValueForName.toUpperCase().indexOf(filterName) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
    for (i = 1; i < tr.length; i++) {
        bydate = tr[i].getElementsByTagName("td")[1];
        if (bydate) {
            txtValueForDate = bydate.textContent || bydate.innerText;

            if (txtValueForDate.indexOf(filterDate) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }


    }
    for (i = 1; i < tr.length; i++) {
        byPrice = tr[i].getElementsByTagName("td")[2];
        if (byPrice) {
            txtValueForPrice = byPrice.textContent || byPrice.innerText;

            if (txtValueForPrice.indexOf(filterPrice) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

    }*/
}

/*function search() {
    searchName();
    searchDate();
    searchPrice();
}*/

function searchName() {
    var inputName = document.getElementById("name");
    var filterName = inputName.value.toUpperCase();
    var table = document.getElementById("myTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {

        byName = tr[i].getElementsByTagName("td")[0];

        if (byName) {
            txtValue = byName.txtValue || byName.innerText;

            if (txtValue.toUpperCase().indexOf(filterName) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

    }
}
function searchDate() {
    var inputDate = document.getElementById("date");
    var filterdate = inputDate.value.toUpperCase();
    var table = document.getElementById("myTable");
    var tr = table.getElementsByTagName("tr");

    for (var i = 1; i < tr.length; i++) {

        var byDate = tr[i].getElementsByTagName("td")[1];

        if (byDate) {
            txtValue = byDate.txtValue || byDate.innerText;

            if (txtValue.toUpperCase().indexOf(filterdate) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

    }
}
function searchPrice() {
    var inputPrice = document.getElementById("price");
    var filterprice = inputPrice.value;
    var table = document.getElementById("myTable");
    var tr = table.getElementsByTagName("tr");


    for (var i = 1; i < tr.length; i++) {

        var byPrice = tr[i].getElementsByTagName("td")[2];


        if (byPrice) {
            txtValue = byPrice.txtValue || byPrice.innerText;

            if (txtValue.indexOf(filterprice) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

    }
}