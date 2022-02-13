<?php 

require 'db_connect.php';

//get all available program list from the db table
$program_sql = "SELECT * FROM new_students GROUP BY program";

$program_list = $connect->query($program_sql);

if($program_list->num_rows > 0){
    //Declare this mutidimensional data array to hold our data
	$data = array();
    //Key of this array
	$key = 0;
    //Program wise loop to get the total students of that program
	foreach($program_list as $program_row){
		//increment the $key each time for each program
		$key += 1;
        //assign the key if it does not assigned
		if (!isset($data[$key])) {
	        $data[$key] = array();
	    }
        //Get the program, faculty credit hours
        $program = $program_row['program'];
        $faculty = $program_row['faculty'];
        $chr = $program_row['chr'];

        //assign those values to our data array
	    $data[$key]['program'] = $program;
        $data[$key]['faculty'] = $faculty;
        $data[$key]['chr'] = $chr;


        //Get students for each program and assign to the data array
	    $std_sql = "SELECT * FROM new_students WHERE program='$program'";
	    $std_list = $connect->query($std_sql);
	    if($std_list->num_rows > 0){
	    	while($std_row = $std_list->fetch_assoc()){
	    		$data[$key]['students'][] = $std_row;
	    	}
	    }
	}
}

$connect->close();

?>


