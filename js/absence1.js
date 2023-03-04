$(document).ready(function(){
    $(".absenceSearchWithName").click(function(e){
        e.preventDefault();
        console.log("absenceSearchWithName");
        var name =  $( "#eName option:selected" ).text();
        var startDate = $("#sDate").val();
        var endDate = $("#eDate").val();
        console.log(name);
        console.log(startDate);
        console.log(endDate);

        $.ajax({
            type:"post",
            url:"absenceWithoutLeaveSearchWithName.php",
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