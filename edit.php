<?php
// Path to the JSON file
// $file_path = 'details.json';

if (!isset($_GET['id'])) {
    die("Resume ID is missing.");
}

$id = $_GET['id'];


$file_path = "user_resumes/$id/details.json";
$templateFile = "user_resumes/$id/template.json"; 

if (file_exists($file_path) && file_exists($templateFile)) {
    $templateData = json_decode(file_get_contents($templateFile), true);
    $template = $templateData['template'];  
} else {

    die("Resume or template not found.");
}

// Load JSON data
$json_data = file_get_contents($file_path);
$resume_data = json_decode($json_data, true);

// Handle form submission to update JSON file
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update basic details
    $resume_data['Details']['name'] = $_POST['name'];
    $resume_data['Details']['mobile'] = $_POST['mobile'];
    $resume_data['Details']['email'] = $_POST['email'];
    $resume_data['Details']['careerObjective'] = $_POST['careerObjective'];
    $resume_data['Details']['address'] = $_POST['address'];
    $resume_data['Details']['city'] = $_POST['city'];
    $resume_data['Details']['state'] = $_POST['state'];
    $resume_data['Details']['zip'] = $_POST['zip'];

    // Update Education
    $resume_data['Details']['Education'] = array();
    foreach ($_POST['education'] as $edu) {
        $resume_data['Details']['Education'][] = $edu;
    }

    // Update Skills
    $resume_data['Details']['Skills'] = array();
    foreach ($_POST['skills'] as $skill) {
        $resume_data['Details']['Skills'][] = $skill;
    }

    // Update Projects
    $resume_data['Details']['Projects'] = array();
    foreach ($_POST['projects'] as $project) {
        $resume_data['Details']['Projects'][] = $project;
    }

    // Update Achievements
    $resume_data['Details']['Achievements'] = array();
    foreach ($_POST['achievements'] as $achievement) {
        $resume_data['Details']['Achievements'][] = $achievement;
    }

    // Save updated data back to the JSON file
    file_put_contents($file_path, json_encode($resume_data, JSON_PRETTY_PRINT));
    echo "<div class='container p-2 text-center' ><div class='alert alert-success' role='alert'>Resume updated successfully!</div></div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Resume | Take it Ideas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .section {
            background-color: #f8f9fa;
            padding: 20px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .section h2 {
            font-size: 1.5rem;
            color: #007bff;
            margin-bottom: 15px;
        }
/* #btnupdate{
    margin-bottom:50px;
} */

  
    </style>
</head>
<body>
<div class="container-fluid mt-2  p-2">



    <!-- <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://takeitideas.in/">Home</a></li>
    <li class="breadcrumb-item"><a href="index.php">Resume</a></li>
    <li class="breadcrumb-item active" aria-current="page">Update Resume</li>
  </ol>
  </nav> -->
    <form id='resumeupdateform' method="POST" action="">

    <div class="row mb-2">
    <div class="col-6">    
        <h5 >Update Resume</h5>
    </div>
    <div class="col-6 text-center">    
        
        <button type="submit" class="btn btn-sm btn-success w-50">Update Resume</button>
    </div>
