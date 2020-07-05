<?php

session_start();
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



  
require 'vendor/autoload.php';
$app = new \Slim\App;
include 'config.php';

$app->post('/allLanguages_input',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `language`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/getQues',  function(Request $request, Response $response) {
	$conn = connection();
	mysqli_set_charset( $conn , 'utf8');
	$languageName = $request->getParam('languageName');
	$sql = "SELECT * FROM `language` WHERE language_name='$languageName'";

	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	  
	echo json_encode($data ,TRUE );
});

$app->post('/subject-courses',  function(Request $request, Response $response) {
	$conn = connection();
	$subject = $request->getParam('subject');
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `course` where subject='$subject' OR subject='All Subject'";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/exam-courses',  function(Request $request, Response $response) {
	$conn = connection();
	$branch = $request->getParam('branch');
	$exam = $request->getParam('exam');
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `course` where branch='$branch' AND exam='$exam'";
	 
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/branch-courses',  function(Request $request, Response $response) {
	$conn = connection();
	$branch = $request->getParam('branch');
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `course` where branch='$branch'";
	 
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/freepdf',  function(Request $request, Response $response) {
	$conn = connection();
	$branch = $request->getParam('branch');
	$year = $request->getParam('year');
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `pdf` where branch='$branch' AND year='$year'";
	 
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/add_course',  function(Request $request, Response $response) {
	$conn = connection();
	$cname = $request->getParam('cname');
	$cdesc = $request->getParam('cdesc');
	$cexam = $request->getParam('cexam');
	$cprice = $request->getParam('cprice');
	$cbranch = $request->getParam('cbranch');
	$csubject = $request->getParam('csubject');
	$cduration = $request->getParam('cduration');
	$cimage = $request->getParam('cimage');
	$cvideo = $request->getParam('cvideo');
	
	 
	 // echo $sql;
	 $sql = "INSERT INTO `course`( `name`,`description`,`introvideo`,`price`,`duration`,`exam`,`branch`,`subject`,`image`) VALUES ('$cname','$cdesc','$cvideo','$cprice','$cduration','$cexam','$cbranch','$csubject','$cimage')";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/add_testimonial',  function(Request $request, Response $response) {
	$conn = connection();
	$name = $request->getParam('name');
	$email = $request->getParam('email');
	$mob = $request->getParam('mob');
	$course = $request->getParam('course');
	$testimonial = $request->getParam('testimonial');
	$image = $request->getParam('image');
	
	 
	 // echo $sql;
	 $sql = "INSERT INTO `testimonials`( `name`,`email`,`mob`,`course`,`testimonial`,`image`) VALUES ('$name','$email','$mob','$course','$testimonial','$image')";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->post('/add_news',  function(Request $request, Response $response) {
	$conn = connection();
	$title = $request->getParam('title');
	$desc = $request->getParam('desc');
	$exam = $request->getParam('exam');
	$image = $request->getParam('image');
	
	 
	 // echo $sql;
	 $sql = "INSERT INTO `news`( `title`,`exam`,`description`,`image`) VALUES ('$title','$exam','$desc','$image')";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->post('/add_slider',  function(Request $request, Response $response) {
	$conn = connection();
	$header1 = $request->getParam('header1');
	$header2 = $request->getParam('header2');
	$header3 = $request->getParam('header3');
	$simage = $request->getParam('simage');
	
	
	 
	 // echo $sql;
	 $sql = "INSERT INTO `slider`( `header1`,`header2`,`header3`,`simage`) VALUES ('$header1','$header2','$header3','$simage')";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->post('/add_video',  function(Request $request, Response $response) {
	$conn = connection();
	
	$course = $request->getParam('course');
	$videoname = $request->getParam('videoname');
	$cvideo = $request->getParam('cvideo');
	$subject = $request->getParam('subject');
	$unit = $request->getParam('unit');
	$videonumber = $request->getParam('videonumber');
	$videostatus = $request->getParam('videostatus');
	 
	  
	 $sql = "INSERT INTO `coursevideo`( `course`,`video`,`vname`,`subject`,`unit`,`vnumber`,`status`) VALUES ('$course','$cvideo','$videoname','$subject','$unit','$videonumber','$videostatus')";
			$UserInsert = mysqli_query($conn,$sql);
			
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/add_pdf',  function(Request $request, Response $response) {
	$conn = connection();
	
	$pdfname = $request->getParam('pdfname');
	$pdf = $request->getParam('pdf');
	$exam = $request->getParam('exam');
	$branch = $request->getParam('branch');
	$subject = $request->getParam('subject');
	$year = $request->getParam('year');
	 
	  
	 $sql = "INSERT INTO `pdf`( `name`,`file`,`exam`,`branch`,`subject`,`year`) VALUES ('$pdfname','$pdf','$exam','$branch','$subject','$year')";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/allvideos',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `coursevideo`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/allnews',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `news`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});

$app->post('/allpdf',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `pdf`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/allsliders',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `slider`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num1 = mysqli_num_rows($fetchUsers);
	if($num1 != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/categoryvideos',  function(Request $request, Response $response) {
	$conn = connection();
	$CNAME = $request->getParam('name');
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `coursevideo` WHERE `course`='$CNAME' ORDER BY timestamp DESC";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/course_detail',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('cid');
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `course` WHERE `cid`='$ID' ";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/news_detail',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('id');
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `news` WHERE `id`='$ID' ";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});

$app->post('/allcourses',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `course` ";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/delcourse',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('cid');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `course` WHERE `cid` ='$ID'";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/deltestimonial',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('tid');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `testimonials` WHERE `tid` ='$ID'";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->post('/delpdf',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('id');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `pdf` WHERE `id` ='$ID'";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/delslider',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('id');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `slider` WHERE `id` ='$ID'";
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->post('/delvideo',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('id');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `coursevideo` WHERE `id` ='$ID'" ;
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->post('/editcourse',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('cid');
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `course` WHERE `cid` ='$ID'";
	 $fetchUsers = mysqli_query($conn,$sql);
	 $array = array();
	 $data=array();
	 $num = mysqli_num_rows($fetchUsers);
	 if($num != 0 ){
		 while($row = mysqli_fetch_assoc($fetchUsers)){
		 array_push($data,$row);
	  }
	 }
	 echo json_encode($data ,true);
});
$app->post('/updatecourse',  function(Request $request, Response $response) {
	$conn = connection();
	$cid = $request->getParam('cid');
	$cname = $request->getParam('cname');
	$cdesc = $request->getParam('cdesc');
	$cexam = $request->getParam('cexam');
	$cprice = $request->getParam('cprice');
	$cbranch = $request->getParam('cbranch');
	$csubject = $request->getParam('csubject');
	$cduration = $request->getParam('cduration');
	$cimage = $request->getParam('cimage');
	$cvideo = $request->getParam('cvideo');
	
	 
	 // echo $sql;
	 $sql = "UPDATE `course` SET `name`='$cname',`description`='$cdesc',`introvideo`='$cvideo',`price`='$cprice',`duration`='$cduration',`exam`='$cexam',`branch`='$cbranch',`subject`='$csubject',`image`='$cimage'  WHERE `cid`='$cid'";
	
	 			
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/user_profile_update',  function(Request $request, Response $response) {
	$conn = connection();
	
	$name = $request->getParam('name');
	$email = $request->getParam('email');
	$mobile = $request->getParam('mobile');
	$quali = $request->getParam('quali');
	 
	 // echo $sql;
	 $sql = "UPDATE `users` SET `name`='$name',`mobile`='$mobile',`quali`='$quali' WHERE `emailid`='$email'";
	
	 			
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";
            }
	
	echo json_encode($error);
});

$app->post('/approvetestimonial',  function(Request $request, Response $response) {
	$conn = connection();
	$ID = $request->getParam('cid');
	
	
	 
	 // echo $sql;
	 $sql = "UPDATE `testimonials` SET `status`='1'  WHERE `tid`='$ID'";
	
	 			
	$UserInsert = mysqli_query($conn,$sql);
	if($UserInsert==1){
		$error['result'] ="True";
	}
	else{
		$error['result'] = "False";

	}
	
	echo json_encode($error);
});

$app->post('/allexam',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `exam`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/allbranch',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `branch`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/allsubject',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `subject`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/allusers',  function(Request $request, Response $response) {
	$conn = connection();
	
	
	 
	 // echo $sql;
	 $sql = "SELECT * FROM `users`";
	$fetchUsers = mysqli_query($conn,$sql);
	$array = array();
	$data=array();
	$num = mysqli_num_rows($fetchUsers);
	if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
		array_push($data,$row);
	 }
	}
	echo json_encode($data ,true);
});
$app->post('/checkpw',  function(Request $request, Response $response) {
	$conn = connection();
	$rstring = $request->getParam('rstring');
	$oldpw = $request->getParam('oldpw');
	$npw = $request->getParam('npw');
	
	 // echo $sql;
	 $sql = "SELECT * FROM `admin` WHERE `rstring`='$rstring'";
	 $fetchUsers = mysqli_query($conn,$sql);
	 $array = array();
	 $data=array();
	 $num = mysqli_num_rows($fetchUsers);
	
	 if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
			array_push($data,$row);
		 }
		if($data[0]['password']==$oldpw)
		{
			$sql2 = "UPDATE `admin` SET `password`='$npw'  WHERE `rstring`='$rstring'";
	
	 			
			$UserInsert = mysqli_query($conn,$sql2);
			
			
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False1";

			}
		}
		else{
			$error['result'] = "False";
		}
		 
	}
	
	echo json_encode($error);
	
});
$app->post('/changepassword',  function(Request $request, Response $response) {
	$conn = connection();
	$name = $request->getParam('name');
	$opassword = $request->getParam('opassword');
	$npassword = $request->getParam('npassword');
	
	 // echo $sql;
	 $sql = "SELECT * FROM `users` WHERE `name`='$name'";
	 $fetchUsers = mysqli_query($conn,$sql);
	 $array = array();
	 $data=array();
	 $num = mysqli_num_rows($fetchUsers);
	
	 if($num != 0 ){
		while($row = mysqli_fetch_assoc($fetchUsers)){
			array_push($data,$row);
		 }
		if($data[0]['password']==$opassword)
		{
			$sql2 = "UPDATE `users` SET `password`='$npassword'  WHERE `name`='$name'";
	
	 			
			$UserInsert = mysqli_query($conn,$sql2);
			
			
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False1";

			}
		}
		else{
			$error['result'] = "False";
		}
		 
	}
	
	echo json_encode($error);
	
});

$app->post('/delexam',  function(Request $request, Response $response) {
	$conn = connection();
	$eid = $request->getParam('eid');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `exam` WHERE `eid` ='$eid'" ;
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/delbranch',  function(Request $request, Response $response) {
	$conn = connection();
	$bid = $request->getParam('bid');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `branch` WHERE `bid` ='$bid'" ;
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});
$app->post('/delsubject',  function(Request $request, Response $response) {
	$conn = connection();
	$sid = $request->getParam('sid');
	
	
	 
	 // echo $sql;
	 $sql = "DELETE FROM `subject` WHERE `sid` ='$sid'" ;
			$UserInsert = mysqli_query($conn,$sql);
			if($UserInsert==1){
				$error['result'] ="True";
			}
			else{
				$error['result'] = "False";

			}
	
	echo json_encode($error);
});

$app->run();