<!--
NAME : Aarsh Parimal Patel
Student ID : 200520260
Assignment#3 -->

<!-- This is the code for the Add profile page of our website -->
<?php
//to include the database file
include "database.php";
$customerObj = new database();

// adding the if statement to insert the data when the user clicks the Add Profile button
if (isset($_POST['Addprofile'])) {
    $customerObj->insertData($_POST);
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
    <main>

        <section class="profileform">
            <div class="card-header bg-dark text-white">
                <h2>Insert Data</h2>
            </div>

            <!-- adding our form -->
            <form action="addprofile.php" method="POST">

                <div class="form-row">
                    <div class="form-group col-md-6">

                        <!-- input for first name -->
                        <label for="fullname">Full Name</label>
                        <input type="text" class="form-control" name="fullname" required="This field is required!" placeholder="Enter Your Full Name Here">
                    </div>
                    <!-- input for email -->
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" required="This field is required!" placeholder="Enter Your Email Address Here">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <!-- input for phone number -->
                        <label for="phonenum">Phone Number</label>
                        <input type="tel" class="form-control" name="phonenum" required="This field is required!" pattern="^[0-9]{6}|[0-9]{8}|[0-9]{10}$" placeholder="Enter Your Phone Number Here">

                    </div>
                    <div class="form-group col-md-6">
                        <!-- input for profession -->
                        <label for="profession">Profession</label>
                        <input type="text" class="form-control" name="profession" required="This field is required!" placeholder="Enter Your Profession Here">

                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <!-- input for date of birth -->
                        <label for="birthdate">Date of birth</label>
                        <input type="date" class="form-control" name="birthdate" required="This field is required!" placeholder="Enter your birth date here">
                    </div>
                    <div class="form-group col-md-6">
                        <!-- input for address -->
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" required="This field is required!" placeholder="Enter Your Address Here">
                    </div>
                </div>
                <!-- input for Bio -->
                <label for="bio">Bio</label>
                <input type="textarea" class="form-control" name="bio" required="This field is required!" placeholder="Write your Bio Here">
                </div>
                <br>

                <!-- adding our submit button -->
                <input type="submit" class="btn btn-primary" value="Add Profile" name="Addprofile">


                <br>
                <br>


            </form>

        </section>
    </main>
    <!-- calling our footer -->
    <?php require('./footer.php'); ?>

    <!-- adding script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<!-- End of the code for our Add profile page -->
