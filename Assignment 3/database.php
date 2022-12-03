<!-- NAME: AARSH PARIMAL PATEL -->
<!-- STUDENT ID: 200520260 -->
<!-- Assignment 3-->

<!-- The below code will be used to make connection to our database-->
<?php
class database
{
    public $servername = "172.31.22.43";
    public $username = "Aarsh200520260";
    public $password = "iscV0d0erO";
    public $database = "Aarsh200520260";
    public $databaseConnect;


    // creating our connections
    public function __construct()
    {
        $this->databaseConnect = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect:" . mysqli_connect_error());
        } else {
            return $this->databaseConnect;
        }
    }

    // the below is the function to insert data (Create function)
    public function insertData($post)
    {
        $fullname = $this->databaseConnect->real_escape_string($_POST['fullname']);
        $email = $this->databaseConnect->real_escape_string($_POST['email']);
        $phonenum = $this->databaseConnect->real_escape_string($_POST['phonenum']);
        $profession = $this->databaseConnect->real_escape_string($_POST['profession']);
        $birthdate = $this->databaseConnect->real_escape_string($_POST['birthdate']);
        $address = $this->databaseConnect->real_escape_string($_POST['address']);
        $bio = $this->databaseConnect->real_escape_string($_POST['bio']);
        // adding query to add our data
        $query = "INSERT INTO Profile_Record(fullname,email,phonenum,profession,birthdate,address,bio) VALUES ('$fullname','$email','$phonenum','$profession','$birthdate','$address','$bio')";
        $sql = $this->databaseConnect->query($query);
        if ($sql == true) {
            //this will display message on the View profile page when the form is submitted successfully
            header("Location:index.php?msg1=insert");
        } else {
            // adding alert fo error
            echo "<div class='alert alert-danger alert-dismissible'>
                 <button type='button' class='close' data-dismiss='alert'>X</button>
                 <strong>Error! </strong> Your profile couldn't be added!
                 </div>";
        }
    }

    //This will fetch all the data (READ function)
    public function displayData()
    {
        // adding query to display our data
        $query = "SELECT * FROM Profile_Record";
        $results = $this->databaseConnect->query($query);
        if ($results->num_rows > 0) {
            $data = array();
            while ($row = $results->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            // adding alert fo error
?>
            <div class="addprofile">
                <?php echo "<h2> No profile found :(  Please create a profile in the Add Profile page!</h2>"; ?>
            </div>
<?php
        }
    }


    //creating function to fetch single row from the table (Read and Update function)
    public function displayRecordById($id)
    {
        // adding query to display our data
        $query = "SELECT * FROM Profile_Record WHERE id = '$id'";
        $results = $this->databaseConnect->query($query);
        if ($results->num_rows > 0) {
            $row = $results->fetch_assoc();
            return $row;
        } else {
            // adding alert for error
            echo "<div class='alert alert-danger alert-dismissible'>
         <button type='button' class='close' data-dismiss='alert'>X</button>
         <strong>Error! </strong> Your profile couldn't be updated!
         </div>";
        }
    }
    //Creating update function
    public function updateRecord($postData)
    {
        $fullname = $this->databaseConnect->real_escape_string($_POST['ufullname']);
        $email = $this->databaseConnect->real_escape_string($_POST['uemail']);
        $phonenum = $this->databaseConnect->real_escape_string($_POST['uphonenum']);
        $profession = $this->databaseConnect->real_escape_string($_POST['uprofession']);
        $birthdate = $this->databaseConnect->real_escape_string($_POST['ubirthdate']);
        $address = $this->databaseConnect->real_escape_string($_POST['uaddress']);
        $bio = $this->databaseConnect->real_escape_string($_POST['ubio']);
        $id = $this->databaseConnect->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            // adding query to update our data
            $query = "UPDATE Profile_Record SET fullname = '$fullname', email = '$email', phonenum = '$phonenum', profession = '$profession', birthdate = '$birthdate', address = '$address', bio = '$bio' WHERE id = '$id'";
            $sql = $this->databaseConnect->query($query);
            if ($sql == true) {
                //this will display message on the View profile page when the form is submitted successfully
                header("Location:index.php?msg2=update");
            } else {
                // adding alert fo error
                echo "<div class='alert alert-danger alert-dismissible'>
          <button type='button' class='close' data-dismiss='alert'>X</button>
          <strong>Error! </strong> Your profile couldn't be updated!
          </div>";
            }
        }
    }
    //Creating Delete function
    public function deleteRecord($id)
    {
        // adding query to delete our data
        $query = "DELETE FROM Profile_Record WHERE id = '$id'";
        $sql = $this->databaseConnect->query($query);
        if ($sql == true) {
            //this will display message on the View profile page when the form is submitted successfully
            header("Location:index.php?msg3=delete");
        } else {
            // adding alert fo error
            echo "Could not delete your profile";
        }
    }
}


//  end of the code for our database
?>
