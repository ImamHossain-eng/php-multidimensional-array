<?php
require 'fetch_students.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List of Fall 2021</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            background-image: url('img/bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;    
        }
        .brand{
            background-image: url('img/hubexam.png');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .bg-img{
            background-image: url('img/text_bg.jpg');
            background-repeat: no-repeat, repeat;
        }
    </style>
</head>
<body style="background-color:#F8f8f8;">
    
    <div class="container" style="background-color:#EFEFEF;">
        <!--header-->
        <div class="row">
            <div class="col-md-4 col-sm-12 brand">
                <!-- <img src="img/hubexam.png" alt="HUB EXAM" class="img w-100"> -->
            </div>
            <div class="col-md-8 col-sm-12 bg-img">
                <h2 style="margin-top: 2em;padding: 1em; color: #EFEFEF; font-weight: bold;">List of Students Enrolled in Fall 2021</h2>
            </div>
        </div>
         <!--end of header-->

         <br>

        <?php
        foreach($data as $key => $value){  
        ?>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h3 style="font-style: italic; font-weight: bold; color: #404241;">
                            <?php echo"<p>".$value["faculty"]."</p>" ?>
                        </h3>
                        <h5 style="font-style: italic; font-weight: 500; color: #C64A56;">
                            <?php echo"<p>".$value["program"]."</p>" ?>
                        </h5>
                        <p>Number of Enrolled Student(s) :: 
                            <?php echo"<span>".count($value["students"])."</span>" ?> 
                        </p>
                    </div>
                    <div class="col-md-3">
                        <p style="margin-top: 2em;">Required Credits :: 
                            <?php echo"<span>".$value["chr"]."</span>" ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-light tbl">
                    <thead class="table-border table-secondary">
                        <tr>
                            <th>Serial</th>
                            <th>Student ID</th>
                            <th>Student Name</th>
                            <th>Student Mobile</th>
                            <th>Email</th>
                            <th>Blood Group</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($value["students"] as $subkey => $subvalue){
                        ?>
                            <tr>
                                <?php
                                    $serial = $subkey+1;

                                    echo "<td>".$serial."</td>";
                                    echo "<td>".$subvalue["std_name"]."</td>";
                                    echo "<td>".$subvalue["std_id"]."</td>";
                                    echo "<td>".$subvalue["mobile"]."</td>";
                                    echo "<td>".$subvalue["email"]."</td>";
                                    echo "<td>".$subvalue["bg"]."</td>";
                                ?>
                            </tr>

                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
        }
        ?>
    

    </div> 
</body>
</html>