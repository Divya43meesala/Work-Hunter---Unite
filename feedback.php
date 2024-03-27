<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        .aa {
            height: 59px;
            background-color: #26453E;
        }

        img {
            width: 150px;
            margin-left: 20px;
            margin-top: 5px;
            height: 50px;
            cursor: pointer;
            /* Add this line to change cursor on hover */
        }

        .image-container {
            display: inline-block;
        }

        .a {
            width: 100vw;
            height: 100vh;
        }

        .container {
            position: relative;
            width: 400px;
            background: #111;
            padding: 20px 30px;
            border: 1px solid #444;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin: 170px 450px;
            visibility: hidden;
        }

        .container .post {
            display: none;
        }

        .container .text {
            font-size: 25px;
            color: #666;
            font-weight: 500;
        }

        .container .edit {
            position: absolute;
            right: 10px;
            top: 5px;
            font-size: 16px;
            color: #666;
            font-weight: 500;
            cursor: pointer;
        }

        .container .edit:hover {
            text-decoration: underline;
        }

        .container .star-widget input {
            display: none;
        }

        .star-widget label {
            font-size: 40px;
            color: #444;
            padding: 10px;
            float: right;
            transition: all 0.2s ease;
        }

        input:not(:checked)~label:hover,
        input:not(:checked)~label:hover~label {
            color: #fd4;
        }

        input:checked~label {
            color: #fd4;
        }

        input#rate-5:checked~label {
            color: #fe7;
            text-shadow: 0 0 20px #952;
        }



        .container form {
            display: none;
        }

        input:checked~form {
            display: block;
        }

        form header {
            width: 100%;
            font-size: 25px;
            color: #fe7;
            font-weight: 500;
            margin: 5px 0 20px 0;
            text-align: center;
            transition: all 0.2s ease;
        }

        form .textarea {
            height: 100px;
            width: 100%;
            overflow: hidden;
        }

        form .textarea textarea {
            height: 100%;
            width: 100%;
            outline: none;
            color: #eee;
            border: 1px solid #333;
            background: #222;
            padding: 10px;
            font-size: 17px;
            resize: none;
        }

        .textarea textarea:focus {
            border-color: #444;
        }

        form .btn {
            height: 45px;
            width: 100%;
            margin: 15px 0;
        }

        form .btn button {
            height: 100%;
            width: 100%;
            border: 1px solid #444;
            outline: none;
            background: #222;
            color: #999;
            font-size: 17px;
            font-weight: 500;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form .btn button:hover {
            background: #1b1b1b;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .button {
            padding: 15px;
            font-size: 20px;
            margin: 0 20px;
            border-radius: 25px;
            background-color: #26453E;
            color: #fff;
        }

        #workproviderButton {
            display: block;
        }

        .navbar {
            padding: 30px 0;
        }

        #workholderButton:hover {
            background-color: #007bff;
            /* Change the background color when hovering */
            color: #fff;
            /* Change the text color when hovering */
            border: 2px solid #f6ff00;
            box-shadow: 2px 2px #f6ff00;
            /* Change the border color when hovering */
        }

        #workproviderButton {
            position: relative;
            overflow: hidden;
        }

        #workproviderButton::before {
            content: "";
            position: absolute;
            top: 0;
            left: 100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #007bff, transparent);
            transition: left 0.3s ease-in-out;
        }

        #workproviderButton:hover::before {
            left: 0;
            border: 2px solid #f6ff00;
            box-shadow: 2px 2px #f6ff00;
        }

        .fa-facebook {
            font-size: 30px;
            margin-left: 80%;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <body>
        <div class="aa">
            <img class="ab" src="lm.png">

        </div>
        <div class="image-container">
            <img class="a" src="smiley.jpg">
            <div class="overlay">
                <div class="button-container">
                    <button class="button" id="workholderButton">workholder</button>
                    <button style="margin-left:450px;margin-bottom:20px;" class="button"
                        id="workproviderButton">workprovider</button>
                </div>
                <div class="container" id="workproviderContainer">
                    <div class="post">
                        <div class="text">Thanks for rating us!</div>
                        <div class="edit">EDIT</div>
                    </div>
                    <form class="star-widget" action="rt.php" method="post">
                        <input type="radio" name="rate" value="5" id="rate-5">
                        <label for="rate-5" class="fas fa-star"></label>
                        <input type="radio" name="rate" value="4"id="rate-4">
                        <label for="rate-4" class="fas fa-star"></label>
                        <input type="radio" name="rate"value="3" id="rate-3">
                        <label for="rate-3" class="fas fa-star"></label>
                        <input type="radio" name="rate"value="2" id="rate-2">
                        <label for="rate-2" class="fas fa-star"></label>
                        <input type="radio" name="rate" value="1"id="rate-1">
                        <label for="rate-1" class="fas fa-star"></label>
                        <input type="hidden" name="selectedRating" id="selectedRatingInput" value=""> <!-- Hidden input to store selected rating -->

                        <div class="textarea">
                            <textarea name="experience" cols="30" placeholder="Describe your experience.." required></textarea>
                        </div>
                        <div class="btn">
                            <button type="submit" id="PostButton">Post</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <script>
            document.querySelector("#workproviderButton").addEventListener("click", () => {
                // your existing code here
            });
            document.querySelector("#workholderButton").addEventListener("click", () => {
                // your existing code here
            });
        </script>
    </body>

    <script>


    
    
    const postButton = document.querySelector("#PostButton");
    const post = document.querySelector(".post");
    const starWidget = document.querySelector(".star-widget");
    const editBtn = document.querySelector(".edit");
    const Work = document.querySelector("#workproviderContainer");
    const but = document.querySelector("#workproviderButton");
    const pro = document.querySelector('#workholderButton');

    // Post button click event
    postButton.addEventListener("click", () => {
        starWidget.style.display = "none";
        post.style.display = "block";
        editBtn.onclick = () => {
            starWidget.style.display = "block";
            post.style.display = "none";
        };
        // No "return false" here to allow form submission
        // return false;
    });

    // Event listeners for workproviderButton and workholderButton
    but.addEventListener("click", () => {
        starWidget.style.display = "block";
        Work.style.visibility = "visible";
        but.style.display = "none";
        pro.style.display = "none";
        // No "return false" here to allow form submission
        // return false;
    });

    pro.addEventListener("click", () => {
        starWidget.style.display = "block";
        Work.style.visibility = "visible";
        but.style.display = "none";
        pro.style.display = "none";
        // No "return false" here to allow form submission
        // return false;
    });
</script>
<script>
   
    const form = document.querySelector(".star-widget");
    const selectedRatingInput = document.querySelector("#selectedRatingInput");

    form.addEventListener("submit", () => {
        const selectedRating = document.querySelector('input[name="rate"]:checked');
        if (selectedRating) {
            const ratingValue = selectedRating.value;
            selectedRatingInput.value = ratingValue; // Set the hidden input value to the selected rating
        }
    });
</script>
    

</body>

</html>