</div>

        <div class="section">
            <h2>Personal Details</h2>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Name:</label>
                    <input type="text" class="form-control form-control-sm" name="name" value="<?= $resume_data['Details']['name'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Mobile:</label>
                    <input type="text" class="form-control form-control-sm" name="mobile" value="<?= $resume_data['Details']['mobile'] ?>">
                </div>
                <div class="form-group col-md-4">
                    <label>Email:</label>
                    <input type="text" class="form-control form-control-sm" name="email" value="<?= $resume_data['Details']['email'] ?>">
                </div>
               
            </div>

            <div class="form-row">
            <div class="form-group col-md-12">
                    <label>Career Objective:</label>
                    <textarea rows='4' class="form-control form-control-sm" name="careerObjective"><?= $resume_data['Details']['careerObjective'] ?></textarea>
                </div>
    </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Address:</label>
                    <input type="text" class="form-control form-control-sm" name="address" value="<?= $resume_data['Details']['address'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>City:</label>
                    <input type="text" class="form-control form-control-sm" name="city" value="<?= $resume_data['Details']['city'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>State:</label>
                    <input type="text" class="form-control form-control-sm" name="state" value="<?= $resume_data['Details']['state'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label>Zip:</label>
                    <input type="text" class="form-control form-control-sm" name="zip" value="<?= $resume_data['Details']['zip'] ?>">
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Education</h2>
            <div id="education-section">
                <?php foreach ($resume_data['Details']['Education'] as $index => $edu) : ?>
                    <div class="education-entry border rounded p-3 mb-3">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label>Class:</label>
                                <input type="text" class="form-control form-control-sm" name="education[<?= $index ?>][Class]" value="<?= $edu['Class'] ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label>School/College:</label>
                                <input type="text" class="form-control form-control-sm" name="education[<?= $index ?>][School/College]" value="<?= $edu['School/College'] ?>">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Board/University:</label>
                                <input type="text" class="form-control form-control-sm" name="education[<?= $index ?>][Board/University]" value="<?= $edu['Board/University'] ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Score:</label>
                                <input type="text" class="form-control form-control-sm" name="education[<?= $index ?>][Score]" value="<?= $edu['Score'] ?>">
                            </div>
                            <div class="form-group col-md-1 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="btn btn-sm btn-primary mb-4" onclick="addEducation()">Add New Education</button>
        </div>

        <div class="section">
            <h2>Skills</h2>
            <div id="skills-section">
                <?php foreach ($resume_data['Details']['Skills'] as $index => $skill) : ?>
                    <div class="skill-entry border rounded p-3 mb-3">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Skill:</label>
                                <input type="text" class="form-control form-control-sm" name="skills[<?= $index ?>][Skill]" value="<?= $skill['Skill'] ?>">
                            </div>
                            <div class="form-group col-md-5">
                                <label>Remark:</label>
                                <input type="text" class="form-control form-control-sm" name="skills[<?= $index ?>][Remark]" value="<?= $skill['Remark'] ?>">
                            </div>
                            <div class="form-group col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="btn btn-sm btn-primary mb-4" onclick="addSkill()">Add New Skill</button>
        </div>

<!-- Projects Section -->
<div class="section">
            <h2>Projects</h2>
            <div id="projects-section">
                <?php foreach ($resume_data['Details']['Projects'] as $index => $project) : ?>
                    <div class="project-entry border rounded p-3 mb-3">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Project Title:</label>
                                <input type="text" class="form-control form-control-sm" name="projects[<?= $index ?>][Title]" value="<?= $project['Title'] ?>">
                            </div>
                            <div class="form-group col-md-8">
                                <label>Description:</label>
                                <textarea class="form-control form-control-sm" name="projects[<?= $index ?>][Description]"><?= $project['Description'] ?></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Tech Stack:</label>
                                <input type="text" class="form-control form-control-sm" name="projects[<?= $index ?>][TechStack]" value="<?= $project['TechStack'] ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label>Role:</label>
                                <input type="text" class="form-control form-control-sm" name="projects[<?= $index ?>][Role]" value="<?= $project['Role'] ?>">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Team Size:</label>
                                <input type="number" class="form-control form-control-sm" name="projects[<?= $index ?>][TeamSize]" value="<?= $project['TeamSize'] ?>">
                            </div>
                            <div class="form-group col-md-2 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                        </div>
                        </div>
                        
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="btn btn-sm btn-primary mb-4" onclick="addProject()">Add New Project</button>
        </div>


        <!-- Achievements Section -->
        <div class="section">
            <h2>Achievements</h2>
            <div id="achievements-section">
                <?php foreach ($resume_data['Details']['Achievements'] as $index => $achievement) : ?>
                    <div class="achievement-entry border rounded p-3 mb-3">
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label>Achievement:</label>
                                <input type="text" class="form-control form-control-sm" name="achievements[<?= $index ?>][Title]" value="<?= $achievement['Title'] ?>">
                            </div>
                            <div class="form-group col-md-2 d-flex align-items-end">
                                <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button type="button" class="btn btn-sm btn-primary mb-4" onclick="addAchievement()">Add New Achievement</button>
        </div>
