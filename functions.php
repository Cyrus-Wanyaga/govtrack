<?php 
session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "govtrack";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $db_name);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    

    //declare variables
    $username = "";
    $email = "";
    $errors = array();

    //call register function once register button is clicked
    if(isset($POST['register_btn'])){
        register();
    }

    //Register Admin
    function register(){
        global $conn, $errors, $username, $email;

        $username    =  e($_POST['username']);
	    $email       =  e($_POST['email']);
	    $password_1  =  e($_POST['password_1']);
        $password_2  =  e($_POST['password_2']);
        
        //form validation
        if (empty($username)) { 
            array_push($errors, "Username is required"); 
        }
        if (empty($email)) { 
            array_push($errors, "Email is required"); 
        }
        if (empty($password_1)) { 
            array_push($errors, "Password is required"); 
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        //register users if no errors
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
    
            if (isset($_POST['user_type'])) {
                $user_type = e($_POST['user_type']);
                $query = "INSERT INTO administrators (username, email, user_type, password) 
                          VALUES('$username', '$email', '$user_type', '$password')";
                mysqli_query($conn, $query);
                $_SESSION['success']  = "New user successfully created!!";
                header('location: admin.php');
            }else{
                $query = "INSERT INTO administrators (username, email, user_type, password) 
                          VALUES('$username', '$email', 'user', '$password')";
                mysqli_query($conn, $query);
    
                // get id of the created user
                $logged_in_user_id = mysqli_insert_id($conn);
    
                $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
                $_SESSION['success']  = "You are now logged in";
                header('location: admin.php');				
            }
        }
    }
    
    // return user array from their id
    function getUserById($id){
        global $conn;
        $query = "SELECT * FROM administrators WHERE adminId =" . $id;
        $result = mysqli_query($conn, $query);
    
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    
    // escape string
    function e($val){
        global $conn;
        return mysqli_real_escape_string($conn, trim($val));
    }
    
    function display_error() {
        global $errors;
    
        if (count($errors) > 0){
            echo '<div class="error">';
                foreach ($errors as $error){
                    echo $error .'<br>';
                }
            echo '</div>';
        }
    } 
?>
