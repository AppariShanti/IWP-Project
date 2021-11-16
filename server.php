
<?php
    $username="";
    $email="";
    $errors=array();
    $db=mysqli_connect('localhost','root','','registration');
    $user_id="";
    $id="";
    $client="";
    session_start();

    if(isset($_POST['register']))
    {
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $password=mysqli_real_escape_string($db,$_POST['password']);
        $cnf_password=mysqli_real_escape_string($db,$_POST['cnf-password']);

        if(empty($username))
        {
            array_push($errors,"Username is required");        
        }
        if(empty($email))
        {
            array_push($errors,"Email Id is required");        
        }
        if(empty($password))
        {
            array_push($errors,"Password is required");        
        }
        if($password!=$cnf_password)
        {
            array_push($errors,"Passwords didn't match");
        }


        if(count($errors)==0)
        {
            //$password=md5($password);  //encript the password
            $sql="INSERT INTO users (username, email, password) VALUES ('$username','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['username']=$username;
            $_SESSION['success']="You are now Logged In!";
            $_SESSION['user_id']=$row['id'];
            header('location: calendar.php');
        }
    }

    //login
    if(isset($_POST['login']))
    {
        $username=mysqli_real_escape_string($db,$_POST['username']);
        $password_l=mysqli_real_escape_string($db,$_POST['password_l']);

        if(empty($username))
        {
            array_push($errors,"Username is required");        
        }
        if(empty($password_l))
        {
            array_push($errors,"Password is required");        
        }
        if(count($errors)===0)
        {
           // $password_l=md5($password_l);
            $query="SELECT * FROM users WHERE username='$username' AND password='$password_l'";
            $result=mysqli_query($db,$query);
            if(mysqli_num_rows($result))
            {
                $row = $result->fetch_assoc();
                
                $_SESSION['username']=$username;
                $_SESSION['success']="You are now Logged In!";
                $_SESSION['user_id']=$row['id'];
                header('location: calendar.php');
            }
            if(mysqli_num_rows($result)==0)
            {
                array_push($errors,"Username/Password is incorrect");
                header('location: index.php');
            }
        }
    }

    //logout
    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['username']);
        header('location: index.php');
    }

    $user_id=$_SESSION['user_id'];

    //add event
    
       if(isset($_POST['save']))
       {
                $event_title=mysqli_real_escape_string($db,$_POST['event_title']);
            $event_start=mysqli_real_escape_string($db,$_POST['event_start']);
            $event_end=mysqli_real_escape_string($db,$_POST['event_end']);
            $event_text=mysqli_real_escape_string($db,$_POST['event_text']);
            $color=mysqli_real_escape_string($db,$_POST['color']);
            $user_id=$_SESSION['user_id'];

            if(empty($event_title))
            {
                array_push($errors,"Event Title is required");        
            }
            if(empty($event_start))
            {
                array_push($errors,"Event Start is required");        
            }
            if(empty($event_end))
            {
                array_push($errors,"Event end is required");        
            }
            if(empty($event_text))
            {
                array_push($errors,"Event Text didn't match");
            }

            if(count($errors)==0)
            {
                //$password=md5($password);  //encript the password
                $sql="INSERT INTO events (user_id, event_start, event_end, event_title, event_text, color) VALUES ('$user_id','$event_start','$event_end','$event_title','$event_text','$color')";
                mysqli_query($db,$sql);
                header('location: calendar.php');
            
            }
        }

    // fetch the events
    $get_events="SELECT * FROM events WHERE user_id='$user_id' ORDER BY event_start ";
    $result_events=mysqli_query($db,$get_events);
    $data = array(); // create a variable to hold the information
    while (($row = mysqli_fetch_row($result_events)) != null)
    {
            $data[]=$row; // add the row in to the results (data) array
        
    }

    //edit event
    if(isset($_POST['edit-event-save']))
    { 
        $event_title=mysqli_real_escape_string($db,$_POST['event_title']);
        $event_start=mysqli_real_escape_string($db,$_POST['event_start']);
        $event_end=mysqli_real_escape_string($db,$_POST['event_end']);
        $event_text=mysqli_real_escape_string($db,$_POST['event_text']);
        $color=mysqli_real_escape_string($db,$_POST['color']);
        $my_id=mysqli_real_escape_string($db,$_POST['id']);
        $user_id=$_SESSION['user_id'];
            //$password=md5($password);  //encript the password
        
            $sql="UPDATE events SET event_title = '{$event_title}', event_start = '{$event_start}', event_end = '{$event_end}',event_text = '{$event_text}',color = '{$color}' WHERE id = '$my_id' ";
            mysqli_query($db,$sql);
            header('location: calendar.php');       
        
    }

    if(isset($_POST['delete']))
    { 
        $my_id=mysqli_real_escape_string($db,$_POST['id']);
        $user_id=$_SESSION['user_id'];
            //$password=md5($password);  //encript the password
        
            $sql="DELETE FROM events WHERE id = '$my_id' ";
            mysqli_query($db,$sql);
            header('location: calendar.php');       
        
    }

    if(isset($_POST['event-cancel']))
    { 
            header('location: calendar.php');       
        
    }
   
?>