<div class="text-center">
<button type="submit" id='btnupdate' class="btn btn-success w-50">Update Resume</button>
</div>
       
        <br><br>
    </form>
</div>

<script>
function addEducation() {
    const educationSection = document.getElementById('education-section');
    const index = educationSection.children.length;
    educationSection.insertAdjacentHTML('beforeend', `
        <div class="education-entry border rounded p-3 mb-3">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Class:</label>
                    <input type="text" class="form-control form-control-sm" name="education[${index}][Class]">
                </div>
                <div class="form-group col-md-3">
                    <label>School/College:</label>
                    <input type="text" class="form-control form-control-sm" name="education[${index}][School/College]">
                </div>
                <div class="form-group col-md-3">
                    <label>Board/University:</label>
                    <input type="text" class="form-control form-control-sm" name="education[${index}][Board/University]">
                </div>
                <div class="form-group col-md-2">
                    <label>Score:</label>
                    <input type="text" class="form-control form-control-sm" name="education[${index}][Score]">
                </div>
                <div class="form-group col-md-1 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                </div>
            </div>
        </div>
    `);
}

function addSkill() {
    const skillsSection = document.getElementById('skills-section');
    const index = skillsSection.children.length;
    skillsSection.insertAdjacentHTML('beforeend', `
        <div class="skill-entry border rounded p-3 mb-3">
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label>Skill:</label>
                    <input type="text" class="form-control form-control-sm" name="skills[${index}][Skill]">
                </div>
                <div class="form-group col-md-5">
                    <label>Remark:</label>
                    <input type="text" class="form-control form-control-sm" name="skills[${index}][Remark]">
                </div>
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                </div>
            </div>
        </div>
    `);
}

function addProject() {
    const projectsSection = document.getElementById('projects-section');
    const index = projectsSection.children.length;
    projectsSection.insertAdjacentHTML('beforeend', `
        <div class="project-entry border rounded p-3 mb-3">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Title:</label>
                    <input type="text" class="form-control form-control-sm" name="projects[${index}][Title]">
                </div>
                <div class="form-group col-md-8">
                    <label>Description:</label>
                    <textarea class="form-control form-control-sm" name="projects[${index}][Description]"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Tech Stack:</label>
                    <input type="text" class="form-control form-control-sm" name="projects[${index}][TechStack]">
                </div>
                <div class="form-group col-md-4">
                    <label>Role:</label>
                    <input type="text" class="form-control form-control-sm" name="projects[${index}][Role]">
                </div>
                <div class="form-group col-md-2">
                    <label>Team Size:</label>
                    <input type="number" class="form-control form-control-sm" name="projects[${index}][TeamSize]">
                </div>
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                </div>
            </div>
        </div>
    `);
}

function addAchievement() {
    const achievementsSection = document.getElementById('achievements-section');
    const index = achievementsSection.children.length;
    achievementsSection.insertAdjacentHTML('beforeend', `
        <div class="achievement-entry border rounded p-3 mb-3">
            <div class="form-row">
                <div class="form-group col-md-10">
                    <label>Title:</label>
                    <input type="text" class="form-control form-control-sm" name="achievements[${index}][Title]">
                </div>
                <div class="form-group col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeEntry(this)">Remove</button>
                </div>
            </div>
        </div>
    `);
}

function removeEntry(button) {
    button.closest('.border').remove();
}
</script>


<script type="text/javascript">

const form = document.getElementById('resumeupdateform');
form.addEventListener('submit', function(event) {

    // event.preventDefault();

    form.submit(); 
    reloadParent();

});

        function reloadParent() {
            // Reload the parent page
            parent.location.reload();
        }
    </script>
</body>
</html>
