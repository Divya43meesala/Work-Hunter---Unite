<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <style>
        /* Styles for the search form and job result boxes (same as your provided code) */
        /* ... Your CSS styles ... */

     /* Styles for the search form */
     body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            width:100vw;
            overflow-x: hidden;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            text-align: center;
            padding: 40px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

       /* Styles for the search form */
.search-form {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

input[type="text"],
select {
    width: calc(65% - 65px); /* 25% width for each input box with more margin */
    padding: 10px;
   
    margin-right: 20px; /* Increase the margin-right for more space between input boxes */
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button {
    width: 25%;
    background-color: #4caf50;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    box-sizing: border-box;
}

        button:hover {
            background-color: #45a049;
        }

        /* Styles for job result boxes */
        .job-box {
        background-color: #ffffff;
        padding: 20px;
        margin-bottom: 20px;
        border-radius: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
    }.job-description {
        flex: 1;
    }
    .status-button {
    height: 200%; /* Same height as the parent job box */
    width: 150px; /* Fixed width */
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    padding:30px;
    border-radius: 5px;
}






    .job-box img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 20px;
    }
    </style>
    </style>
</head>
<body>
    <div class="container">
        <h1>Job Search</h1>
        <div class="search-form">
            <input type="text" id="keyword" placeholder="Keyword">
            <!-- <input type="text" id="location" placeholder="Location"> -->
            <?php 
            
            $connection = mysqli_connect("localhost", "root", "", "lord");

            // Check if the connection was successful
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            // Perform the query to select distinct locations
            $query = "SELECT DISTINCT location FROM work_provide"; // Using DISTINCT
            $result = mysqli_query($connection, $query);
            
            // Check if the query executed successfully
            if ($result) {
                // Start building the dropdown
                echo '<select name="location" id="location">';
                echo '<option value="">Select a location</option>'; // Placeholder option
            
                // Fetch and display data as dropdown options
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['location'] . '">' . $row['location'] . '</option>';
                }
            
                echo '</select>'; // Close the dropdown
                mysqli_free_result($result); // Free the result set
            } else {
                echo "Query execution failed: " . mysqli_error($connection);
            }
            
            ?>
            <button onclick="searchJobs()">Search</button>
        </div>
        <div id="results"></div>
    </div>
    <center>
    <a href="dash.php"><button style="width:200px;margin-left:-25px;">Back to Home</button></a>
   
    </center>
    <script>
        function searchJobs() {
            var keyword = document.getElementById('keyword').value.toLowerCase();
            var location = document.getElementById('location').value.toLowerCase();
            // var category = document.getElementById('category').value.toLowerCase();

            fetch('search_jobs.php?keyword=' + keyword + '&location=' + location )
                .then(response => response.json())
                .then(data => displayJobs(data))
                .catch(error => console.error('Error:', error));
        }

        function displayJobs(jobs) {
            var resultsDiv = document.getElementById('results');
            resultsDiv.innerHTML = '';

            if (jobs.length === 0) {
                resultsDiv.textContent = 'No matching jobs found.';
            } else {
                jobs.forEach(function (job) {
                    var jobBox = document.createElement('div');
                    jobBox.classList.add('job-box');

                    var image = document.createElement('img');
                    image.src = "./table.jpg";
                    jobBox.appendChild(image);

                    var detailsDiv = document.createElement('div');
                    detailsDiv.classList.add('job-description');
                    detailsDiv.innerHTML = `<strong>Work-Provider:${job.name}</strong><br><strong>Work:${job.work_type}</strong><br>Work-Location:${job.location}<br>Salary: ${job.wage}`;
                    jobBox.appendChild(detailsDiv);

                    var statusButton = document.createElement('button');
                    statusButton.classList.add('status-button');
                    statusButton.textContent = job.phno; // Display phone number for the job
                    statusButton.style.backgroundColor = 'blue'; // Set a green background for the button
                    
                   
                    jobBox.appendChild(statusButton);


                    resultsDiv.appendChild(jobBox);
                });
            }
        }
    </script>
</body>
</html>
