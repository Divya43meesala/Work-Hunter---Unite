<?php
    session_start();
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "lord";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    $recordId = $_SESSION['userid'];

    $query="select *from users where uid=$recordId  limit 1";
    $result=mysqli_query($conn,$query);
    if($result)
    {
        if($result && mysqli_num_rows($result)>0)
        {
            $us=mysqli_fetch_assoc($result);
        }
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded
    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];
        $recordId = $_SESSION['userid'];
        // Database connection setup (modify with your database credentials)
       

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare the query to insert the image into the database (modify your table and column names)
        $query = "UPDATE users SET profile_img = ? WHERE uid = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $imageData, $recordId);

        // Read the image file
        $imageData = file_get_contents($image["tmp_name"]);

        // Execute the query
        if ($stmt->execute()) {
           
        } else {
            echo "Error: " . $stmt->error;
        }

        
    } else {
        echo "No image file received.";
    }
}
?>


<html>
<head>
    <meta content="width=device-width ,initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body{
          background-color: rgb(2, 7, 34);
    }
    #uploadButton{
        width: 250px;
        margin-left: -50px;
    }
    .box{
         float:left;
        background-color: white;
         width:25%;
        height:70%;
        margin-left: 2%;
        margin-top:5%;
    }
    #div2{
        float:left;
        background-color: white;
        width:42%;
        height: 80%;
        margin-left:3%;
        margin-top:5%;
    }
    .bio-photo {
        border-radius: 50%;
        display:block;
        width:130px;
        height:130px;
        }
    .box span {
        display: block;
        width: 130px;
        height: 130px;
        border-radius: 100%;
        border: 20px solid white;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        line-height: 70px;
        background-color:white;
        z-index: 20;
        margin-left: -10%;
        }
        .box button{
            background-color: rgb(30, 23, 71);
            border-width:large;
            color: white;
            border:2px white;
            border-radius: 5px;
            width:50%;
            padding:10px;
        }
        #sub{
            background-color: rgb(240, 234, 234);
            width:80%;
            height:15%;
            margin-top: 5%;
            border:1px solid rgb(218, 199, 199);
            border-radius: 2px;;
        }
        #sub2{
            margin-left:5%;
            display: block;
            background-color:rgb(250, 249, 249) ;
        }
        ul li{
            list-style-type: none;
            display:inline-flex;
            width:30%;
            
        }
        ul li:hover{
            border-bottom: 4px solid blue;
            
        }
        #sub3{
            float:left;
        }
        #sub4{
            float: right;
            margin-right:10%;
            
        }
        #div2 button{
            background-color:rgb(30, 23, 71);
            border-width:large;
            color: white;
            border:2px white;
            border-radius: 5px;
            padding:10px;
            margin-top:10%;
            margin-left: 5%;
            padding-left: 30px;
            padding-right: 30px;
        }
      input{
        height:30px;
        margin-top:4%;
        margin-bottom:10%;
      }
      table,td{
        border:1px solid rgb(140, 146, 230);
        
        padding: 10px;
      }
      ul li a{
        text-decoration: none;
        color:black;
      }
      ul li a:hover{
        text-decoration: none;
        color:black;
      }
      #change{
        position:relative;
        
      }
     
    #second{
        display: none;
    }
    #profile{
        float:right;
        background-color: white;
        margin-top:5%;
        width:25%;
        height:70%;
        margin-right: 1%;
    }
    .edit-prof{
        display:none;
    }
</style>
</head>
<body>
    
<div class="box">
    <h1><center><?php echo $us['firstname']; ?></center></h1>
    <center><?php echo $us['type']; ?>
    <label class="bio-photo text-center">
        <img id="displayImage" src="get_image.php" class="bio-photo text-center">
        <form id="uploadForm"  method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="uploadImage" >
    <button type="submit" id="uploadButton" >Upload Profile Image</button>
</form>
    <a href="dash.php"><button style="width:200px;margin-left:-25px;">Back to Home</button></a>
    </center>
