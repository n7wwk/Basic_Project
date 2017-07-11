<?php
// Include config file
require_once '../includes/config.php';
 
// Define variables and initialize with empty values
//$name = $address = $salary = "";
$cad = $name = $location = "";
//$name_err = $address_err = $salary_err = "";
 $cad_err = $name_err = $location_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate CAD
    $input_cad = trim($_POST["cad"]);
    if(empty($input_cad)){
        $cad_err = "Please enter a CAD.";
    } elseif(!filter_var(trim($_POST["cad"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $cad_err = 'Please enter a valid CAD.';
    } else{
        $cad = $input_cad;
    }
    
    // Validate Name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = 'Please enter an Name.';     
    } else{
        $locattion = $input_name;
    }
    
    // Validate Location
    $input_location = trim($_POST["location"]);
    if(empty($input_location)){
        $location_err = "Please enter the Location.";     
    
    } else{
        $location = $input_location;
    }
    
    // Check input errors before inserting in database
    if(empty($id_err) && empty($name_err) && empty($location_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO dispach (id, name, location) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_id, $param_name, $param_location);
            
            // Set parameters
            $param_name = $cad;
            $param_address = $name;
            $param_salary = $location;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
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
    <title>Create Record</title>
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
                    <p>Please fill this form and submit to add Resources record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($cad_err)) ? 'has-error' : ''; ?>">
                            <label>CAD</label>
                            <input type="text" name="cad" class="form-control" value="<?php echo $cad; ?>">
                            <span class="help-block"><?php echo $cad_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Resource </label>
                            <textarea name="name" class="form-control"><?php echo $name; ?></textarea>
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($location_err)) ? 'has-error' : ''; ?>">
                            <label>Location</label>
                            <input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
                            <span class="help-block"><?php echo $location_err;?></span>
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