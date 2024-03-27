<?php
    session_start();
    include('connection.php');
    function create_userid()
  		{
  			$length=rand(4,19);
  			$number="";
  			for($i=0;$i<$length;$i++)
  			{
  				$new_rand=rand(0,9);
  				$number=$number.$new_rand;
  			}
  			return $number;
  		}
    if(isset($_POST['l-btn']))
    {
        $email=$_POST['email'];
		    $password=$_POST['password'];
 	
		if(!empty($email) && !empty($password))
		{
			//save to database.

			$query="select *from users where email= '$email' limit 1";
			$result=mysqli_query($con,$query);
			if($result)
			{
				if($result && mysqli_num_rows($result)>0)
				{
					$user_data=mysqli_fetch_assoc($result);
					if($user_data['password']=== $password)
					{
						$_SESSION['userid']=$user_data['uid'];
						header("Location:dash.php");
						die;
					}
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
    if(isset($_POST['s-btn']))
    {
      $type=$_POST['type'];
        $firstname=$_POST['fname'];
        $lastname=$_POST['lname'];
        $email=$_POST['email'];
		$password_1 =  $_POST['password_1'];
  		$password_2 =  $_POST['password_2'];
  		//create by the php
  		
  		$userid=create_userid();
        
		 if($password_1 != $password_2) {
			echo "<script>alert('password does not match');</script>";
 		 }
         else{
 	//encrypt the password before saving in the database
 		//echo $email;
 		//echo $password;
			
				if(!empty($email) && !empty($password_1))
				{
					//save to database
					$sql="insert into users(uid,firstname,lastname,email,password,type) values('$userid','$firstname','$lastname','$email','$password_1','$type')";
					mysqli_query($con,$sql);
					header("Location:final.php");
					die;
				}else
				{
					echo "please enter some valid information.";
				}
            }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
  <title>Final page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
          
          .container{
            
            background-color: rgb(209, 235, 235);
            margin: 5% auto;
            padding: 20px;
            border-radius: 40px;
            width: 65%;
            height: 80%;

        
        }
        table {
            margin: 5% auto;
            padding: 20px;
            width: 100%;
        }
        .image-container {
            display: inline-block;
            margin: 10px;
        }
        .image-container img {
            border: 2px solid #ccc;
            cursor: pointer;
            border-radius: 10px;
            box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.2);
        }
        .selected {
            border-color: rgb(3, 91, 91) !important;
        }

        * {
            margin: 0;
             padding: 0;
            box-sizing: border-box;
            font-family: "Poppins",
            sans-serif;
        }
        body {
                  min-height: 100vh;
                 display: flex;
                align-items: center;
                justify-content: center;
                background: #f0faff;
            }
        .wrapper {
                   position: relative;
                    max-width: 450px;
                    max-height: 650px;
                    width: 100%;
                    border-radius: 12px;
                    padding: 20px
                    30px
                    120px;
                    background: rgb(3, 201, 201);
                    box-shadow: 0
                    5px
                    10px
                #0000001a;
                overflow: hidden;
                }
        .form.login {
  position: absolute;
  left: 50%;
  bottom: -86%;
  transform: translateX(
    -50%
  );
  width: calc(
    100% +
      220px
  );
  padding: 20px
    140px;
  border-radius: 50%;
  height: 100%;
  background: #fff;
  transition: all
    0.6s
    ease;
            }
.wrapper.active
  .form.login {
  bottom: -15%;
  border-radius: 35%;
  box-shadow: 0 -5px
    10px rgba(0, 0, 0, 0.1);
}
.form
  header {
  font-size: 30px;
  text-align: center;
  color: #fff;
  font-weight: 600;
  cursor: pointer;
}
.form.login
  header {
  color: #333;
  opacity: 0.6;
}
.wrapper.active
  .form.login
  header {
  opacity: 1;
}
.wrapper.active
  .signup
  header {
  opacity: 0.6;
}
.wrapper
  form {
  display: flex;
  flex-direction: column;
  gap: 20px;
  margin-top: 40px;
}
form
  input {
  height: 40px;
  outline: none;
  border: none;
  padding: 0
    15px;
  font-size: 16px;
  font-weight: 400;
  color: #333;
  border-radius: 8px;
  background: #fff;
}
.form.login
  input {
  border: 1px
    solid
    #aaa;
}
.form.login
  input:focus {
  box-shadow: 0
    1px 0
    #ddd;
}
form
  .checkbox {
  display: flex;
  align-items: center;
  gap: 10px;
}
.checkbox
  input[type="checkbox"] {
  height: 16px;
  width: 16px;
  accent-color: #fff;
  cursor: pointer;
}
form
  .checkbox
  label {
  cursor: pointer;
  color: #fff;
}
form a {
  color: #333;
  text-decoration: none;
}
form
  a:hover {
  text-decoration: underline;
}
form
  input[type="submit"] {
  margin-top: 15px;
  padding: none;
  font-size: 18px;
  font-weight: 500;
  cursor: pointer;
}
.form.login
  input[type="submit"] {
  background: #00bcdd;
  color: #fff;
  border: none;
}

#col {
    font-size: 200%;
    color: rgb(16, 183, 183);
    font-family: Arial, Helvetica, sans-serif;
}
#main{
  display: none;
}




        </style>
</head>
<body>
    <div class="container">
        <div class="d-flex">
        <table align="center">
            <thead align="center"><td colspan="2" id="col"><b><b> YOU ARE HERE AS A ______ ?</b></b><br><br></td></thead>
            <tr align="center" style="color: rgb(3, 100, 100);"><td><b>WORKER</b></td><td><b>WORK PROVIDER</b></td></tr>
            <tr align="center"><td><div class="image-container">
                <img id="image1" src="./pen.jpg" height="140" width="140" alt="Image 1" onclick="(function() { selectImage('image1'); changeVal1(); })();">
            </div>
            </td>
            <td>
            <div class="image-container">
                <img id="image2" src="./table.jpg" height="140" width="140" alt="Image 2" onclick="(function() { selectImage('image2'); changeVal2(); })();">
            </div></td></tr>

            <tr><td align="center" colspan="2"><br><br> <section id="main"class="wrapper">
                <div class="form signup" id="signup-div">
                  <header>Signup</header>
                  <form method="post">
                  <input type="text" id="fname" placeholder="Firstname" name="fname" required
                                        oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                                    <span id="fnameWarning" class="warning"></span>
                                    <!-- Warning message for first name -->

                                    <input type="text" id="lname" placeholder="Last name" name="lname" required
                                        oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');" />
                                    <span id="lnameWarning" class="warning"></span>
                                    <!-- Warning message for last name -->

                                    <input type="text" id="email" placeholder="Email address" name="email" required />
                                    <span id="emailWarning" class="warning"></span> <!-- Warning message for email -->

                                    <input type="password" id="password_1" placeholder="Password" name="password_1"
                                        required />
                                    <span id="passwordWarning" class="warning"></span>
                                    <!-- Warning message for password -->

                                    <input type="password" id="password_2" placeholder="Confirm Password"
                                        name="password_2" required />
                                        <input type='hidden' name='type' id='ty' value=''>

                    <div class="checkbox">
                      <input type="checkbox" id="signupCheck" />
                      <label for="signupCheck">I accept all terms & conditions</label>
                    </div>
                    <button type="submit" onclick="validation()" value="Signup" name="s-btn"
                                        style="border-radius:28px; height:50px;width:80px;margin-left:150px;margin-top:-10px;">Submit</button>

                  </form>
                </div>
                <div class="form login">
                  <header>Login</header>
                  <form method="post">
                    <input type="text" placeholder="Email address" id="email1" name="email"required />
                    <input type="password" placeholder="Password" id="password1" name="password" required />
                    <a href="WH/forgo.php">Forgot password?</a>
                    <input type='hidden' name='type'id='ty' value=''>
                    <button type="submit" onclick="validation2() " value="Login" name="l-btn" >Login</button>
                  </form>
                </div>
               
                </section></td>
              </tr>
        </table>
        <script>
   

function validation2() {
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    var email = document.getElementById("email1");
    var pass = document.getElementById("password1");

    if (email.value === "" && pass.value === "") {
        alert("Must fill all the inputs to Login");
        return false;
    }

    if (!email.value.match(emailPattern)) {
        alert("Invalid email address format. Please enter a valid email address (e.g., abc@gmail.com).");
        return false;
    }

    if (pass.value.length < 5 || !/[!@#$%^&*(),.?":{}|<>]/.test(pass.value)) {
        alert("Password must be at least 5 characters long and contain at least one special character (!@#$%^&*(),.?\":{}|<>).");
        return false;
    }

    // If all conditions pass, the form will be submitted
}
           
             

            function selectImage(imageId) {
              document.getElementById('main').style.display="block";
              document.getElementById('signup-div').focus();
                var images = document.querySelectorAll('.image-container img');
                images.forEach(function(image) {
                    image.classList.remove('selected');
                });
    
                var selectedImage = document.getElementById(imageId);
    
                
                selectedImage.classList.add('selected');
            }
            const wrapper = document.querySelector(".wrapper"),
                    signupHeader = document.querySelector(".signup header"),
                    loginHeader = document.querySelector(".login header");
                  loginHeader.addEventListener("click", () => {
                    wrapper.classList.add("active");
    
                  });
                  signupHeader.addEventListener("click", () => {
                    wrapper.classList.remove("active");
                    
                  });
                  document.getElementById('fname').addEventListener('input', function () {
                    var fname = this.value;
                    var fnameWarning = document.getElementById("fnameWarning");
                    var namePattern = /^[A-Za-z]+$/; // Pattern to check if the name contains only characters

                    // Clear existing warning
                    fnameWarning.textContent = "";

                    // Check if the name contains a number
                    if (!namePattern.test(fname)) {
                        fnameWarning.textContent = "First name must contain only characters.";
                    }
                });

                document.getElementById('lname').addEventListener('input', function () {
                    var lname = this.value;
                    var lnameWarning = document.getElementById("lnameWarning");
                    var namePattern = /^[A-Za-z]+$/; // Pattern to check if the name contains only characters

                    // Clear existing warning
                    lnameWarning.textContent = "";

                    // Check if the name contains a number
                    if (!namePattern.test(lname)) {
                        lnameWarning.textContent = "Last name must contain only characters.";
                    }
                });

                document.getElementById('email').addEventListener('input', function () {
                    var email = this.value;
                    var emailWarning = document.getElementById("emailWarning");
                    var emailPattern = /^\S+@\S+\.\S+$/; // Pattern to check if the email is in a valid format

                    // Clear existing warning
                    emailWarning.textContent = "";

                    // Check if the email is in a valid format
                    if (!emailPattern.test(email)) {
                        emailWarning.textContent = "Enter a valid email address.";
                    }
                });

                document.getElementById('password_1').addEventListener('input', function () {
                    var password_1 = this.value;
                    var passwordWarning = document.getElementById("passwordWarning");

                    // Clear existing warning
                    passwordWarning.textContent = "";

                    // Check if the password meets certain criteria (e.g., minimum length)
                    if (password_1.length < 8) {
                        passwordWarning.textContent = "Password must be at least 8 characters long.";
                    }
                });

                function validation2() {
                    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    var email = document.getElementById("email1");
                    var pass = document.getElementById("password1");

                    if (email.value === "" && pass.value === "") {
                        alert("Must fill all the inputs to Login");
                        return false;
                    }

                    if (!email.value.match(emailPattern)) {
                        alert("Invalid email address format. Please enter a valid email address (e.g., abc@gmail.com).");
                        return false;
                    }

                    if (pass.value.length < 5 || !/[!@#$%^&*(),.?":{}|<>]/.test(pass.value)) {
                        alert("Password must be at least 5 characters long and contain at least one special character (!@#$%^&*(),.?\":{}|<>).");
                        return false;
                    }

                    // If all conditions pass, the form will be submitted
                }



                  
            function changeVal1(){
              document.getElementById('ty').value="worker";
        }
        function changeVal2(){
              document.getElementById('ty').value="workprovider";
        }
          </script>
        </div>
    </div>
</body>
</html>