<?php
// Handle the form submission for creating a new resume
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data (example fields)
    $name = $_POST['name'];
    // $email = $_POST['email'];
    // $phone = $_POST['phone'];
    $template = $_POST['template'];  // Get the selected template

    // Generate a unique ID for the new resume
    $id = uniqid();
    
    // Define the path to the new resume's folder
    $folderPath = 'user_resumes/' . $id;
    
    // Create the folder if it doesn't exist
    if (!is_dir($folderPath)) {
        mkdir($folderPath, 0777, true);
    }
    
    // Create the details.json file inside the new folder
    // $resumeData = [
    //     'name' => $name,
    //     'email' => $email,
    //     'phone' => $phone,
    // ];
    $resumeFile = "temp.json";
  $resumeData = json_decode(file_get_contents($resumeFile), true);
  $resumeData['Details']['name']=$name;
    
    // Save the resume data into the details.json file
    file_put_contents($folderPath . '/details.json', json_encode($resumeData, JSON_PRETTY_PRINT));

    // Save the selected template information in a separate template.json file
    $templateData = ['name' =>$name,'template' => $template];
    file_put_contents($folderPath . '/template.json', json_encode($templateData, JSON_PRETTY_PRINT));

    // Redirect to the edit/preview page
    header('Location: edit_preview.php?id=' . $id);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Resume</title>
     <!-- Link to Bootstrap 5 CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts for Attractive Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <style>
        /* Custom styles for more attractive design */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .navbar-brand, .nav-link {
            color: #333 !important;
        }

        .navbar-nav .nav-link {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }

        .header {
            text-align: center;
            padding: 60px 0;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 700;
        }

        .header p {
            font-size: 1.25rem;
            font-weight: 400;
            margin: 20px 0;
        }

        .header .btn {
            padding: 10px 30px;
            font-size: 1.2rem;
            border-radius: 50px;
            transition: transform 0.3s ease;
        }

        .header .btn:hover {
            transform: scale(1.1);
        }

        .resume-list {
            margin-top: 40px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }

        .resume-list ul {
            padding-left: 0;
            list-style-type: none;
        }

        .resume-list li {
            margin: 10px 0;
            background-color: #fff;
            color: #333;
            border-radius: 8px;
            padding: 15px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .resume-list li:hover {
            background-color: #2575fc;
            color: #fff;
            transform: scale(1.05);
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        .footer a {
            color: #2575fc;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .temp{
    display:flex;
    justify-content: flex-start;
    gap:0;

}
      
        .temp-1 , .temp-2{
            position: relative;
            flex-basis:200px;
        }

    #card1Radio, #card2Radio{
        position: absolute;
        top: 5px;
        left: 70px;
        font-size: 18px;
        z-index:1000;
}

    </style>
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">Resume Builder</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="create_resume.php">Create Resume</a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Create a New Resume</h2>
        <form action="create_resume.php" method="POST">
            <!-- Basic Resume Information -->
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="ms-4 form-control w-50" id="name" name="name" required>
            </div>
            <!-- <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div> -->

            <!-- Template Selection -->
            <div class="mb-3">
                <label for="template" class="form-label">Select Template</label>
                <!-- <select class="form-select" id="template" name="template" required>
                    <option value="temp2">Modern</option>
                    <option value="temp1">Classic</option>
            
                </select> -->

    <div class="temp">
      <div class="temp-1">
        <div class="form-check custom-radio">
          <input type="radio" id="card1Radio" value="temp1" name="template" class="form-check-input" checked required >
          <label for="card1Radio">
            <div class="card" id="card1">
              <img src="temp1.jpg" class="card-img-top" alt="Image 1">
              <div class="card-body p-0 text-center">
                <p class="card-title text-dark">Classic</p>
                <!-- <p class="card-text">Description of Card 1</p> -->
              </div>
            </div>
          </label>
        </div>
      </div>

      <div class="temp-2">
        <div class="form-check custom-radio">
          <input type="radio" id="card2Radio" value="temp2" name="template" class="form-check-input" required>
          <label for="card2Radio">
            <div class="card" id="card2">
              <img src="temp2.jpg" class="card-img-top" alt="Image 2">
              <div class="card-body p-0 text-center">
                <p class="card-title text-dark">Modern</p>
                <!-- <p class="card-text">Description of Card 2</p> -->
              </div>
            </div>
          </label>
        </div>
      </div>
    </div>

                
            </div>

            <button type="submit" class="btn btn-primary">Create Resume</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
