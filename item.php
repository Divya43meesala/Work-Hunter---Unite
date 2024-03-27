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
                     <label id="h">Worker-Name:<?php echo $row['name']?></label>
                     
                       
                        <tr>
                            <td class="txt">Worker-age</td>
                            <td>:<?php echo $row['age']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Worker-Type</td>
                            <td>:<?php echo $row['work_type']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Worker-Contact</td>
                            <td>:<?php echo $row['contact']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Worker-Location</td>
                            <td>:<?php echo $row['location']?></td>
                        </tr>
                        <tr>
                            <td class="txt">Min-Wage</td>
                            <td>:<?php echo $row['wage']?></td>
                        </tr>
                   
                       
                     </table>

                    </div>
        
    </body>
    </html>
        