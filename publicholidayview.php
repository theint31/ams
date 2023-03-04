<?php 
include_once 'controller/publicholidaycontroller.php';

$id=$_GET['id'];
$publicholidaycontroller = new PublicHolidayController();
$result =$publicholidaycontroller->viewPublicholidays($id);
// var_dump($result);

include_once 'layouts/header.php';
?>
<div id="app">
    <?php 
    include_once ('layouts/sidebar.php');
    ?>
        <div id="main">
        <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <h1>Public Holidays View Form</h1>
            <table class="table">
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Public Holidays Name</th>
                </tr>
                <?php 
                  
                  
                    echo "<tr>";
                    echo "<td>".$result['date']."</td>";
                    echo "<td>".$result['day']."</td>";
                    echo "<td>".$result['name']."</td>";
                    echo "</tr>";
                  
                    
                ?>

            </table>
           
           
        </div>
    </div>
<?php 
    include_once 'layouts/footer.php';
?>

