<script src = "js/jquery-3.6.0.min.js"></script>
<script src="assets/vendors/fullcalendar/lib/jquery.min.js"></script>
    <script src="assets/vendors/fullcalendar/lib/moment.min.js"></script>
    <script src="assets/vendors/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/calendar.js"></script>
    <script src="assets/js/myscript.js"></script>
    <script src="assets/js/position.js"></script>
    <script src="assets\vendors\chartjs\Chart.min.js"></script>

    <script src="assets/js/main.js"></script>
    <script src = "js/myscript.js"></script>
    <script src = "js/attendance.js"></script>
    <script src = "js/leave.js"></script>
    <script src = "js/absence.js"></script>
    <script src = "js/absence1.js"></script>
    <script src = "js/bar_chart1.js"></script>
    <script src = "js/bar_chart2.js"></script>
    <script src = "js/pie_chart.js"></script>

    <script>
      //for line chart
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        function number_format(number, decimals, dec_point, thousands_sep) {
          // *     example: number_format(1234.56, 2, ',', ' ');
          // *     return: '1 234,56'
          number = (number + '').replace(',', '').replace(' ', '');
          var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function (n, prec) {
              var k = Math.pow(10, prec);
              return '' + Math.round(n * k) / k;
            };
          // Fix for IE parseFloat(0.55).toFixed(0) = 0;
          s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
          if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
          }
          if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
          }
          return s.join(dec);
        }
        
        console.log("chart");
        function getDaysInCurrentMonth() {
            const date = new Date();
          
            return new Date(
              date.getFullYear(),
              date.getMonth() + 1,
              0
            ).getDate();
          }
          var day = getDaysInCurrentMonth();
        console.log(day);
        var days= [];
        var count=1;
        for(var i=0;i<day;i++){
            days[i]=count;
            count++;
        }
        console.log(days);
        
        var noOfEmpsAttendance_Obj = JSON.parse('<?php echo $noOfEmpsAttendanceJson; ?>');
        console.log(noOfEmpsAttendance_Obj);

        var daysJson_Obj = JSON.parse('<?php echo $daysJson; ?>');
        console.log(daysJson_Obj);

        var attendanceResult_Obj = JSON.parse('<?php echo $attendanceResultJson; ?>');
        console.log(attendanceResult_Obj);
        console.log(noOfEmpsAttendance_Obj[1][0].No_of_Emps);
        var attendanceList= [];;
        var countforindex =0;
        for(var i=0;i<noOfEmpsAttendance_Obj.length;i++){
          console.log(noOfEmpsAttendance_Obj[i][0].No_of_Emps);
          attendanceList[countforindex] = noOfEmpsAttendance_Obj[i][0].No_of_Emps;
          countforindex++;
        }
        console.log('hello');
        console.log(attendanceList);
        // Area Chart Example
        var ctx = document.getElementById("myAreaChart");
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: daysJson_Obj,
          
            datasets: [{
              label: "No of employees",
              lineTension: 0.3,
              backgroundColor: "rgba(78, 115, 223, 0.05)",
              borderColor: "rgba(78, 115, 223, 1)",
              pointRadius: 3,
              pointBackgroundColor: "rgba(78, 115, 223, 1)",
              pointBorderColor: "rgba(78, 115, 223, 1)",
              pointHoverRadius: 3,
              pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
              pointHoverBorderColor: "rgba(78, 115, 223, 1)",
              pointHitRadius: 10,
              pointBorderWidth: 2,
              //data: [days_obj.jan, month_obj.feb, month_obj.march, month_obj.april, month_obj.may, month_obj.jun],
              data:attendanceList,
            }],
          },
          options: {
            maintainAspectRatio: false,
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              xAxes: [{
                // title : "Primary X Axis",
                scaleLabel: {
                  display: true,
                  labelString: 'Days',
                  
                },

                time: {
                  unit: 'date'
                },
                gridLines: {
                  display: false,
                  drawBorder: false
                },
                ticks: {
                  maxTicksLimit: 31
                }
              }],
              yAxes: [{
                
                scaleLabel: {
                  display: true,
                  labelString: 'No of employees'
                },
                ticks: {
                  maxTicksLimit: 5,
                  padding: 10,
                  // Include a dollar sign in the ticks
                  callback: function (value, index, values) {
                    return  number_format(value);
                  }
                },
                gridLines: {
                  color: "rgb(234, 236, 244)",
                  zeroLineColor: "rgb(234, 236, 244)",
                  drawBorder: false,
                  borderDash: [2],
                  zeroLineBorderDash: [2]
                }
              }],
            },
            legend: {
              display: false
            },
            tooltips: {
              backgroundColor: "rgb(255,255,255)",
              bodyFontColor: "#858796",
              titleMarginBottom: 10,
              titleFontColor: '#6e707e',
              titleFontSize: 14,
              borderColor: '#dddfeb',
              borderWidth: 1,
              xPadding: 15,
              yPadding: 15,
              displayColors: false,
              intersect: false,
              mode: 'index',
              caretPadding: 10,
              callbacks: {
                label: function (tooltipItem, chart) {
                  var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                  return datasetLabel  + number_format(tooltipItem.yLabel);
                }
              }
            }
          }
        });




        //forPieChart

       
      var sumOfEmpsAttendance_Obj = JSON.parse('<?php echo $sumOfEmpsAttendanceJson; ?>');
      console.log(sumOfEmpsAttendance_Obj);

      var sumOfEmpsLeave_Obj = JSON.parse('<?php echo $sumOfEmpsLeaveJson; ?>');
      console.log(sumOfEmpsLeave_Obj);

      var totalSum_Obj = JSON.parse('<?php echo $totalSum; ?>');
      console.log(totalSum_Obj);

      var absenceWithLeaveList= [];;
        //var countforindex =0;
        for(var i=0;i<sumOfEmpsAttendance_Obj.length;i++){
          //console.log(sumOfEmpsAttendance_Obj[0].sum_of_emps);
          absenceWithLeaveList[countforindex] = sumOfEmpsAttendance_Obj[0].sum_of_emps;
          countforindex++;
        }

        console.log(absenceWithLeaveList);

        var absenceWithoutLeave= [];;
        //var countforindex =0;
        for(var i=0;i<sumOfEmpsLeave_Obj.length;i++){
          //console.log(sumOfEmpsLeave_Obj[0].sum_of_emps);
          absenceWithoutLeave[countforindex] = sumOfEmpsLeave_Obj[0].sum_of_emps;
          countforindex++;
        }

        console.log(absenceWithoutLeave);


      // Set new default font family and font color to mimic Bootstrap's default styling
      Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
      Chart.defaults.global.defaultFontColor = '#858796';

      // Pie Chart Example
      var ctx = document.getElementById("myPieChart");
      var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ["Attendance", "Absence With Leave", "Absence Without Leave"],
          datasets: [{
            data: [sumOfEmpsAttendance_Obj[0].sum_of_emps, sumOfEmpsLeave_Obj[0].sum_of_emps, totalSum_Obj],
            backgroundColor: ['#2ca332', '#bfc423', '#b53b28'],
            hoverBackgroundColor: ['#245926', '#594a18', '#662a21'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
          }],
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
          },
          legend: {
            display: false
          },
          cutoutPercentage: 80,
        },
      });

        

    </script>
</body>

</html>