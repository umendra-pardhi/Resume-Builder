<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the resume ID (folder name)
    $id = $_POST['id'];
    
    // Define the folder path based on the resume ID
    $folderPath = "user_resumes/$id";
    
    // Check if the folder exists
    if (is_dir($folderPath)) {
        // Delete the resume's folder and its contents (JSON file and any other files)
        array_map('unlink', glob("$folderPath/*"));
        rmdir($folderPath); // Remove the empty folder

        // Redirect back to the homepage
        header("Location: index.php");
        exit();
    } else {
        echo "Error: Folder not found!";
    }
} else {
    echo "Invalid request method.";
}
?>
