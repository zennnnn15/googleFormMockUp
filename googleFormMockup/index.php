
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="form3.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
include 'dbcon.php';

if(isset($_POST['submit'])){
    $emailUser = $_POST['email'];
    $agreeUser = $_POST['agree'];

    if($agreeUser == 'yes'){
        // Check if email already exists
        $checkEmailQuery = "SELECT COUNT(*) as count FROM user WHERE userEmail='$emailUser'";
        $checkEmailResult = mysqli_query($con, $checkEmailQuery);
        $count = mysqli_fetch_assoc($checkEmailResult)['count'];
        
        if ($count > 0) {
            // Email already exists
            echo '<script type="text/javascript">
                    swal("Error", "Email already exists", "error");
                  </script>';
        } else {
            // Insert new user
            $insertQuery = "INSERT INTO `user`(`userEmail`) VALUES ('$emailUser')";
            $result = mysqli_query($con,$insertQuery);

            if($result) {
                // Retrieve the userId of the newly inserted user
                $userId = mysqli_insert_id($con);
                // Redirect to another page with userId as parameter
                header('Location: mainform.php?userId='.$userId);
                exit();
            } else {
                // Error message
                echo '<script type="text/javascript">
                        swal("Error", "Failed to add user", "error");
                      </script>';
            }
        }
    } else {
        // Error message
        echo '<script type="text/javascript">
                swal("Error", "Please agree to terms and conditions", "error");
              </script>';
    }
}
?>






<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="card custom-border-top">
        <div class="card-body">
          <h2 class="card-title text-center mb-4">Transaction Request Form</h2>
         
          <p>Accomplish this form to log the transaction request for the service that you need. Kindly use your institutional email in logging to this form.</p>
        </div>
        <div class="card">
          <div class="card-body">
            <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                 <input type="email" class="form-control border-bottom-only" id="email" name="email" required>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
    <div class="card custom-border-top">
    <div id="label"><b>Data Privacy Act Consent Agreement</b></div>

 <hr>
  <div class="card-body">
   <p>
The Pangasinan State University recognizes its responsibilities under RA 10173, also known as the Data Privacy Act of 2012, with respect to the data it collects, records, organizes, updates, uses, consolidates or destructs from its clients. The personal data obtained from this portal is entered and stored within the University's information and communications system and will only be accessed solely by PSU authorized personnel.
   </p>
   <p>
   Furthermore, the information collected in this transaction tracker shall only be used for the processing of frontline services of the University. The University shall not disclose the employee's/student's personal information without their consent.
   </p>
   <p>
   I have read the Institute's Data Privacy Statement and express my consent for the Pangasinan State University to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information.
   </p>
   <p>
   I hereby affirm my right to be informed, object to processing, access and rectify, suspend or withdraw my personal data, and be indemnified in case of damages pursuant to the provisions of the Republic Act No. 10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.
   </p>
   <hr>
   <div class="form-group">
  <label for="agree">Do you agree to our terms and conditions?</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="agree" id="agree_yes" value="yes" required>
    <label class="form-check-label" for="agree_yes">
      Yes
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="agree" id="agree_no" value="no" required>
    <label class="form-check-label" for="agree_no">
      No
    </label>

  </div>
  <hr>
  <button type="submit" name='submit' class="btn-submit">Submit</button>
</div>

  </div>

</div>

    </div>
  </div>
</div>



</form>






</body>
</html>