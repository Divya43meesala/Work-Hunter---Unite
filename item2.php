<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="dd.css">
        
</head>
<body>

<div class="class-1" style="background-color:white; margin-top:30px; padding-left:15px;border-radius: 30px;">
                     <table>
                     <img class="profile-pic" src="carp.jpg" alt="Profile Picture">
                     <label id="h">Type of Work :<?php echo $ROW['work_type']?></label>
                        <tr>
                            <td class="txt">Work-Provider-Name</td>
                            <td>:<?php echo $ROW['name']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Email ID</td>
                            <td>:<?php echo $ROW['email']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Contact No</td>
                            <td>:<?php echo $ROW['phno']?></td>
                        </tr>
                        
                        <tr>
                            <td class="txt">Availability</td>
                            <td>:<?php echo $ROW['date_time']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Experience</td>
                            <td>:<?php echo $ROW['experience']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Preferred Job Location</td>
                            <td>:<?php echo $ROW['location']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Daily Wage</td>
                            <td>:<?php echo $ROW['wage']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Additional Information</td>
                            <td>:<?php echo $ROW['comment']?></td>
                        </tr>
                   
                       
                     </table>

                    </div>


            </body>
    </html>
        