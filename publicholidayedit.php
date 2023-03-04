<?php 
include_once 'controller/publicholidaycontroller.php';


$id=$_GET['id'];
$publicholidaycontroller = new PublicHolidayController();
$result =$publicholidaycontroller->viewPublicholidays($id);

// $err_status = false;
// if(isset($_POST['update'])){
//     if(!empty($_POST['name'])){
//         $name = $_POST['name'];
//     }else{
//         $name_err = "Please fill department";
//         $err_status=true;
//     }

//     if(!empty($_POST['phone'])){
//         $phone = $_POST['phone'];
//     }else{
//         $phone_err = "Please fill phone";
//         $err_status=true;
//     }

//     if(!empty($_POST['email'])){
//         $email = $_POST['email'];
//     }else{
//         $email_err = "Please fill email";
//         $err_status=true;
//     }

//     if($err_status==false){
//         $deptedit = $deptcontroller->editDepartment($name,$phone,$email,$id);
//         header('location:departmentindex.php');
//     }
// }

include_once 'layout/header.php';
?>
<div id="app">
    <?php 
    include_once ('layout/sidebar.php');
    ?>
        <div id="main">
        <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <h1>Public Holiday Update Form</h1>
            <form method="post">
                <div class="row">
                    <div class="col-md-4 ">
                        <div>
                            <label for="" class="form-label mt-4">Choose Date</label>
                            <input type="date" name="date" id="start">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <select name="day" class=" form-select mt-3" id="day">
                                <option value="1">Monday</option>
                                <option value="2">Tuesday</option>
                                <option value="3">Wednesday</option>
                                <option value="4">Thursday</option>
                                <option value="5">Friday</option>
                                <option value="6">Saturday</option>
                                <option value="7">Sunday</option>
                            </select>
                            <!-- <span class="text-danger"><?php if(isset($day_err)) echo $day_err; ?></span> -->
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div>
                            <select name="name" class="form-select mt-3" id="name">
                                <option value="1">New Year</option>
                                <option value="2">Independence Day</option>
                                <option value="3">Union Day</option>
                                <option value="4">Full Moon Day of Tabaung</option>
                                <option value="5">Parents' Day</option>
                                <option value="6">Armed Forces Day</option>
                                <option value="7">Water Fesitval</option>
                                <option value="8">Second Day of Water Festival</option>
                                <option value="9">Third Day of Water Festival</option>
                                <option value="10">Fourth Day of Water Festival</option>
                                <option value="11">Burmese New Year</option>
                                <option value="12">Labor Day</option>
                                <option value="13">Full Moon Day of Kasong</option>
                                <option value="14">Full Moon Day of Waso</option>
                                <option value="15">Martyrs' Day</option>
                                <option value="16">Day before Full Moon Day of Thadingyut</option>
                                <option value="17">Full Moon Day of Thadingyut</option>
                                <option value="18">Day after Full Moon Day of Thadingyut</option>
                                <option value="19">Day before Full Moon Day of Tazaungmone</option>
                                <option value="20">Full Moon Day of TazaungMone</option>
                                <option value="21">National Day</option>
                                <option value="22">Kayin New Year</option>
                                <option value="23">Christmas Day</option>
                                <option value="24">New Year's Eve</option>
                                <option value="25">Diwali Festival</option>
                            </select>
                            
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button name="update" class="btn btn-dark">Update</button>
                    </div>
               </div>
            </form>
          
          
           
           
        </div>
    </div>
<?php 
    include_once 'layout/footer.php';
?>

