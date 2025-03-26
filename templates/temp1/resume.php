
<!DOCTYPE html>
<html lang="en-US">
<head>
<title>Resume</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<style>
    body{
        margin: 0;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;

    }
    h3{
        font-size: 24px;
    }
hr {
    margin-top: 20px;
    margin-bottom: 20px;
    border: 0;
    border-top: 1px solid #eee;
}

h1, h2, h3, h4, h5, h6 {
    font-family: inherit;
    font-weight: 500;
    line-height: 1.1;
    color: inherit;
}


table.grid {
    width:100%;
    border:none;
    background-color:white;
    color:#333;
    padding:0px;
}
table.grid tr {
    text-align:center;
}
table.gridcolored td:nth-child(even) {
  background-color: #f7f9f9;
}
table.grid td {
    border: 0px solid blue;
    padding:2px 5px 2px 5px;     
    
}
.img-circle {
    border-radius: 50%;
}

@page {
  size: A4 !important;
  margin: 0 !important;
}


</style>
</head>

<body id="resume">

<?php
    

    $details = getDetails();
    if ($details == null) {
        echo "Error: Could not decode JSON.";
    }
?>


<div class="table-responsive pdf-resume">
<table class="grid" cellspacing="0">
<tr style="background-color:#1a5276">
  <td style="padding:10px"><?php getImage(); ?></td>
  <td colspan="5"><?php getTitle($details); ?></td>  
</tr>


<tr>
  <td colspan="6" style="text-align:left"><?php getCareerObjective($details); ?></td>
</tr>
<tr>
  <td colspan="6" style="text-align:left"><?php getEducationDetails($details); ?></td>
</tr>
<tr>
  <td colspan="6" style="text-align:left"><?php getSkillDetails($details); ?></td>
</tr>
<tr>
  <td colspan="6" style="text-align:left"><?php getProjectDetails($details); ?></td>
</tr>
<tr>
  <td colspan="6" style="text-align:left"><?php getAchievements($details); ?></td>
</tr>
<tr style="background-color:#1a5276;padding:10px">
  <td colspan="6" style="text-align:left"></td>
</tr>


</table>

</div>

</body>
</html>

<?php

function getImage(){
    if (!isset($_GET['id'])) {
        die("Resume ID is missing.");
    }
    
    $resumeId = $_GET['id'];
    
    $jsonTempData = file_get_contents("user_resumes/$resumeId/template.json");

    $templateData = json_decode($jsonTempData, true);
    $templateName= $templateData['template'];

    echo '<img src="./templates/'. $templateName.'/img2.png" class="img-responsive img-circle margin" style="display:inline" alt="profilepic" width="60px"  >';
}
function getTitle($details){
    
    $name = $details['Details']['name'] ;
    $mobile =  $details['Details']['mobile'] ;
    $email =  $details['Details']['email'] ;
    
    echo '<h3 style="margin:1px;padding:1px;text-align:left;color:white">'.$name.'</h3>';
    echo '<hr style="margin:1px;padding:1px">';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;color:white"><i class="fa fa-phone" style="color: white;"></i>&nbsp;&nbsp;'.$mobile.'</h6>';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;color:white"><i class="fa fa-envelope" style="color: white;"></i>&nbsp;&nbsp;'.$email.'</h6>';
}

function getCareerObjective($details){
    $careerObjective = $details['Details']['careerObjective'] ;
    echo '<h5 style="margin:1px;padding:1px 1px 5px 1px;text-align:left;">Career Objective:</h6>';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;">'.$careerObjective.'</h6>';
}

function getEducationDetails($details){
    echo '<h5 style="margin:1px;padding:1px 1px 5px 1px;text-align:left;">Education Details:</h5>';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;">';
     ?>
    <div class="table-responsive" style="margin-bottom:1px">
        <table class="grid gridcolored" cellspacing="0">
            <tr>
              <th width="5%" style="padding:1px 5px 1px 1px;text-align:left">Class</th>
              <th width="55%" style="text-align:left;background-color: #f7f9f9;">School / College</th>
              <th width="35%" style="text-align:left">Board / University</th>
              <th width="5%" style="text-align:left;background-color: #f7f9f9;">Score</th>
            </tr>
    <?php
    
    foreach ($details['Details']['Education'] as $education) {
        echo "<tr>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$education['Class']."</td>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$education['School/College']."</td>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$education['Board/University'] . "</td>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$education['Score'] . "</td>";
        echo " </tr>";
    }
    ?>
        </table>
    </div>
    <?php
    echo'</h6>';
}

