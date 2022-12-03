<!--
NAME : Aarsh Parimal Patel
Student ID : 200520260
Assignment#3 -->

<!-- This is the code for the Update profile page of our website -->

<?php
//to include the database file
include "database.php";
$customerObj = new database();

//to update our profile
if (isset($_GET['updateId']) && !empty($_GET['updateId'])) {
    $updateId = $_GET['updateId'];
    $customer = $customerObj->displayRecordById($updateId);
}
if (isset($_POST['Update'])) {
    $customerObj->updateRecord($_POST);
}


?>

<!-- adding our doctype -->
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- adding the metadata -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 3</title>
    <meta name="description" content="Assignment 3">
    <meta name="robots" content="noindex,nofollow">

    <!-- adding our css style sheet -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<!-- adding our body -->

<body>

    <!-- calling our header -->
    <?php require('./header.php'); ?>

    <!-- adding our main -->
    <main>

        <section class="profileform">

            <div class="card-header bg-dark text-white">
                <h2>Update Data</h2>
            </div>


            <!-- adding our form -->
            <form action="updateprofile.php" method="POST">




                   <div class="form-row">
                     <!-- adding variable to display the existing data -->

                        <div class="form-group col-md-6">

                             <!-- Here the values will be populated by the data which was inputted in the Add profile page -->

                            <!-- input for our full name -->
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" name="ufullname" value="<?php echo $customer['fullname']; ?>" required="This field is required!">
                        </div>
                        <div class="form-group col-md-6">

                            <!-- input for our email -->
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="uemail" value="<?php echo $customer['email']; ?>" required="This field is required!">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <!-- input for our phone number -->
                            <label for="phonenum">Phone Number</label>
                            <input type="tel" class="form-control" name="uphonenum" pattern="^[0-9]{6}|[0-9]{8}|[0-9]{10}$" value="<?php echo $customer['phonenum']; ?>" required="This field is required!">

                        </div>
                        <div class="form-group col-md-6">

                            <!-- input for our profession -->
                            <label for="profession">Profession</label>
                            <input type="text" class="form-control" name="uprofession" value="<?php echo $customer['profession']; ?>" required="This field is required!">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <!-- input for our date of birth -->
                            <label for="birthdate">Date of birth</label>
                            <input type="date" class="form-control" name="ubirthdate" value="<?php echo $customer['birthdate']; ?>" required="This field is required!">
                        </div>
                        <div class="form-group col-md-6">

                            <!-- input for our address -->
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="uaddress" value="<?php echo $customer['address']; ?>" required="This field is required!">
                        </div>
                    </div>

                    <!-- input for our bio -->
                    <label for="bio">Bio</label>
                    <input type="textarea" class="form-control" name="ubio" value="<?php echo $customer['bio']; ?>" required="This field is required!">
                    </div>
                    <br>

                    <!-- Here the id is hidden as the users cannot change it as it is the trigger to fetch and display our data -->
                    <input type="hidden" name="id" value="<?php echo $customer['id'];?>">

                    <!-- adding our submit button -->
                    <input type="submit" class="btn btn-primary" value="Update Profile" name="Update">

                    <br>
                    <br>

            </form>

        </section>

    </main>

    <!-- calling our footer -->
    <?php require('./footer.php'); ?>

    <!-- adding our script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>

<!-- End of the code for our Update Profile page -->
