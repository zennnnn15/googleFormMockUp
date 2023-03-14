<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form3.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.css">

    <title>Document</title>
</head>
<?php
include 'dbcon.php';
$userId = $_GET['userId'];
$sql = "SELECT userEmail FROM user WHERE userID = $userId";
$getEmailResult = mysqli_query($con, $sql);
$email = mysqli_fetch_assoc($getEmailResult)['userEmail'];



?>
<body>
    


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card custom-border-top">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Transaction Request Form</h2>
          <hr>
         
          <b><p><?php echo $email ?></p></b> 
<a href="deleteUserId.php?deleteUserId=<?php echo $userId ?>">Switch Account?</a>

        </div>
      
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card custom-border-top">
    <form method="POST" id="userInputs">
    <div id="label"><b>Client Category</b></div>

 
  <div class="card-body">
    <label for="">
       <b>Client Category</b> 
    </label>
    <br>
    <select name="selectedCategory" id="">
    <?php
$sqlCateg = "SELECT categoryID, categoryName FROM category";
$result = mysqli_query($con, $sqlCateg);

// Generate options for the dropdown
while ($row = mysqli_fetch_assoc($result)) {
  echo '<option value="' . $row["categoryID"] . '">' . $row["categoryName"] . '</option>';
}

?>
    </select>
  </div>

</div>

    </div>
  </div>
</div>





<!-- client details -->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card custom-border-top">
      <div id="label"><b>Client Details</b></div>
        <div class="card-body">
          <label for="">
           <b>ID Number</b>
          </label>
          <div class="form-group">
                 <input type="number" class="form-control border-bottom-only" id="idNum" name="idNumber" placeholder="Your Answer" required>
            </div>
        </div>
        <hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">
        
<!-- first name -->
        <div class="card-body">
          <label for="">
           <b>First Name</b>
          </label>
          <div class="form-group">
                 <input type="text" class="form-control border-bottom-only" id="" name="fname" placeholder="Your Answer" required>
            </div>
        </div>
        <hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">
        
<!-- middle name -->
        <div class="card-body">
          <label for="">
           <b>Middle Name</b>
          </label>
          <div class="form-group">
                 <input type="text" class="form-control border-bottom-only" id="" name="mname" placeholder="Your Answer" required>
            </div>
        </div>
        <hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">
        
<!-- lastname -->
        <div class="card-body">
          <label for="">
           <b>Last Name</b>
          </label>
          <div class="form-group">
                 <input type="text" class="form-control border-bottom-only" id="" name="lname" placeholder="Your Answer" required>
            </div>
        </div>

<!-- program -->
        <div class="card-body">
          <label for="">
           <b>Program Course</b>
          </label>
          <br>
          <select name="selectedCourse" id="">
    <?php
$sqlCourse = "SELECT `courseID`, `courseName` FROM `course`";
$results = mysqli_query($con, $sqlCourse);

// Generate options for the dropdown
while ($row = mysqli_fetch_assoc($results)) {
  echo '<option value="' . $row["courseID"] . '">' . $row["courseName"] . '</option>';
}

?>
    </select>
        </div>
        <hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">


        <!-- # number -->
        <div class="card-body">
          <label for="">
           <b>Contact Number</b>
          </label>
          <div class="form-group">
                 <input type="number" class="form-control border-bottom-only" id="" name="contactNum" placeholder="Your Answer" required>
            </div>
        </div>
        <hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">


            <!-- # home add -->
            <div class="card-body">
          <label for="">
           <b>Home Address</b><br>
           <p>Barangay/Street,Municipality/City,Province Zip Code</p>
          </label>
          <div class="form-group">
                 <input type="text" class="form-control border-bottom-only" id="" name="userAdd" placeholder="Your Answer" required>
            </div>
        </div>
        


      </div>
    </div>
  </div>
</div>



<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card custom-border-top">
    <div id="label"><b>Client Campus</b></div>

<!-- program -->
<div class="card-body">
          <label for="">
           <b>Client Campus</b>
          </label>
          <br>
          <select name="selectedCampus" id="">
    <?php
$sqlCampus = "SELECT `campusID`, `campusName` FROM `campus`";
$results = mysqli_query($con, $sqlCampus);

// Generate options for the dropdown
while ($row = mysqli_fetch_assoc($results)) {
  echo '<option value="' . $row["campusID"] . '">' . $row["campusName"] . '</option>';
}

