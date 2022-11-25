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
        $fullname = $this->databaseConnect->real_escape_string($_POST['FullName']);
        $email = $this->databaseConnect->real_escape_string($_POST['Email']);
        $phonenum = $this->databaseConnect->real_escape_string($_POST['PhoneNumber']);
        $profession = $this->databaseConnect->real_escape_string($_POST['Profession']);
        $birthdate = $this->databaseConnect->real_escape_string($_POST['Birthdate']);
        $address = $this->databaseConnect->real_escape_string($_POST['Address']);
        $bio = $this->databaseConnect->real_escape_string($_POST['Bio']);
        // adding query to add our data
        $query = "INSERT INTO Profile_Record(FullName,Email,PhoneNumber,Profession,Birthdate,Address,Bio) VALUES ('$fullname','$email','$phonenum','$profession','$birthdate','$address','$bio')";
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
        $query = "SELECT * FROM Profile_Record LIMIT 1";
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
    public function displayRecordByID($ID)
    {
        // adding query to display our data

        // Here I have limited the query to 1 row which will only display one record and other records will not be displayed
        $query = "SELECT * FROM Profile_Record WHERE ID = '$ID' LIMIT 1";
        $results = $this->databaseConnect->query($query);
        if ($results->num_rows > 0) {
            $row = $results->fetch_assoc();
        } else {
            // adding alert fo error
            echo "<div class='alert alert-danger alert-dismissible'>
         <button type='button' class='close' data-dismiss='alert'>X</button>
         <strong>Error! </strong> Your profile couldn't be updated!
         </div>";
        }
    }
    //Creating update function
    public function updateRecord($postData)
    {
        $fullname = $this->databaseConnect->real_escape_string($_POST['uFullName']);
        $email = $this->databaseConnect->real_escape_string($_POST['uEmail']);
        $phonenum = $this->databaseConnect->real_escape_string($_POST['uPhoneNumber']);
        $profession = $this->databaseConnect->real_escape_string($_POST['uProfession']);
        $birthdate = $this->databaseConnect->real_escape_string($_POST['uBirthdate']);
        $address = $this->databaseConnect->real_escape_string($_POST['uAddress']);
        $bio = $this->databaseConnect->real_escape_string($_POST['uBio']);
        $ID = $this->databaseConnect->real_escape_string($_POST['ID']);
        if (!empty($ID) && !empty($postData)) {
            // adding query to update our data
            $query = "UPDATE Profile_Record SET FullName = '$fullname', Email = '$email', PhoneNumber = '$phonenum', Profession = '$profession', Birthdate = '$birthdate', Address = '$address', Bio = '$bio' WHERE ID = '$ID' LIMIT 1";
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
    public function deleteRecord($ID)
    {
        // adding query to delete our data
        $query = "DELETE FROM Profile_Record WHERE ID = '$ID'";
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
