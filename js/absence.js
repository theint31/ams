$(document).ready(function(){
    $('#searchAbsentWithLeave').click(function(e){
        e.preventDefault();
        console.log("searchAbsentWithLeave");
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();
        $.ajax({
            type:"post",
            url:"absent_search.php",
            data:{
                startDate:startDate,
                endDate:endDate
            },
            success:function(response){
                //alert(response);
                $('#tbody').html(response);
            }
        })
    })
    $("#searchWihoutLeave").click(function(e){
        e.preventDefault();
        console.log("searchWihoutLeave");
        var name = $( "#eName option:selected" ).text();
        var startDate = $("#startDate").val();
        var endDate = $("#endDate").val();
        console.log(name);

        $.ajax({
            type:"post",
            url:"absenceWithoutLeaveSearch.php",
            data:{
                name:name,
                startDate:startDate,
                endDate:endDate
            },
            success:function(response){
                alert(response);
            }
        })

        
    })
    
   
    
    
})