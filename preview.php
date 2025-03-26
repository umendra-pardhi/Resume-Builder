<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Resume Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            height:100vh;
        }

::-webkit-scrollbar {
  display: none;
}

        .page-title {
            text-align: center;
            background-color: #1a5276;
            color: white;
            padding: 10px 0;
            font-size: 20px;
            position:sticky;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .resume-container {
            margin: 30px auto 0; 
            margin-bottom:0px;
            width: 210mm;
            /* height: 297mm; */
            background: white;
            /* padding: 20px; */
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* overflow: hidden; */
            /* margin-bottom:50px; */
            overflow-y: scroll;
            /* position: fixed; */
            /* right:0; */
        }
        
        @media print {
            body{
                display: none;
            }
      
            .resume-container {
                margin-top: 0px !important;
                border: none;
                box-shadow: none;
                display:none;
    
            }

         
 #resume{
    display: block;
 }
 .page-title {
    visibility: hidden;
    display: none;
 }
            
  }  

  .img-circle {
    border-radius: 50%;
} 

@page {
  size: A4 !important;
  margin: 0 !important;
}


.sidebar{
    width: 700px;
    height: 100%;
    position: fixed;
    /* top: 80px; */
    overflow-y: scroll;
    left:0;
   
}
    </style>
</head>
<body>

    <div class="page-title">
        
    <td style="padding:10px"><img src="img2.png" class="img-responsive img-circle margin" style="display:inline" alt="Bird" width="60px"  ></td>
    Resume Preview

</div>


    <div id="resume" class="resume-container">

<?php include(__DIR__.'/templates/temp1/resume.php') ?>

    </div>
</body>
</html>