function getSkillDetails($details){
    echo '<h5 style="margin:1px;padding:1px 1px 5px 1px;text-align:left;">Tech Skills:</h5>';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;">';
     ?>
    <div class="table-responsive" style="margin-bottom:1px">
        <table class="grid gridcolored" cellspacing="0">
            <tr>
              <th width="20%" style="padding:1px 5px 1px 1px;text-align:left">Skill</th>
              <th width="80%" style="text-align:left;background-color: #f7f9f9;">Remark</th>
            </tr>
    <?php
    
    foreach ($details['Details']['Skills'] as $skill) {
        echo "<tr>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$skill['Skill']."</td>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$skill['Remark']."</td>";
        echo " </tr>";
    }
    ?>
        </table>
    </div>
    <?php
    echo'</h6>';
}
function getProjectDetails($details){
    echo '<h5 style="margin:1px;padding:1px 1px 5px 1px;text-align:left;">Projects:</h6>';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;">';
     ?>
    <div class="table-responsive" style="margin-bottom:1px">
        <table class="grid gridcolored" cellspacing="0">
    <?php
    
    foreach ($details['Details']['Projects'] as $project) {
        echo "<tr>";
        echo '<td rowspan="3" style="background-color:#ccd1d1"></td><td width="30%" style="margin:1px;padding:1px;text-align:Left"><b>Title: '.$project['Title']."</b></td>";
        echo '<td colspan="2" style="margin:1px;padding:1px;text-align:Left">Desc: '.$project['Description']."</td>";
        echo '</tr><tr>';
        echo '<td colspan="3" style="margin:1px;padding:1px;text-align:Left">Tech Stack: '.$project['TechStack']."</td>";
        echo '</tr><tr>';
        echo '<td style="margin:1px;padding:1px;text-align:Left">Team Size: '.$project['TeamSize']."</td>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">Role: '.$project['Role']."</td>";
        echo " </tr>";
        echo '</tr><tr>';
        echo '<td colspan="3"></td>';
        echo " </tr>";
    }
    ?>
        </table>
    </div>
    <?php
    echo'</h6>';
}

function getAchievements($details){
    echo '<h5 style="margin:1px;padding:1px 1px 5px 1px;text-align:left;">Achivements:</h6>';
    echo '<h6 style="margin:1px;padding:1px;text-align:left;">';
     ?>
    <div class="table-responsive">
        <table class="grid gridcolored" cellspacing="0">
    <?php
    
    foreach ($details['Details']['Achievements'] as $achievement) {
        echo "<tr>";
        echo '<td style="margin:1px;padding:1px;text-align:Left">'.$achievement['Title']."</td>";
        echo " </tr>";
    }
    ?>
        </table>
    </div>
    <?php
    echo'</h6>';
}

function getDetails(){
    
    // Specify the path to the JSON file
    // $filePath = __DIR__.'/details.json';

    if (!isset($_GET['id'])) {
        die("Resume ID is missing.");
    }
    
    $resumeId = $_GET['id'];
    $resumeFile = "user_resumes/$resumeId/details.json";
    
    $jsonTempData = file_get_contents("user_resumes/$resumeId/template.json");

    $templateData = json_decode($jsonTempData, true);
    $templateName= $templateData['template'];

    $filePath=$resumeFile;
    
    // Check if the file exists
    if (file_exists($filePath)) {
        // Read the file content
        $jsonData = file_get_contents($filePath);
    
        // Decode JSON data to PHP array
        $details = json_decode($jsonData, true);
        
        return $details;
        
    } else {
        echo "Error: File not found.";
    }
    
}


?>
