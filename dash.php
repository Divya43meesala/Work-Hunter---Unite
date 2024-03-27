<?php
    session_start();
    include("connection.php");
    include("posts.php");
    if(isset($_POST['pr-btn']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $num=$_POST['number'];
        
        $work=$_POST['work'];
        $time=$_POST['time'];
        $skills=$_POST['skills'];
        $loc=$_POST['location'];
        $wage=$_POST['wage'];
        $info=$_POST['info'];
        $userid=$_SESSION['userid'];
        $sql="insert into work_provide(user_id,name,email,phno,work_type,date_time,experience,location,wage,comment) values('$userid','$name','$email','$num','$work','$time','$skills','$loc','$wage','$info')";
        mysqli_query($con,$sql);
        echo"<script>alert('successfully registered');</script>";
    }

    if(isset($_POST['sk-btn']))
    {  
        $name=$_POST['name'];
        $age=$_POST['age'];
        $work=$_POST['work'];
        $num=$_POST['contact'];
        $loc=$_POST['location'];
        $wage=$_POST['wage'];
        $userid=$_SESSION['userid'];
        $sql="insert into work_seek(user_id,name,age,work_type,contact,location,wage) values('$userid','$name','$age','$work','$num','$loc','$wage')";
        mysqli_query($con,$sql);
        echo"<script>alert('successfully registered');</script>";
    }


    $labels = [];
    $values = [];
    
    // Replace with your database query and data retrieval logic
    // For example:
     $result = mysqli_query($con, "SELECT experience, wage FROM work_provide");
     while ($ro = mysqli_fetch_assoc($result)) {
         $labels[] = $ro['experience'];
         $values[] = $ro['wage'];
     }
    

    
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="dd.css">
    <script src="https://kit.fontawesome.com/cae14f18b4.js" crossorigin="anonymous"></script>
    <style>
        .container{
            display: none;

        }
        .nav-item{
            cursor: pointer;
        }
    </style>


</head>

<body>
    <header class="navbar sticky-top  flex-md-nowrap p-0 shadow" data-bs-theme="dark"
        style="background-color:  #008080">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 p-3 fs-6 text-black fw-bold" >Work-Hunter-Unite</a>
            <label style="font-weight:bold; font-size:25px; text-transform:capitalize;">
                
            <?php 
            
            $con = mysqli_connect("localhost", "root", "", "lord");


            $userid=$_SESSION['userid'];

            $sql = "SELECT * FROM users where uid=$userid";
            $resul = $con->query($sql);
            $re = $resul->fetch_assoc();
            echo"Hello ".$re['firstname'];


            ?>
            <label>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
            </li>
        </ul>
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary shadow">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
                    aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title fw-semibold" id="sidebarMenuLabel">HOME</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item"  onclick="mainmenu()" >
                                <a class="nav-link d-flex align-items-center fw-semibold gap-2" aria-current="page"
                                >
                                    <i class="bi bi-house-fill"></i>
                                    Home
                                </a>
                            </li>
                            <li class="nav-item"  onclick="getwork()">
                                <a class="nav-link d-flex align-items-center fw-semibold gap-2" aria-current="page">
                                    <i class="bi bi-people"></i>
                                    Work-Provide
                                </a>
                            </li>
                            <li class="nav-item" onclick="getworker()">
                                <a class="nav-link d-flex align-items-center fw-semibold gap-2" aria-current="page"
                                    >
                                    <i class="fa-solid fa-calendar-week"></i>
                                    Work-Seek
                                </a>
                            </li>
                            <li class="nav-item" >
                                <a class="nav-link d-flex align-items-center fw-semibold gap-2" aria-current="page"
                                    href="serch.php">
                                    <i class="bi bi-graph-up"></i>
                                    Search
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center fw-semibold gap-2" aria-current="page"
                                    href="se.php">
                                    <i class="fa-regular fa-address-card"></i>
                                    Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center fw-semibold gap-2" aria-current="page"
                                    href="feedback.php">
                                    <i class="fa-solid fa-comments"></i>
                                    Feedback
                                </a>
                            </li>
                        </ul>
                        <hr class="my-3">
                        <ul class="nav flex-column mb-auto">
                            
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center gap-2"  id="logout-button" href="#">
                                    <i class="bi bi-door-closed"></i>
                                    logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4" id="home-main" >
                <div
                    class="d-flex justify-content-between flex-wrapflex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">DASHBOARD</h1>
                    <div class="btn-toolbar mb-2 mb-md-0 mx-2">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card card1 mb-3 shadow"  >
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">WORK-PROVIDERS</h5>
                                    <i class="bi bi-file-earmark"></i>
                                </div>




                                <p class="card-text">
                                    <span class="fw-bold "style="font-size:20px;">


                                        <?php
                                            $con = mysqli_connect("localhost", "root", "", "lord");




                                            $sql = "SELECT COUNT(*) AS record_count FROM work_provide";
                                            $result = $con->query($sql);
                                    
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $recordCount = $row["record_count"];
                                                echo "Number of Works-Available: " . $recordCount;
                                            } else {
                                                echo "No records found.";
                                            }
                                    
                                            // Close the database connection
                                            $con->close();
                                        ?>



                                    </span>
                                    
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card card2 mb-3 shadow">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="card-title">WORKERS</h5>
                                    <i class="bi bi-people"></i>
                                </div>
                                <p class="card-text">
                                    <span class="fw-bold " style="font-size:20px;">
                                        
                                    
                                            
                                        <?php
                                            $con = mysqli_connect("localhost", "root", "", "lord");




                                            $sql = "SELECT COUNT(*) AS record_count FROM work_seek";
                                            $result = $con->query($sql);
                                    
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                $recordCount = $row["record_count"];
                                                echo "Number of Workers-Available: " . $recordCount;
                                            } else {
                                                echo "No records found.";
                                            }
                                    
                                            // Close the database connection
                                            $con->close();
                                        ?>

                                
                                </span>
                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <canvas class="my-3 p-2 p-md-3 p-lg-5 w-100 shadow" id="chart1" width="900" height="380">

                   

                </canvas>
                <div class="mt-3"></div>
                <div class="row">
                   
                </div>
            </main>


            <div class="container" id="work-provide" >
                <div class="buttons-container">
                        <button class="button" id="button1" onclick="showform1()">WORK-REGISTRATION</button>&nbsp;&nbsp;
                        <button class="button" id="button2" onclick="showtable1()">AVAILABLE WORKERS</button>
                </div>
        
                <div class="form-container" id="for1">
                <form id="myForm" method="post">
                    <input type="text" id="fname" placeholder="Firstname" class="form-input" name="name" required
                        oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                    <span id="fnameWarning" class="warning"></span>
                    <input type="text" id="email" placeholder="Email address" class="form-input" name="email"
                        required />
                    <span id="emailWarning" class="warning"></span>
                    <input class="form-input" type="text" name="number" id="contact"
                        placeholder="Enter your contact NO:" oninput="handlePhoneNumberInputSeek(this);">
                    <span id="phoneWarning" class="warning"></span>
                    <input class="form-input" type="text" name="work" placeholder="Preferred Type of Work">
                    <input class="form-input" type="text" name="time" id="datetime"
                        placeholder="Availability (Date and Time)" oninput="validateDateTime(this.value);">
                    <span id="dateTimeWarning" class="warning"></span>

                    <input class="form-input" type="text" name="skills" placeholder="Relevant Skills or Experience">
                    <input class="form-input" type="text" name="location" placeholder="Preffered Job Location">
                    <input class="form-input" type="text" name="wage" id="salary" placeholder="Daily Wage Expectations"
                        oninput="validateSalary(this.value);">
                    <span id="salaryWarning" class="warning"></span>
                        <input class="form-input" type="text" name="info" placeholder="Additional Information or Comments">
                        <button type="submit" class="button" name="pr-btn">Submit</button>
                    </form>
                </div>
        
                <div class="display-container" id="dis1">



                <?php
                            $pfun=new Post();
                            $posts=$pfun->get_posts1();

                                if($posts)
                                {
                                    foreach ($posts as $row) {
                                        // code...

                                       
                                        include("item.php");
                                    }
                                }

                        ?>

                      



                    
                </div>
            </div>
        
            
            
            <div class="container" id="work-seek">
                <div class="buttons-container">
                        <button class="button" id="button1" onclick="showform()">WORKER-REGISTRATION</button>&nbsp;&nbsp;
                        <button class="button" id="button2" onclick="showtable()">AVAILABLE WORKS</button>
                </div>
        
                <div class="form-container" id="for" >
                <form id="myForm" method="post">
                    <input type="text" id="lname" placeholder="Firstname" class="form-input" name="name" required
                            oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
                        <span id="lnameWarning" class="warning"></span>
                        <input class="form-input" type="text" name="age" id="age" placeholder="Enter Age"
                            oninput="validateAge(this.value);">
                        <span id="ageWarning" class="warning"></span>
                        <input class="form-input" type="text" name="work" placeholder="Type of Work">
                        <input class="form-input" type="text" name="contact" id="Contact"
                            placeholder="Enter your contact NO:" oninput="handlePhoneNumberInputSeek(this);">
                        <span id="PhoneWarning" class="warning"></span>

                        <input class="form-input" type="text" name="location" placeholder="Location">
                        <input class="form-input" type="text" name="wage" placeholder="Minimum salary">
                        
                        
                        <button type="submit" class="button" name="sk-btn" >Submit</button>
                    </form>

                </div>
                <script>
                        document.getElementById('lname').addEventListener('input', function () {
                            var fname = this.value;
                            var fnameWarning = document.getElementById("lnameWarning");
                            var namePattern = /^[A-Za-z]+$/; // Pattern to check if the name contains only characters

                            // Clear existing warning
                            fnameWarning.textContent = "";

                            // Check if the name contains a number
                            if (!namePattern.test(fname)) {
                                fnameWarning.textContent = "First name must contain only characters.";
                            }
                        });
                        function handlePhoneNumberInputSeek(input) {
                            var phoneWarning = document.getElementById("PhoneWarning");

                            // Clear existing warning
                            phoneWarning.textContent = "";

                            // Validate phone number
                            var phoneNumber = input.value;
                            if (!phoneNumber.trim()) {
                                phoneWarning.textContent = 'Phone number is required.';
                            } else if (!/^\d{10}$/.test(phoneNumber)) {
                                phoneWarning.textContent = 'Phone number should be exactly 10 digits.';
                            }
                        }
                        // Validate age
                        function validateAge(age) {
                            var ageWarning = document.getElementById("ageWarning");

                            // Clear existing warning
                            ageWarning.textContent = "";

                            // Validate age
                            if (!age.trim()) {
                                ageWarning.textContent = 'Age is required.';
                            } else if (!/^\d{2}$/.test(age)) {
                                ageWarning.textContent = 'Age should be exactly 2 digits.';
                            }
                        }

                        // Function to handle input in the age box
                        document.getElementById('age').addEventListener('input', function () {
                            validateAge(this.value);
                        });
                    </script>
                <div class="display-container" id="dis">
                    



                <?php
                            $pfun=new Post();
                            $posts=$pfun->get_posts();

                                if($posts)
                                {
                                    foreach ($posts as $ROW) {
                                        // code...

                                       
                                        include("item2.php");
                                    }
                                }

                        ?>
               
                

                </div>
            </div>
        
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    
   

    
    <script>
        var input1=document.getElementById('home-main');
        var input2=document.getElementById('work-provide');
        var input3=document.getElementById('work-seek');
        function mainmenu(){
           input1.style.display="block";
           input2.style.display="none";
           input3.style.display="none";
        }
        function getwork(){
           input2.style.display="block";
           input1.style.display="none";
           input3.style.display="none";
        }
        function getworker(){
           input3.style.display="block";
           input2.style.display="none";
           input1.style.display="none";
        }
   
    var i1=document.getElementById('for');
    var i2=document.getElementById('dis');
    function showtable(){  
        i2.style.display="block";
        i1.style.display="none";
    }
    function showform(){
        i1.style.display="block";
        i2.style.display="none";
    }
 
    var i3=document.getElementById('for1');
    var i4=document.getElementById('dis1');
    function showtable1(){  
        i4.style.display="block";
        i3.style.display="none";
    }
    function showform1(){
        i3.style.display="block";
        i4.style.display="none";
    }
  
  document.getElementById('logout-button').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    // Redirect the user to the login page
    window.location.href = 'HOME.html'; // Replace 'login.html' with your actual login page URL
  });

        var labels = <?php echo json_encode($labels); ?>;
        var values = <?php echo json_encode($values); ?>;

        var ctx = document.getElementById("chart1").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "line", // Change chart type to "line"
            data: {
                labels: labels,
                datasets: [{
                    label: "Chart Data",
                    data: values,
                    fill: false, // To make it a line chart without fill
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
<script>
        document.getElementById('contact').addEventListener('input', function () {
            var phoneNumber = this.value;
            var phoneWarning = document.getElementById("phoneWarning");

            // Clear existing warning
            phoneWarning.textContent = "";

            // Validate phone number
            if (!phoneNumber.trim()) {
                phoneWarning.textContent = 'Phone number is required.';
            } else if (!/^\d{10}$/.test(phoneNumber)) {
                phoneWarning.textContent = 'Phone number should be exactly 10 digits.';
            }
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
        function validateDateTime(dateTime) {
            var dateTimeWarning = document.getElementById("dateTimeWarning");

            // Clear existing warning
            dateTimeWarning.textContent = "";

            // Validate date and time
            if (!dateTime.trim()) {
                dateTimeWarning.textContent = 'Date and time are required.';
            } else {
                // Check if the format matches (you may need to adjust this based on your expected format)
                var dateTimeRegex = /^\d{4}-\d{2}-\d{2} \d{2}:\d{2}$/;
                if (!dateTimeRegex.test(dateTime)) {
                    dateTimeWarning.textContent = 'Enter a valid date and time (YYYY-MM-DD HH:mm).';
                }
            }
        }

        // Function to handle input in the date and time box
        document.getElementById('datetime').addEventListener('input', function () {
            validateDateTime(this.value);
        });
        function validateSalary(salary) {
            var salaryWarning = document.getElementById("salaryWarning");

            // Clear existing warning
            salaryWarning.textContent = "";

            // Validate salary
            if (!salary.trim()) {
                salaryWarning.textContent = 'Salary is required.';
            } else {
                // Check if the value is a valid number
                var numericRegex = /^\d+$/;
                if (!numericRegex.test(salary)) {
                    salaryWarning.textContent = 'Enter a valid salary amount.';
                }
            }
        }

        // Function to handle input in the salary box
        document.getElementById('salary').addEventListener('input', function () {
            validateSalary(this.value);
        });
    </script>
    
</body>

</html>