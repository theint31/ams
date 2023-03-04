var popup = document.getElementById("form-popup");
var close = document.getElementById("formclose-btn");
var type = document.getElementById("type");
var name1 = document.getElementById("name1");
var add = document.getElementById("formadd-btn");
var events = [];
//$("select#selectVal").change(displayNum);
$(document).ready(function () {
    $("select#employee").change(function () {
        var selectedEmp = $(this).children("option:selected").val();
        
        //alert("You have selected the employee - " + selectedEmp);
        var calendar = $('#calendar').fullCalendar({
            // editable: true,
            // events: "selectshift.php",
            // displayEventTime: false,
            // eventRender: function (event, element, view) {
            //     if (event.allDay === 'true') {
            //         event.allDay = true;
            //     } else {
            //         event.allDay = false;
            //     }
            // },
            events: [{
                title: 'New Year',
                start: '2022-01-01'
            }, {
                title: 'Independence Day',
                start: '2022-01-04'
                
            }, {
                id: 999,
                title: 'Union Day',
                start: '2022-02-12'
            }, {
                id: 999,
                title: 'Full Moon Day of Tabaung',
                start: '2022-02-16'
            }, {
                title: 'Parent"s Day',
                start: '2022-03-02'
                
            }, {
                title: 'Armed Forces Day',
                start: '2022-03-27'
            }, {
                title: 'Water Festival',
                start: '2022-04-13',
                end:'2022-04-16'
            }, {
                title: 'Burmese New Year',
               
                start: '2022-04-17'
            },
            {
                title: 'Labor Day',
               
                start: '2022-05-01'
            },
            {
                title: 'Full Moon Day of Kasong',
               
                start: '2022-05-16'
            }, {
                title: 'Full Moon Day of Waso',
               
                start: '2022-07-12'
            }, {
                title: 'Martyr"s Day',
               
                start: '2022-07-19'
            }, {
                title: 'Full Moon Day of Thadingyut',
               
                start: '2022-10-08',
                end:'2022-10-10'
            }, {
                title: 'Full Moon Day of TazaungMone',
               
                start: '2022-11-06',
                end:'2022-11-07'
            }, {
                title: 'National Day',
               
                start: '2022-11-17'
            }, {
                title: 'Kayin New Year',
               
                start: '2022-12-22'
            }, {
                title: 'Christmas Day',
               
                start: '2022-12-25'
            }, {
                title: 'New Year"s Eve',
               
                start: '2022-12-31'
            }, {
                title: 'Diwali Festival',
               
                start: '2022-10-24'
            }, {
                title: 'Eid Day',
               
                start: '2022-07-22'
            },
            {
                title: 'Private Holiday',
                start: '2022-01-02'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-01-09'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-01-16'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-01-23'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-01-30'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-02-06'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-02-13'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-02-20'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-02-07'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-03-06'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-03-13'
            }
            ,
            {
                title: 'Private Holiday',
                start: '2022-03-20'
            },
            {
                title: 'Private Holiday',
                start: '2022-03-27'
            },
            {
                title: 'Private Holiday',
                start: '2022-04-03'
            },
            {
                title: 'Private Holiday',
                start: '2022-04-10'
            },{
                title: 'Private Holiday',
                start: '2022-04-17'
            },{
                title: 'Private Holiday',
                start: '2022-04-24'
            },{
                title: 'Private Holiday',
                start: '2022-05-01'
            },{
                title: 'Private Holiday',
                start: '2022-05-08'
            },{
                title: 'Private Holiday',
                start: '2022-05-15'
            },{
                title: 'Private Holiday',
                start: '2022-05-22'
            },{
                title: 'Private Holiday',
                start: '2022-05-29'
            },{
                title: 'Private Holiday',
                start: '2022-06-05'
            },{
                title: 'Private Holiday',
                start: '2022-06-12'
            },{
                title: 'Private Holiday',
                start: '2022-06-19'
            },{
                title: 'Private Holiday',
                start: '2022-06-26'
            },{
                title: 'Private Holiday',
                start: '2022-07-03'
            },{
                title: 'Private Holiday',
                start: '2022-07-10'
            },{
                title: 'Private Holiday',
                start: '2022-07-17'
            },{
                title: 'Private Holiday',
                start: '2022-07-24'
            },{
                title: 'Private Holiday',
                start: '2022-07-31'
            },{
                title: 'Private Holiday',
                start: '2022-08-07'
            },{
                title: 'Private Holiday',
                start: '2022-08-14'
            },{
                title: 'Private Holiday',
                start: '2022-08-21'
            },{
                title: 'Private Holiday',
                start: '2022-08-28'
            },{
                title: 'Private Holiday',
                start: '2022-09-04'
            },{
                title: 'Private Holiday',
                start: '2022-09-11'
            },{
                title: 'Private Holiday',
                start: '2022-09-18'
            },{
                title: 'Private Holiday',
                start: '2022-09-25'
            },{
                title: 'Private Holiday',
                start: '2022-10-02'
            },{
                title: 'Private Holiday',
                start: '2022-10-09'
            },{
                title: 'Private Holiday',
                start: '2022-10-16'
            },{
                title: 'Private Holiday',
                start: '2022-10-23'
            },{
                title: 'Private Holiday',
                start: '2022-10-30'
            },{
                title: 'Private Holiday',
                start: '2022-11-06'
            },{
                title: 'Private Holiday',
                start: '2022-11-13'
            },{
                title: 'Private Holiday',
                start: '2022-11-20'
            },{
                title: 'Private Holiday',
                start: '2022-11-27'
            },{
                title: 'Private Holiday',
                start: '2022-12-04'
            },{
                title: 'Private Holiday',
                start: '2022-12-11'
            },{
                title: 'Private Holiday',
                start: '2022-12-18'
            },{
                title: 'Private Holiday',
                start: '2022-12-25'
            }],

            selectable: true,
            selectHelper: true,
            select: function (start, end) {
               
                popup.style.display = "block";
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                //end.setDate( end.getDate() - 1 );
                //console.log(end.getDate()-1);
                //var title = prompt("Enter value");
                add.onclick = function () {
                    //console.log("add btn");
                    var title = $('#type option:selected').text();
                    console.log(title);  
                    var titleval = $('#type option:selected').val();
                    $.ajax({
                        url: 'addshift.php',
                        data: 'emp=' + selectedEmp + '&start=' + start + '&end=' + end + '&title=' + titleval,
                        type: "POST",
                        // datatype:'json',
                        success: function (data) {
                            // var events=[];
                            // //displayMessage("Added Successfully");
                            // let buffer = '';
                
                            // for (var i = 0; i < data.length; i++) {
                            //     buffer += '<li>'+data[i].shift_name+'</li>';
                            // }
                
                            // events.push({title:buffer});
                            alert(data);
                        }
                    });
                    // $.ajax({
                    //     url: "addShift.php",
                    //     type: "GET",
                    //     //data :'platforms=platforms',
                    //     dataType: 'json',
                    //     contentType: false,
                    //     cache: false,
                    //     processData: false,
                    //     success: function(response) {
                    //         alert(response);
                    //         // for(var i = 0; response.length < i; i++) {
                    //         //     $('.platformsList').html('<li>'+response.name+'</li>');
                    //         // }
                    //     }
                    // });

                    calendar.fullCalendar('renderEvent',
                        {
                            popup: popup,
                            title: title,
                            start: start,
                            end: end,
                            //id:id
                            //allDay: allDay
                        },
                        true
                    );
                }
                calendar.fullCalendar('unselect');


            },

            editable: true,
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                $.ajax({
                    url: 'editShift.php',
                    data: '&start=' + start + '&end=' + end + 'title=' + event.titleval +'&id=' + event.selectedEmp,
                    type: "POST",
                    success: function (response) {
                        //displayMessage("Updated Successfully");
                        alert(response);
                    }
                });
            },
            event:[
                {id:selectedEmp}
            ],
            eventClick: function (event) {
                var deleteMsg = confirm("Do you really want to delete?");
                
                if (deleteMsg) {
                    console.log(event.id);
                    $.ajax({
                        type: "POST",
                        url: "deleteShift.php",
                        data: "&id=" + event.id,
                        success: function (response) {
                            console.log(response);
                            if (parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                //displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
            },  

        });
        var currentmonth = new Date();
        var month=currentmonth.getMonth()+1;
        var year1 = currentmonth.getUTCFullYear();
        //console.log(year);
        // $.ajax({
        //     url: "selectshift.php",
        //     type: "GET",
        //     data: 'emp=' + selectedEmp + '&month=' + month + '&year=' + year,
        //     dataType: 'json',
        //     success: function(response) {
        //         // $.each($(response),function(key,value){
        //         //     console.log(value);
        //         //  });
        //         alert(response);
        //     }
        // })
        $.ajax({
            type: "get",
            url: "selectshift.php",
            data: { 
                month:month,
                year:year1,
                empid:selectedEmp
             },
             datatype:"json",
            success: function (response) {
                //console.log(response);
                 var arr = JSON.parse(response);
              
                
                //alert(response.shift_name);
                // Object.keys(response).map(k => {
                //     var row = response[k]
                //     //alert(row);
                    
                // })
                events.push({ id: 6, title: "Morning", start: "2022-10-1", end: "2022-10-10" });
                alert(arr);
                // $('#content').html(response);
                //row.fadeOut('slow');
            },
            
        })
        // var getid = calendar.getEventById(selectedEmp);
        // console.log(getid);
    });

    close.onclick = function () {
        popup.style.display = "none";
    }
});


// if (popup) {
                    //     
                    //     var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                    //     var end = $.fullCalendar.formatDate(end, "Y-MM-DD");


                    //     $.ajax({
                    //         url: 'addshift.php',
                    //         data: 'emp=' + selectedEmp + '&start=' + start + '&end=' + end,
                    //         type: "POST",
                    //         success: function (data) {
                    //             //displayMessage("Added Successfully");
                    //             alert(data);
                    //         }
                    //     });
                    //     calendar.fullCalendar('renderEvent',
                    //         {
                    //             popup: popup,
                    //             title: title,
                    //             start: start,
                    //             end: end,
                    //             // allDay: allDay
                    //         },
                    //         true
                    //     );
                    // }




