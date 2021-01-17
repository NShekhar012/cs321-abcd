<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Dances Details</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add Dance</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM dances";
                     // Executing and getting results
                    $mysqli_result = mysqli_query($link, $sql); 
                    // Checking results
                    if($mysqli_result){
                        if(mysqli_num_rows($mysqli_result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Dance Name</th>";
                                        echo "<th>Dance Type</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Did You Know?</th>";
                                        echo "<th>State</th>";
                                        echo "<th>Keywords</th>";
                                        echo "<th>Image</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                // Fetching each row from results and displaying
                                while($row = mysqli_fetch_array($mysqli_result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['Dance Name'] . "</td>";
                                        echo "<td>" . $row['Dance Type'] . "</td>";
                                        echo "<td>" . $row['Description'] . "</td>";
                                        echo "<td>" . $row['Did You Know?'] . "</td>";
                                        echo "<td>" . $row['State'] . "</td>";
                                        echo "<td>" . $row['Keywords'] . "</td>";
                                        echo "<td>" . $row['Image'] . "</td>";
                                        echo "<td>";
                                        // Adding links for Read, Update and Delete records. Images are coming from bootstrap CSS
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($mysqli_result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>