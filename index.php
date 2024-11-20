<?php

//fetching data from the bahrain open data portal API
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";
$response = file_get_contents($url);
$result = json_decode($response,true);

// $year = $result['results'][0]['year'];
foreach ($result['results'] as $data){
    $pattern = '/\w*/bachelor\w*';
    $year = $data['year'];
    $semester = $data['semester'];
    $program = $data['the_programs'];
    echo $year. " ". $semester. " ". $program. "<br><br<>";
    // preg_match_all($pattern,$program,$matches);
    // echo implode($matches[0])."<br>";
}

?>