</div>


        
    <div id="div2" class="norm-prof" >
        <div id="sub2">
            <div>
                <h1 >Your Profile</h1> <br>
                <ul>
                <li style="font-size:30px;">User Info</li>
                <!-- <li>&nbsp;&nbsp;<a href="#" onclick="showDiv()">Selling Information</a></li> -->
            </ul>
            </div>
            <div id="change" >
                  <div id="sub3" >
                        <label style="font-size:30px; color:darkslategray;">First Name</label><br>
                        <div style="height:45px; width:110%;margin:auto; border:1px solid black;"><label style="font-size:25px; margin-left:10px; color:black;" ><?php echo $us['firstname'] ?></label></div><br>
                        
                        <label style="font-size:30px;color:darkslategray;">Email Address</label><br>
                        <div style="height:45px; width:110%; padding-left:10px;justify-content:center; border:1px solid black;"><label style=" margin-top:5px; margin-left:10px;font-size:15px; color:black;"><?php echo $us['email']?></label></div><br>
                         
                  </div>
                  <div id="sub4">
                  <label style="font-size:30px;color:darkslategray;">Last Name</label><br>
                  <div style="height:45px; width:110%; border:1px solid black;"><label style="font-size:25px; color:black; margin-left:10px; "><?php echo $us['lastname']?></label></div><br>
                      
                  <label style="font-size:30px;color:darkslategray;">Type Of User</label><br>
                  <div style="height:45px; width:110%; margin:auto;border:1px solid black;"><label style="font-size:25px; color:black; margin-left:10px;"><?php echo $us['type']?></label></div><br><br>
                       </div>
                    <button style="margin-left:35%;" onclick="showedit()">Edit-Profile</button>
            </div>
           
        </div>
    </div>



    <div id="div2" class="edit-prof">
        <div id="sub2">
            <div>
                <h1 >Edit Profile</h1> <br>
                <ul>
                <li>User Info</li>
                <!-- <li>&nbsp;&nbsp;<a href="#" onclick="showDiv()">Selling Information</a></li> -->
            </ul>
            </div>
            <div id="change" >
                <label style="color:red;">*NOTE: Kindly fill all the details without leaving.</label>
                <form action="update.php"  method="post" enctype="multipart/form-data">
                <div id="sub3" >
                        <label>First Name</label><br>
                        <input type="text" name="firstname" placeholder="<?php echo $us['firstname'] ?>"><br>
                        
                        <label>Email Address</label><br>
                        <input type="email" name="email" placeholder="<?php echo $us['email']?>"><br>
                         <button type="submit">Update Info</button>
                  </div>
                  <div id="sub4">
                      <label>Last Name</label><br>
                      <input type="text" name="lastname" placeholder="<?php echo $us['lastname']?>"><br>
                      
                      <label>Type Of User</label><br>
                      <input type="text" name="type" placeholder="<?php echo $us['type']?>"style="margin-bottom: 15%;"><br><br>
                       </div>
        </form>
            </div>
           
        </div>
    </div>
    <div id="profile">
        <center>
            <h1>Profile Activity</h1>
            <br/>
            <?php
            
              // Retrieve the user's posts
              $postQuery = "SELECT id, work_type, wage FROM work_provide  WHERE user_id = $recordId";
              $postResult = mysqli_query($conn, $postQuery);
              
              if ($postResult && mysqli_num_rows($postResult) > 0) {
                  while ($post = mysqli_fetch_assoc($postResult)) {
                      // Generate a div element for each post with a unique identifier (post ID)
                      echo '<div class="alert alert-success fade in" data-post-id="' . $post['id'] . '">';
                      echo '<a href="#" class="close" onclick="deletePost(' . $post['id'] . ')" >&times;</a>';
                      echo '<strong>' . $post['work_type'] . '</strong>';
                      echo '<p>' . $post['wage'] . '</p>';
                      echo '</div>';
                  }
                }
            ?>




        </center>
    </div>
    
    <script>

    document.getElementById("uploadImage").addEventListener("change", function() {
        const fileInput = this;
        const displayImage = document.getElementById("displayImage");
        const uploadButton = document.getElementById("uploadButton");

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                displayImage.src = e.target.result;
                uploadButton.style.display = "block"; // Show the upload button
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    document.getElementById("uploadButton").addEventListener("click", function() {
        // Implement the code to upload the selected image to your server here
        // You can use AJAX or a form submission to send the image data to the server
        // After successful upload, you can display a success message or update the user's profile with the new image.
        // For brevity, I'm omitting the server-side code here.
    });
</script>
<script>
function deletePost(postId) {
    if (confirm("Are you sure you want to delete this post?")) {
        // Send an AJAX request to delete the post using postId
        $.ajax({
            url: 'delete_post.php', // Create a separate PHP script to handle post deletion
            method: 'POST',
            data: { post_id: postId },
            success: function(response) {
                if (response === 'success') {
                    // Remove the post's div
                    $('[data-post-id="' + postId + '"]').remove();
                } else {
                    alert('Failed to delete the post.');
                }
            }
        });
    }
}
</script>
<script>
    function showedit(){
        document.querySelector('.edit-prof').style.display="block";
        document.querySelector('.norm-prof').style.display="none";
    }

    </script>
  </body>
  </html>