<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_SESSION['user'] && $_SESSION['user']['role'] == 'teacher') {
		$course_name = $_POST['name'];
		$course_type = $_POST['type'];
		$course_skill = $_POST['skill'];
		$course_level = $_POST['level'];

		$file = $_FILES['file'];
		$file_name = $file['name'];
		$file_tmp = $file['tmp_name'];
		$file_destination = "uploads/".$file_name;
		move_uploaded_file($file_tmp, $file_destination);

		$sql = "INSERT INTO course (name, type, skill, level, file) VALUES ('$course_name', '$course_type', '$course_skill', '$course_level', '$file')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "Course added successfully";
			//timeout
			header("Refresh: 2; url=teacher.html");
		} else {
			echo "Error adding course";
			header("Refresh: 2; url=create.html");
		}
	}
}
?>