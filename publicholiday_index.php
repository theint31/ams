<?php 
    include_once 'controller/publicholidaycontroller.php';

    $publicholidaycontroller = new PublicHolidayController();
    $results = $publicholidaycontroller->getPublicholidays();
    // print_r ($results);
    include_once ('layouts/header.php');
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
            <h1>Public Holiday Assignments</h1>
            <div class="text-end me-5">
                <a class="btn btn-dark" href="publicholidaycreate.php">Insert Public Holiday</a>
            </div>
            
            <form>
                <table class="table">
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Public Holidays Name</th>
                        <th colspan="4">Action</th>
                    </tr>
                    <?php 
                        $count=1;
                        foreach($results as $result){
                            echo "<tr>";
                            echo "<td>".$count."</td>";
                            echo "<td>".$result['date']."</td>";
                            echo "<td>".$result['day']."</td>";
                            echo "<td>".$result['name']."</td>";
                            echo "<td><a class='btn btn-info' href=publicholidayview.php?id=".$result['id']."><i class='fa-solid fa-eye'></i></a>
                            <a class='btn btn-success' href=publicholidayedit.php?id=".$result['id']."><i class='fa-solid fa-pen'></i></a>
                            <button class='btn btn-danger'><i class='fa-solid fa-trash-can'></i></button>
                            </td>";
                            echo "</tr>";
                            $count++;
                        }
                    ?>
                </table>
            </form>

            <!-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>  -->
        </div>
    </div>

<?php 
    include_once ('layouts/footer.php');
?>
   