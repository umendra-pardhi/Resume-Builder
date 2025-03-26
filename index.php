<?php
// Fetch all resume files from user_resumes folder
$resumeFiles = glob('user_resumes/*/template.json');

// Function to display the resume name, link, and delete button
function getResumeLink($resumeFile) {
    $resumeData = json_decode(file_get_contents($resumeFile), true);
    $id = basename(dirname($resumeFile)); // Folder name is the unique ID
    return "
        <li class='list-group-item d-flex justify-content-between align-items-center'>
            <a href='edit_preview.php?id=$id' class='text-decoration-none text-dark'>" . htmlspecialchars($resumeData['name']) . "</a>
            <form action='delete_resume.php' method='POST' style='display: inline;'>
                <input type='hidden' name='id' value='$id'>
                <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
            </form>
        </li>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@500;600&display=swap" rel="stylesheet">
    <style>
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
                    <li class="nav-item">
                        <a class="nav-link" href="create_resume.php">Create Resume</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main content section -->
    <div class="header">
        <h1>Create and Build Your Perfect Resume</h1>
        <p>Start your career journey with a professional, tailored resume in just a few clicks!</p>
        <a href="create_resume.php" class="btn btn-primary btn-lg">Get Started</a>
    </div>

    <!-- Your Resumes section -->
    <div class="container resume-list">
        <h2 class="text-center text-white mb-4">Your Resumes</h2>
        <ul class="list-group">
            <?php
            if (count($resumeFiles) > 0) {
                foreach ($resumeFiles as $file) {
                    echo getResumeLink($file);
                }
            } else {
                echo "<li class='list-group-item text-center'>No resumes found.</li>";
            }
            ?>
        </ul>
    </div>


    <footer class="footer">
        <p>&copy; 2024 Resume Builder. All rights reserved.</p>
        <p>Need help? <a href="contact.php">Contact Us</a></p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
