<!--
NAME : Aarsh Parimal Patel
Student ID : 200520260
Assignment#3 -->


<!-- This is the code for the Profile page of our website -->
<!-- This page will display the profile which was created on the Add Profile page and this page will also have Update and Delete functions -->
<?php
// Including our database file to make connection
include "database.php";
$customerObj = new database();

//adding the delete function Here
if (isset($_GET['deletedID']) && !empty($_GET['deletedID'])) {
    $deletedID = $_GET['deletedID'];
    $customerObj->deleteRecord($deletedID);
}

?>

<!-- adding out doctype -->
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
        <!-- adding our alerts which will show up whenever the record is successfully inserted,updated or deleted -->
        <?php
        if (isset($_GET['msg1']) == "insert") {
            echo "<div class='alert alert-success alert-dismissible'>
           <strong>Success!</strong> Your profile has been added!
           <button type='button' class='close' data-dismiss='alert'>X</button>
           </div>";
        }

        if (isset($_GET['msg2']) == "update") {
            echo "<div class='alert alert-success alert-dismissible'>
            <strong>Success! </strong> Your profile has been updated!
           <button type='button' class='close' data-dismiss='alert'>X</button>
           </div>";
        }

        if (isset($_GET['msg3']) == "delete") {
            echo "<div class='alert alert-success alert-dismissible'>
        <strong>Success!</strong> Your profile has been deleted!
           <button type='button' class='close' data-dismiss='alert'>X</button>
           </div>";
        }
        ?>
        <!-- adding the variable which will fetch and display our data at the required spots -->
        <?php
        $customers = $customerObj->displayData();
        foreach ($customers as $customer) {
        ?>

        <section>


          <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <!-- This division is for our Full NAme, Profession and Address which will be displayed at the upper section of our page -->
                                <!-- Here I have used ID as a trigger for adding our data -->
                                <p hidden><?php echo $customer['id']; ?></p>
                                <!-- for full name -->
                                <h5 class="my-3"><?php echo $customer['fullname']; ?></h5>
                                <!-- for profession -->
                                <p class="text-muted mb-1"><?php echo $customer['profession']; ?></p>
                                <!-- for address -->
                                <p class="text-muted mb-4"><?php echo $customer['address']; ?></p>
                                <hr>
                                <p><?php echo $customer['bio']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>


        </section>
        <section>
            <!-- This is the section where all our data will be displayed which has been inserted or updated. -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <!-- for full name-->
                                <p class="text-muted mb-0"><?php echo $customer['fullname']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <!-- for email -->
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $customer['email']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <!-- for phone -->
                                <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $customer['phonenum']; ?></p>
                            </div>
                        </div>
                        <hr>




                        <div class="row">
                            <div class="col-sm-3">
                                <!-- for Date of Birth -->
                                <p class="mb-0">Date of birth</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $customer['birthdate']; ?></p>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-sm-3">
                                <!-- for address -->
                                <p class="mb-0">Address</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?php echo $customer['address']; ?></p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- adding our button which will redirect the user to the Update profile page of our website -->
            <div class="d-flex justify-content-center">
                <a href="updateprofile.php?updateId=<?php echo $customer['id']; ?>"> <button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z" />
                        </svg>Update</button></a>

                <!-- adding the button to Delete our profile -->
                <a href="index.php?deletedID=<?php echo $customer['id']; ?>"> <button type="button" class="btn btn-outline-primary ms-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                        </svg>Delete</button></a>

            </div>

        </section>
        <?php
            }
        ?>
    </main>

    <!-- calling our footer -->
    <?php require('./footer.php'); ?>

    <!-- adding our script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
<!-- End of the code for our View Profile page -->
