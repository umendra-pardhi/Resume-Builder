<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Roboto, sans-serif;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        /* .resume {
            margin: 60px auto 0;
            margin-bottom: 0px;
            width: 210mm;
            height: 297mm;
            background: white;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow-y: scroll;

            display: flex;
            padding: 40px 25px;
            column-gap: 10px;
        } */

            .resume {
   
            background: white;
            display: flex;
            padding: 40px 25px;
            column-gap: 10px;
        }

        .col1 {
            display: flex;
            flex-direction: column;
            flex-basis: 66%;
            row-gap: 20px;
            height: 100%;
        }

        .col2 {
            display: flex;
            flex-direction: column;
            flex-basis: 34%;
            row-gap: 20px;
            height: 100%;
            font-size: 12px;

        }

        .box {
            border: 1px solid rgba(154, 205, 50, 0.75);
            border-radius: 5px;
            padding: 15px 10px 10px;
            position: relative;
        }

        .header {
            position: absolute;
            top: 0px;
            transform: translate(0px, -50%);
            background: white;
            padding: 0px 5px;
            font-weight: bold;
            color: rgb(24, 144, 255);
        }

        .name {
            font-size: 20px;
            line-height: 1.75rem;
            font-weight: 500;
        }

        .img-circle {
            border-radius: 50%;
        }

        .details {
            display: flex;
            justify-content: space-between;
        }

        .contact {
            display: flex;
            align-items: center;
        }

        p {
            margin: 0;
            font-size: .75rem;
            line-height: 1rem;
        }

        .gap-2 {
            gap: .5rem;
        }

        .flex {
            display: flex;
        }

        .text-xs {
            font-size: .75rem;
            line-height: 1rem;
        }

        a {
            color: inherit;
            text-decoration: inherit;
        }

        .project {
            display: flex;
            flex-direction: column;
            padding: 6px 16px;
            -webkit-box-flex: 1;
            flex-grow: 1;
            list-style: none;
            margin: 5px 0 0 0;
            padding: 0;
        }

        .project .li {

            display: flex;

        }

        .project-highlight {
            display: flex;
            flex-direction: column;
            flex: 0 1 0%;
            -webkit-box-align: center;
            align-items: center;
            margin-right: 8px;
        }

        .project-highlight .bullet {
            display: flex;
            align-self: baseline;
            border-style: solid;
            border-width: 2px;
            padding: 4px;
            border-radius: 50%;
            box-shadow: none;
            margin: 3px 0 0 0;
            background-color: transparent;
            border-color: rgb(46, 64, 82);
        }

        .project-highlight .line {
            width: 2px;
            background-color: rgb(189, 189, 189);
            -webkit-box-flex: 1;
            flex-grow: 1;
        }



        .justify-between {
            justify-content: space-between;
        }

        .items-end {
            align-items: flex-end;
            width: 100%;
        }

        .p-content {
            width: 100%;
        }

        .font-medium {
            font-weight: 550;
        }

        .desc {
            margin-left: 2px;
        }

        .edu {
            margin-bottom: 5px;
        }

        .edu-highlight {
            display: flex;
            flex-direction: column;
            flex: 0 1 0%;
            -webkit-box-align: center;
            align-items: center;
            margin-right: 5px;
        }

        .edu-highlight .bullet {
            display: flex;
            align-self: baseline;
            border-style: solid;
            border-width: 2px;
            padding: 4px;
            border-radius: 50%;
            box-shadow: none;
            margin: 2px 0 0 0px;
            background-color: transparent;
            border-color: rgb(46, 64, 82);
        }

        .edu-highlight .line {
            width: 2px;
            background-color: rgb(189, 189, 189);
            -webkit-box-flex: 1;
            flex-grow: 1;
        }

        .education-list {
            display: flex;
            list-style: none;
            /* gap: 10px; */
            margin: 0;
            padding: 0;
            flex-direction: column;
            width: 100%;

        }

        .skills {
            display: flex;
            /* flex-direction: column; */
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .skill-item {
            border: 1px solid yellowgreen;
            border-radius: 4px;
            border-width: 1px;
            border-style: solid;
            padding: 0.25rem;
        }

        .achievements {
            margin-block-start: 0;
            margin-block-end: 0;
            margin-inline-start: 0;
            margin-inline-end: 0;
            padding-inline-start: 15px;
        }

        @page {
  size: A4 !important;
  margin: 0 !important;
  background:#fff;
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

    <div class="resume pdf-resume">

        <div class="col1">

            <div class="box">

            
            <?php
                    
                    $name = $details['Details']['name'] ;
                    $mobile =  $details['Details']['mobile'] ;
                    $email =  $details['Details']['email'] ;
                    $city=$details['Details']['city'] ;

                    ?>

                <div class="header">
                    <span class="name"><?php echo $name; ?></span>
                </div>

                <div class="details">
                    <div class="img">
                    <?php getImage(); ?>
                    
                    </div>
                    <div class="contact">


                        <div class="">
                            <div class="flex gap-2">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="12" width="12" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M20.01 15.38c-1.23 0-2.42-.2-3.53-.56a.977.977 0 00-1.01.24l-1.57 1.97c-2.83-1.35-5.48-3.9-6.89-6.83l1.95-1.66c.27-.28.35-.67.24-1.02-.37-1.11-.56-2.3-.56-3.53 0-.54-.45-.99-.99-.99H4.19C3.65 3 3 3.24 3 3.99 3 13.28 10.73 21 20.01 21c.71 0 .99-.63.99-1.18v-3.45c0-.54-.45-.99-.99-.99z"></path></svg>
                                <a class="text-xs" href="tel:+91 7447564274"><?php echo $mobile; ?></a>
                            </div>
                            <div class="flex gap-2">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="12" width="12" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"></path></svg>
                                <a class="text-xs" href="mailto:<?php echo $email; ?>" ><?php echo $email; ?></a>
                            </div>
                            <div class="flex gap-2">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="12" width="12" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 010-5 2.5 2.5 0 010 5z"></path></svg>
                                <span class="text-xs"><?php echo $city; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="contact">

                        <div class="">
                            <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
  <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
</svg>
                                <!-- <a class="text-xs" href="https://github.com/Umendra-Pardhi">github.com/Umendra-Pardhi</a> -->
                                <a class="text-xs" href="https://github.com/Umendra-Pardhi">github.com/john-doe</a>
                            </div>
                            <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
</svg>
                                <!-- <a class="text-xs" href="https://www.linkedin.com/in/umendrapardhi/">linkedin.com/in/umendrapardhi</a> -->
                                <a class="text-xs" href="https://www.linkedin.com/in/umendrapardhi/">linkedin.com/in/john-doe</a>
                            </div>
                            <div class="flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-globe" viewBox="0 0 16 16">
  <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m7.5-6.923c-.67.204-1.335.82-1.887 1.855A8 8 0 0 0 5.145 4H7.5zM4.09 4a9.3 9.3 0 0 1 .64-1.539 7 7 0 0 1 .597-.933A7.03 7.03 0 0 0 2.255 4zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a7 7 0 0 0-.656 2.5zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5zM8.5 5v2.5h2.99a12.5 12.5 0 0 0-.337-2.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5zM5.145 12q.208.58.468 1.068c.552 1.035 1.218 1.65 1.887 1.855V12zm.182 2.472a7 7 0 0 1-.597-.933A9.3 9.3 0 0 1 4.09 12H2.255a7 7 0 0 0 3.072 2.472M3.82 11a13.7 13.7 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5zm6.853 3.472A7 7 0 0 0 13.745 12H11.91a9.3 9.3 0 0 1-.64 1.539 7 7 0 0 1-.597.933M8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855q.26-.487.468-1.068zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.7 13.7 0 0 1-.312 2.5m2.802-3.5a7 7 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7 7 0 0 0-3.072-2.472c.218.284.418.598.597.933M10.855 4a8 8 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4z"/>
</svg>
                                    <!-- <a class="text-xs" href="umendrapardhi.web.app">umendrapardhi.web.app</a> -->
                                    <a class="text-xs" href="umendrapardhi.web.app">my-portfolio.com</a>
                            </div>
                        </div>
                    </div>


                </div>


            </div>

            <div class="box">
                <div class="header">
                    <span class="name">Education</span>
                </div>
               
                <?php getEducationDetails($details); ?>


            </div>

            <div class="box">
                <div class="header">
                    <span class="name">Projects</span>
                </div>

                <?php getProjectDetails($details); ?>

                
              



            </div>

        </div>

        <div class="col2">
            <div class="box">
                <div class="header">
                    <span class="">Career Objective</span>
                </div>
                <?php getCareerObjective($details); ?>
            </div>

            <div class="box">
                <div class="header">
                    <span class="">Tech Skills</span>
                </div>

                <div class="skills">
                <?php getSkillDetails($details); ?>
                </div>
            </div>

            <div class="box">
                <div class="header">
                    <span class="">Achievements</span>
                </div>
                <ul class="achievements">
                <?php getAchievements($details); ?>
                </ul>
            </div>
        </div>
    </div>
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

    echo '<img src="./templates/'. $templateName.'/img2.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird"
                            width="60px"  >';
}


function getCareerObjective($details){
    $careerObjective = $details['Details']['careerObjective'] ;
    echo '<p>'.$careerObjective.'</p>';
}

function getEducationDetails($details){
   
    foreach ($details['Details']['Education'] as $education) {
      
        echo '<div class="flex edu">';

        echo '<div class="edu-highlight">';
            echo '<span class="bullet"></span>';
            echo '<span class="line"></span>';
        echo '</div>';

       echo ' <ul class="education-list">';

          echo '<div class="flex justify-between">';
                echo '<li class="text-xs"><b>'.$education['Class'].'</b></li>';
                echo '<li class="text-xs">Score: '.$education['Score'] .'</li>';

          echo '  </div>';
           echo '<div class="flex justify-between">' ;
                echo '<li class="text-xs">'.$education['School/College'].'</li>';
               echo ' <li class="text-xs">University: '.$education['Board/University'] .'</li>';
            echo '</div>';
        echo '</ul>';

echo '</div>';

    }
 
}


function getSkillDetails($details){

    foreach ($details['Details']['Skills'] as $skill) {
    
        echo '<div class="skill-item">'.$skill['Skill'].'</div>';
    }


}
function getProjectDetails($details){
  
    
    foreach ($details['Details']['Projects'] as $project) {
      
        // .$project['TeamSize'].
        // .$project['Role'].

           echo '<ul class="project">';
                       echo '<li class="li">';
                           echo '<div class="project-highlight">';
                               echo '<span class="bullet"></span>';
                               echo '<span class="line"></span>';
                           echo '</div>';
                           echo '<div class="p-content">';
                              echo ' <div class="flex justify-between items-end">';
                                   echo '<div class="text-medium">'.$project['Title'].'</div>';
                                
                               echo '</div>';
                               echo '<div class="flex justify-between items-end">';
                                  echo ' <div class="font-medium text-xs">Tech Stack: '.$project['TechStack'].'</div>';

                              echo ' </div>';
                               echo '<div class="desc text-xs">'.$project['Description'].'</div>';

            
                          echo ' </div>';
                       echo '</li>';
                  echo ' </ul>';


    }
    
}

function getAchievements($details){
    
    foreach ($details['Details']['Achievements'] as $achievement) {
      
        echo '<li>'.$achievement['Title'].'</li>';
    }
   
}

function getDetails(){
    
    // Specify the path to the JSON file
    // $filePath ='details.json';

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
