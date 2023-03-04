$(document).ready(function () {
    var year = document.getElementById('year');
    var month = document.getElementById('month');

    //var shiftdata = document.getElementById('shiftdata');
    var searchbtn = document.getElementById('search');
    //console.log(month);

    searchbtn.addEventListener('click', click);
    function click(e) {
        e.preventDefault();
        console.log("click");
        var yearval = year.value;
        var monthval = month.value;

        console.log(yearval);
        if (year.value == 2021) {


            var changeyear = new Date(year.value);
            console.log(changeyear);



            if (month.value == 1) {
                console.log("january******");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                //console.log(arrdays[0].length);
                $('#shiftdata').html(tr);

            } else if (month.value == 2) {
                console.log("feb");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 3) {
                console.log("march");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 4) {
                console.log("april");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 5) {
                console.log("may");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 6) {
                console.log("jun");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 7) {
                console.log("july");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 8) {
                console.log("aug");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 9) {
                console.log("sep");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 10) {
                console.log("oct");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 11) {
                console.log("nov");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            } else if (month.value == 12) {
                console.log("dec");

                const m = new Date();
                m.setMonth(month.value - 1);
                console.log(m);
                var getdays = getAllDaysInMonth(changeyear.getFullYear(), m.getMonth());
                var arrdays = [getdays];
                console.log(arrdays);

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 0; i < arrdays[0].length; i++) {
                    console.log(i);
                    console.log(arrdays[0][i]);

                    var td = document.createElement('td');
                    td.innerText = i + 1;
                    tr.appendChild(td);

                }
                $('#shiftdata').html(tr);

            }
        } else if (year.value == 2022) {
            console.log("2022");
            var changeyear = new Date(year.value);
            console.log(changeyear);
            if (month.value == 1) {
                console.log("january");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 31; i++) {
                    //console.log(i);
                    var td = document.createElement('td');
                    td.innerText = i;
                    tr.appendChild(td);

                }
                //shiftdata.appendChild(tr);
                $('#shiftdata').html(tr);

            } else if (month.value == 2) {
                console.log("feb");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 28; i++) {
                    //console.log(i);
                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 3) {
                console.log("march");

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 31; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 4) {
                console.log("april");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 30; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 5) {
                console.log("may");

                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);
                for (var i = 1; i <= 31; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 6) {
                console.log("jun");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 30; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 7) {
                console.log("july");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 31; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 8) {
                console.log("aug");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 31; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 9) {
                console.log("sep");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 30; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 10) {
                console.log("oct");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);
                for (var i = 1; i <= 31; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 11) {
                console.log("nov");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);
                for (var i = 1; i <= 30; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            } else if (month.value == 12) {
                console.log("dec");
                var tr = document.createElement('tr');
                var namecol = document.createElement('td');
                namecol.innerText = "Name";
                tr.appendChild(namecol);

                for (var i = 1; i <= 31; i++) {
                    //console.log(i);

                    var td = document.createElement('td');
                    td.innerText = i;
                    //console.log(td);

                    tr.appendChild(td);
                }
                $('#shiftdata').html(tr);

            }
        }

        $.ajax({
            type: "post",
            url: "shiftList1.php",
            data: { year: yearval, month: monthval },
            success: function (response) {
                alert(response);
                console.log(response);
                $('#shiftlist').html(response);
            },
            error: function () {

            }
        });
    }

});

function getAllDaysInMonth(year, month) {
    const date = new Date(year, month, 1);

    const dates = [];

    while (date.getMonth() === month) {
        dates.push(new Date(date));
        date.setDate(date.getDate() + 1);
        //console.log(date);
    }

    return dates;
}

const now = new Date();

// 👇️ all days of the current month
console.log(getAllDaysInMonth(now.getFullYear(), now.getMonth()));

//const date = new Date('2022-03-24');

// 👇️ All days in March of 2022
//console.log(getAllDaysInMonth(date.getFullYear(), date.getMonth()));
// var y = new Date(year.value);
// var moon = new Date();
// moon.setMonth(5);
// console.log(getAllDaysInMonth(y.getFullYear(), moon.getMonth()));











