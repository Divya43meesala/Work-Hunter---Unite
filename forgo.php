<?php
	session_start();
	include("connection.php");

	if($_SERVER['REQUEST_METHOD']== "POST")
	{
		//Something was posted
		$email=$_POST['email'];
		$password_1 =  $_POST['password_1'];
  		$password_2 =  $_POST['password_2'];
        if($password_1 != $password_2) {
			echo "The two passwords do not match";
 		 }
         else{
            if(!empty($email) && !empty($password_1) && !empty($password_2))
            {
                //save to database.

                $query="select *from users where email= '$email' limit 1";
                $result=mysqli_query($con,$query);
                if($result)
                {
                    if($result && mysqli_num_rows($result)>0)
                    {
                        $user_data=mysqli_fetch_assoc($result);
                        if($user_data['email']=== $email)
                        {
                            $sql="update users set password='$password_1' where email='$email'";
                            mysqli_query($con,$sql);
                            header("Location:final.php");
                            die;
                        }
                    }
                    else
                    {
                        echo "please enter valid email.";
                    }
                }
                else
                {
                    echo "Wrong email or password.";
                }

            }
            else
            {
                echo "Wrong email or password.";
            }
        }   
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding:100px;
        }

        .popup {
           
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 130px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius:2px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
	input{
	padding:20px;
	height:5px;
	width:300px;
	border-bottom:2px solid black;
	
	
	}
        .overlay {
            
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
        input:hover{
        border:2px solid blue;
        }

        .popup label,
        .popup input,
        .popup button {
            display: block;
            margin-bottom: 10px;
        }
        h2{
        color:darkblue;
      
        }
        .submit{
        background-color:darkblue;
        color:white;
        width:350px;
        padding:10px;
        text-align:center;}
    </style>
</head>

<body>

   
    <br>

    <div class="overlay" id="overlay"></div>

    <div class="popup" id="popup">
      <!-- <button onclick="closePopup()" style="float:right">X</button> -->
        <h2>Forget Your Password</h2>
        <p>Please Enter the email address you'd like to your reset  password </p>
        <form method="post">
            <label for="email"><b>Enter Email Address:</b></label>
            <input type="email" id="email" name="email" required>
             <label for="email"><b>Reset Password</b></label>
            <input type="password" id="email" name="password_1" required>
             <label for="email"><b>Confirm Password:</b></label>
            <input type="password" id="email"name="password_2" required>
            <button type="submit" class="submit" onclick="submitForm()">Request Reset Password</button><br><br>
            
        </form>
      
    </div>


</body>

</html>

