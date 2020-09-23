<?php 
require("../../require.php");

$output_arrays  = array();
$classes = array(
				'm-fc-event--danger m-fc-event--solid-warning',
				'm-fc-event--accent',
				'm-fc-event--primary',
				'm-fc-event--light m-fc-event--solid-primary',
				'm-fc-event--danger',
				'm-fc-event--info',
				'm-fc-event--warning',
				'm-fc-event--metal',
				'm-fc-event--solid-info m-fc-event--light',
				''
			);
$results = Planning::getByUser($_GET['id_user']);
foreach ($results as $result) {
	$array = array(
				"id" => $result['id_planning'],
		        "title" => $result['titre'],
		        "start" => $result['datedebut'],
		        "end" => $result['datefin'],
		        "className" => $classes[array_rand($classes)],
		        "description" => $result['description']
			);
	$object = (object) $array;
	array_push($output_arrays, $object);
}
echo json_encode($output_arrays);
?>