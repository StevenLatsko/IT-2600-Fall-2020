<?php

	class Course{

		public $course_number;
		public $course_name;
		public $semester;

		function __construct($course_number, $course_name) {
			$this->course_number = $course_number;
			$this->course_name = $course_name;
		}

		function display_course(){
			echo "Course Number ".$this->course_number."<br>";
			echo "Course Name ".$this->course_name."<br>";
			echo "Department ".$this->department."<br>";
			echo "Semester ".$this->semester."<br>";
			echo "Year ".$this->year."<br>";
			echo "CRN ".$this->crn."<br>";
			echo "Instructor ".$this->instructor."<br>";
		}
	}

	$course = new Course("2600", "E-Business Programming");

	$course->department = "Information Technology";
	$course->semester = "Fall";
	$course->year = "2020";
	$course->crn = "82781";
	$course->instructor = "Largent, Wayne";

	$course->display_course();

?>