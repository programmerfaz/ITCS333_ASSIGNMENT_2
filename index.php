<?php

//fetching data from the bahrain open data portal API
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);
$result = json_decode($response, true);

foreach ($result['results'] as $data) {
    $year = $data['year']; //year in which the students were enrolled
    $semester = $data['semester']; //semester where students are enrolled
    $program = $data['the_programs']; //the programs where students join
    $nationality = $data['nationality']; //nationality of the students
    $colleges = $data['colleges']; //college 
    $number_of_student = $data['number_of_students']; //number of students in that semester enrolled in a particular year
    // echo "year = ".$year. " semester ". $semester. " program = ". $program. " nationality= ".$nationality. " colleges =".$colleges." number of students = ".$numofstd ."<br><br<>";   
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table display</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 id="heading1">Students statistics studying at <span id ="uob-h1">U.o.B</span></h1>
    <table border="2">
        <thead>
            <th>Year</th>
            <th>Semester</th>
            <th>The Program</th>
            <th>Nationality</th>
            <th>Colleges</th>
            <th>Number of Students</th>
        </thead>
        <tbody>
            <?php
            echo "<tr>";
            foreach ($result['results'] as $data) {
                $year = $data['year']; //year in which the students were enrolled
                $semester = $data['semester']; //semester where students are enrolled
                $program = $data['the_programs']; //the programs where students join
                $nationality = $data['nationality']; //nationality of the students
                $colleges = $data['colleges']; //college 
                $number_of_student = $data['number_of_students']; //number of students in that semester enrolled in a particular year
                // echo "year = ".$year. " semester ". $semester. " program = ". $program. " nationality= ".$nationality. " colleges =".$colleges." number of students = ".$numofstd ."<br><br<>";  
                echo "<td>" . $year . "</td>";
                echo "<td>" . $semester . "</td>";
                echo "<td>" . $program . "</td>";
                echo "<td>" . $nationality . "</td>";
                echo "<td>" . $colleges . "</td>";
                echo "<td>" . $number_of_student . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>