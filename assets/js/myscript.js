//$(document).ready(function () {
console.log("hey");

var name = document.getElementById("employee");
var start = document.getElementById("start");
var end = document.getElementById("end");
var search = document.getElementById("search");
var type = document.getElementById("type");

// search1.onclick = function (e) {
//     e.preventDefault();
//     var nameval = name.selectedOptions[0].text;
//     console.log("Click");
//     console.log(nameval);

//     var startval = start.value;
//     console.log(startval);
//     var endval = end.value;
//     console.log(endval);

//     $.ajax({
//         type: "post",
//         url: "shiftname.php",
//         data: { ename: nameval, start: startval, end: endval },
//         success: function (response) {
//             //alert(response);
//             console.log(response);
//             $('#type').html(response);
//         }
//     })
// }
// $('.lists').click(function (e) {
//     e.preventDefault();
//     $(this).addClass("active").siblings().removeClass("active");
//     console.log("nav link");
// });

console.log("app");
$('.deleteemp').on('click', function (e) {
    e.preventDefault();
    console.log("product click");
    var status = confirm("Are you sure to delete");
    if (status == true) {
        var id = $(this).parents('td').attr('eid');
        var row = $(this).parents('tr');
        console.log(id);

        $.ajax({
            type: "post",
            url: "emp_delete.php",
            data: { eid: id },
            success: function (response) {
                console.log(response);
                // $('#content').html(response);
                row.fadeOut('slow');
            },
            error: function (error) {

            }
        })
    }
    return false;



});

$('.deletedept').on('click', function (e) {
    e.preventDefault();
    console.log("product click");
    var status = confirm("Are you sure to delete");
    if (status == true) {
        var id = $(this).parents('td').attr('did');
        var row = $(this).parents('tr');
        console.log(id);

        $.ajax({
            type: "post",
            url: "deptdelete.php",
            data: { did: id },
            success: function (response) {
                console.log(response);
                // $('#content').html(response);
                row.fadeOut('slow');
            },
            error: function (error) {

            }
        })
    }
    return false;



});



$('#search').click(function (e) {
    e.preventDefault();
    console.log('search');
    var eName = $("#eName").val();
    var date = $("#date").val();
    $.ajax({
        type: "post",
        url: "shiftSearch.php",
        data: {
            eName: eName,
            date: date
        },
        success: function (response) {
            alert(response);
            console.log(response);
            $('#tbody').html(response);
        }
    })
})






    //console.log(startval);





    //console.log(startval);


//});