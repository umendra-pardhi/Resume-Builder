<?php

if (!isset($_GET['id'])) {
    die("Resume ID is missing.");
}

$id = $_GET['id'];


$resumeFile = "user_resumes/$id/details.json";
$templateFile = "user_resumes/$id/template.json"; 

if (file_exists($resumeFile) && file_exists($templateFile)) {
    // $resumeData = json_decode(file_get_contents($resumeFile), true);
    
    $templateData = json_decode(file_get_contents($templateFile), true);
    $template = $templateData['template'];  
} else {

    die("Resume or template not found.");
}

$templateFilePath = "/templates/$template/resume.php"; 

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Resume Preview</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body {
            margin: 0;
            padding: 0 0  40px 0;
            background-color: #f2f3f4;
            font-family: Arial, sans-serif;
            /* height:100vh; */
    
        }

::-webkit-scrollbar {
  display: none;
}

        .page-title {
            text-align: center;
            background-color: #fff;
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            position:sticky;
            top: 0;
            z-index: 1000;
            display:flex;
            color:#333;
            align-items:center;
            justify-content: space-between;
            border:1px solid #e0e0e0;
        }
        .page-title p{
            margin:0 !important;
            font-weight:bold !important;
            font-size:16px !important;
            /* margin-left:10px; */
        }
        .page-title .dwn{
            /* margin-right:50px; */
        }
        .btn-primary {
            cursor: pointer;
            border:none;
            background-color: #2575fc;
            border-color: #2575fc;
            padding: 5px 20px;
    font-size: 0.85rem;
    border-radius: 50px;
            transition: background-color 0.3s ease;
            color:#fff;
        }

        .btn-primary:hover {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }

        .resume-container {
            /* transform: scale(0.6); 
            transform-origin: top left; */
            margin: 20px 50px; 
            margin-bottom:0px;
            width: 210mm;
            height: 286mm;
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
                margin: 0px !important;
                border: none ;
                box-shadow: none;
                display:none;
                transform: scale(1); 
    
            }

            .sidebar{
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
    width: 650px;
    height: 100%;
    position: fixed;
    top: 45px;
    overflow-y: scroll;
  right:0;
  border:1px solid #e0e0e0;
   
}
    </style>
</head>
<body>

    <div class="page-title">
        <div>
            <p >Resume Builder</p>
        </div>
        <div class='dwn'>
            <button class="btn-primary" id='download-resume'>
                Download as PDF
</button>

<button class="btn-primary" id='download-resume-print'>
                Download scannable PDF
</button>

<button class="btn-primary" id='downloadpdf'>
                Download PDF
</button>

        </div>

    </div>

    



    <div id="resume" class="resume-container">
<?php 
include(__DIR__.$templateFilePath) ;
?>
    </div>

<div class="sidebar">

<iframe src="edit.php?id=<?php echo $_GET['id']; ?>" width="100%" height="100%" frameborder="0"></iframe>

</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

    <script>

window.onload = function () {
            document.getElementById("download-resume")
            .addEventListener("click", () => downloadResumeAsPdf()); 

            document.getElementById("download-resume-print")
            .addEventListener("click", () => downloadResumeAsPrint()); 

        }

        
        function downloadResumeAsPrint(){
            window.print();

        }

       
function downloadResumeAsPdf(){
    const resume = this.document.querySelector(".pdf-resume");
    console.log(resume)
           
            var options = {
                filename: 'Resume.pdf',
                html2canvas: { scale:2 },
                jsPDF: { unit: 'mm', format: 'A4', orientation: 'portrait' }
            };
            html2pdf().from(resume).set(options).save();
}
        </script>




<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>


<script>
$("#downloadpdf").click(function() {
    window.jsPDF = window.jspdf.jsPDF;
    var doc = new jsPDF();

    var page = document.querySelector('.pdf-resume');

    // HTML to PDF
    doc.html(page, {
        callback: function(doc) {
            doc.save('test - resume1734161132.pdf');
        },
        margin: [0, 0, 0, 0],
        x: 0,
        y: 0,
        width: 210,
        windowWidth: 800,
        html2canvas: {
            scale: 2, 
            useCORS: true 
        }
    });
});

</script>

</body>
</html>
