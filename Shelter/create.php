<?php
// Include config file
require_once '../includes/config.php';
 
// Define variables and initialize with empty values
$tactical = $name = $status = "";
$tactical_err = $name_err = $status_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate tactical
    $input_tactical = trim($_POST["tactical"]);
    if(empty($input_tactical)){
        $tactical_err = "Please enter a Tactical Callsign.";
    } elseif(!filter_var(trim($_POST["tactical"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $tactical_err = 'Please enter a valid Tactical Callsign.';
    } else{
        $tactical = $input_tactical;
    }
    
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = 'Please enter an name.';     
    } else{
        $name = $input_name;
    }
    
    // Validate status
    $input_status = trim($_POST["status"]);
    if(empty($input_status)){
        $status_err = "Please enter the current status.";     
   
    } else{
        $status = $input_status;
    }
    
    // Validate adult
    $input_adult = trim($_POST["adult"]);
    if(empty($input_adult)){
        $adult_err = "Number Of Adults Sheltered.";     
   
    } else{
        $adult = $input_adult;
    }
    
    // Validate children
    $input_children = trim($_POST["children"]);
    if(empty($input_children)){
        $children_err = "Number of Children Sheltered.";     
   
    } else{
        $children = $input_children;
    }
    
    // Validate LEO Present
    $input_leo = trim($_POST["leo"]);
    if(empty($input_leo)){
        $leo_err = "Number of Law Inforcent present.";     
   
    } else{
        $leo = $input_leo;
    }
    
    // Validate EMS Present
    $input_ems = trim($_POST["ems"]);
    if(empty($input_ems)){
        $ems_err = "Number Of EMS Present.";     
   
    } else{
        $ems = $input_ems;
    }
    
    // Validate Pet Population
    $input_pets = trim($_POST["pets"]);
    if(empty($input_pets)){
        $pets_err = "Number Of Pets Present.";     
   
    } else{
        $pets = $input_pets;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($name_err) && empty($status_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO shelters (name, name, status, adults, children, leo ,ems, pets) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_name, $param_status, $param_adult);
            
            // Set parameters
            $param_name = $name;
            $param_name = $name;
            $param_status = $status;
            $param_status = $adult;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ../Shelter/index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Shelter Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to Shelter Record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Tactical</label>
                            <input type="text" name="tactical" class="form-control" value="<?php echo $tactical; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name</label>
                            <input type="text"  name="name" class="form-control"><?php echo $name; ?></textarea>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($status_err)) ? 'has-error' : ''; ?>">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo $status; ?>">
                            <span class="help-block"><?php echo $status_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($adult_err)) ? 'has-error' : ''; ?>">
                            <label>Adults Present</label>
                            <input type="text" name="adult" class="form-control" value="<?php echo $adult; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($children_err)) ? 'has-error' : ''; ?>">
                            <label>Children Present</label>
                            <input type="text" name="children" class="form-control" value="<?php echo $children; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($leo_err)) ? 'has-error' : ''; ?>">
                            <label>LEO Present</label>
                            <input type="text" name="leo" class="form-control" value="<?php echo $leo; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($ems_err)) ? 'has-error' : ''; ?>">
                            <label>EMS Present</label>
                            <input type="text" name="ems" class="form-control" value="<?php echo $ems; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($pets_err)) ? 'has-error' : ''; ?>">
                            <label>Pets Present</label>
                            <input type="text" name="pets" class="form-control" value="<?php echo $pets; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>