?>
    </select>
        </div>
    </div>
  </div>
  
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <div class="card custom-border-top">
    <div id="label"><b>Service Availed Off</b></div>

 
  <div class="card-body">
    <label for="">
       <p>Choose any of the following service that you would like to request</p>
        <br>
        <p>How my we help you?</p>
    </label>
    <br>
  </div>
  <hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">
   <!-- # add -->
   <div class="card-body">
          <label for="">
           <b>Transaction Type Portal</b><br>
          </label>
<br>
<select name="selectedPortal" id="">
    <?php
$sqlTypePortal = "SELECT `tportalID`, `tPortalName` FROM `typeportal`";
$results = mysqli_query($con, $sqlTypePortal);

// Generate options for the dropdown
while ($row = mysqli_fetch_assoc($results)) {
  echo '<option value="' . $row["tportalID"] . '">' . $row["tPortalName"] . '</option>';
}

?>
    </select>
</div>


<hr style="border: none; border-top: 15px solid #f8f9fa; height: 0; margin: 10px 0;">
   <!-- # add -->
   <div class="card-body">
          <label for="">
           <b>Transaction Type Accounts</b><br>
          </label>
<br>
<select name="selectedAccount" id="">
    <?php
$sqlTypeAccount = "SELECT `typeID`, `typeName` FROM `typeaccount`";
$results = mysqli_query($con, $sqlTypeAccount);

// Generate options for the dropdown
while ($row = mysqli_fetch_assoc($results)) {
  echo '<option value="' . $row["typeID"] . '">' . $row["typeName"] . '</option>';
}

?>
    </select>
</div>
</div>

   

    </div>
  </div>
</div>
</div>

  
<br>
<div style="text-align: justify;">
  <input type="submit" name="isumite" value="Submit" style="display: inline-block;">
  <div style="text-align: right; display: inline-block;">
    <input type="reset" name="clear" value="Clear Form" id="clear-form" style="display: inline-block;">
  </div>
</div>



<br>
<hr style="border: none; border-top: 15px solid #f8f9fa00; height: 0; margin: 10px 0;">


</form>


<?php
if(isset($_POST['isumite'])){
  $userId = $_GET['userId'];
 $selectedCategory = $_POST['selectedCategory'];
 $idNumber = $_POST['idNumber'];
 $fname = $_POST['fname'];
 $mname = $_POST['mname'];
 $lname = $_POST['lname'];
 $selectedCourse = $_POST['selectedCourse'];
 $contactNum = $_POST['contactNum'];
 $userAdd = $_POST['userAdd'];
 $selectedCampus = $_POST['selectedCampus'];
 $selectedPortal = $_POST['selectedPortal'];
 $selectedAccount = $_POST['selectedAccount'];

 $formsubmit_query = "INSERT INTO `form_submit` ( `clientCategory`, `idNumber`, `firstName`, `middleName`, `lastName`, `prog_course`, `contact_no`, `home_address`, `client_campus`, `type_portal`, `type_account`, `userID`) VALUES ('$selectedCategory', '$idNumber', '$fname', '$mname', '$lname', '$selectedCourse', '$contactNum', '$userAdd', '$selectedCampus', '$selectedPortal', '$selectedAccount', '$userId');";

 $formsubmit_status = mysqli_query($con,$formsubmit_query);

 if($formsubmit_status) {
    
  echo "<script>
  Swal.fire({
    icon: 'success',
    title: 'Form submitted successfully',
    text: 'Thank you for submitting the form',
    timer: 3000, // 3 seconds delay before redirecting
    timerProgressBar: true,
    showConfirmButton: false
  }).then(function() {
      window.location.href = 'success.php';
  });
</script>";
 } else {
   
    echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Something went wrong',
        })
      </script>";
 }

}
?>



<script>
  // Get the form element
  const form = document.querySelector('#userInputs');

 
  const clearButton = document.querySelector('#clear-form');


  clearButton.addEventListener('click', (event) => {
    event.preventDefault(); 

    Swal.fire({
      icon: 'question',
      title: 'Are you sure?',
      text: 'This will clear all form inputs.',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, clear it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.reload()
        window.scrollTo(0, 0);
      }
    });
  });
</script>

<style>
#clear-form {
  background-color: transparent;
  border: none;
  color: black;
  cursor: pointer;
  padding: 0;
  margin-right: -968px;
  font-size: 1em;
}

</style>
</style>








</body>
</html>