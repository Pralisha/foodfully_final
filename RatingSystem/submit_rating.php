<?php

//submit_rating.php
session_start();
$connect = new PDO("mysql:host=localhost;dbname=foodfully", "root", "");

if (isset($_POST["rating_data"])) {

	$data = array(
		':user_name' => $_SESSION['name'],
		':user_rating' => $_POST["rating_data"],
		':user_review' => $_POST["user_review"],
		':datetime' => time(),
		':donor_name' => $_GET['username']
	);

	$query = "
	INSERT INTO review_table 
	(user_name, user_rating, user_review, datetime, donor_name) 
	VALUES (:user_name, :user_rating, :user_review, :datetime, :donor_name)
	";

	$statement = $connect->prepare($query);

	$statement->execute($data);

	echo "Your Review & Rating Successfully Submitted";

}

if (isset($_POST["action"])) {
	$average_rating = 0;
	$total_review = 0;
	$five_star_review = 0;
	$four_star_review = 0;
	$three_star_review = 0;
	$two_star_review = 0;
	$one_star_review = 0;
	$total_user_rating = 0;
	$review_content = array();

	$username = $_GET['username'];
	$query = "
	SELECT * FROM review_table WHERE donor_name= '$username'
	ORDER BY review_id DESC
	";

	$result = $connect->query($query, PDO::FETCH_ASSOC);
	foreach ($result as $row) {
		$img_path = "";
		$name = $row['user_name'];
		$img_query = "SELECT * FROM acceptor WHERE username= '$name'";

		$img_result = $connect->query($img_query);
		$row1 = $img_result->fetch(PDO::FETCH_ASSOC);

		$review_content[] = array(
			'user_name' => $row["user_name"],
			'user_review' => $row["user_review"],
			'rating' => $row["user_rating"],
			'datetime' => date('l jS, F Y h:i:s A', $row["datetime"]),
			'img_path' => $row1['profile_pic']
		);

		if ($row["user_rating"] == '5') {
			$five_star_review++;
		}

		if ($row["user_rating"] == '4') {
			$four_star_review++;
		}

		if ($row["user_rating"] == '3') {
			$three_star_review++;
		}

		if ($row["user_rating"] == '2') {
			$two_star_review++;
		}

		if ($row["user_rating"] == '1') {
			$one_star_review++;
		}

		$total_review++;

		$total_user_rating = $total_user_rating + $row["user_rating"];

	}

	$average_rating = $total_user_rating / $total_review;

	$output = array(
		'average_rating' => number_format($average_rating, 1),
		'total_review' => $total_review,
		'five_star_review' => $five_star_review,
		'four_star_review' => $four_star_review,
		'three_star_review' => $three_star_review,
		'two_star_review' => $two_star_review,
		'one_star_review' => $one_star_review,
		'review_data' => $review_content
	);

	echo json_encode($output);

}

?>