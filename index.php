<?php
include 'function.php';
if(isset($_POST['insert'])){
	$studname = $_POST['studname'];
	$subname = $_POST['subname'];
	$marks = $_POST['marks'];
	$sql = "INSERT INTO `stud_db`(`studname`, `subname`, `marks`) VALUES ('$studname','$subname',$marks)";
	$res = mysqli_query($conn,$sql);
			if($res){
				echo "Data Inserted";
			}
			else{
				echo "Data not Inserted";
			}
}
if(isset($_POST['update'])){
	$stname = $_POST['stname'];
	$uname = $_POST['usubname'];
	$umarks = $_POST['umarks'];
	$sql = "UPDATE `stud_db` SET `marks`= $umarks WHERE `studname` = '$stname' and `subname` = '$uname'";
	$res = mysqli_query($conn,$sql);
			if($res){
				echo "Data Updated";
			}
			else{
				echo 'Not inserted';
			}
}
if(isset($_POST['delete'])){
	$dstname = $_POST['dstname'];
	$dsub = $_POST['dsub'];
	$sql = "DELETE FROM `stud_db` WHERE `studname` = '$dstname' and `subname` = '$dsub'";
	$res = mysqli_query($conn,$sql);
			if($res){
				echo "Data Deleted";
			}
			else{
				echo 'Data not Deleted';
			}
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Student Data Base</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="jumbotron"style="text-align:center;">
			Student Mark Entry System
		</div>
		
	</div>
	<div class ="row">
	<div class ="col-lg-4">
	<label><h1>
	To Insert</h1>
	</label>
	<form action="" method="post" class = "form-vertical">
	<table>
	<tr>
	<th>
	<label>Student Name</label></th><td><input type ="text" name ="studname" class="form-control"required/></td></tr>
	<tr>
	<th>
	<label>Subject Name</label></th><td><select name ="subname" class = "form-control"/><option value="English">English</option><option value = "Tamil">Tamil</option></select></td></tr>
	<tr>
	<th>
	<label>Marks</label></th><td><input type = "number" name ="marks" class = "form-control"required/></td></tr>
	<tr>
	<td colspan = "2">
	<input type ="submit" name = "insert" value = "Insert" class = "form-control"/></td></tr>
	</table>
	</form>
	</div>
	<div class ="col-lg-4">
	<label><h1>Update</h1></label>
	<form action ="" method ="post" class = "form-vertical">
	<table>
	<tr>
	<th>
	Student Name</th>
	<td><input type="text" name ="stname" class = "form-control"required/></td></tr>
	<tr>
	<th>
	Subject name</th>
	<td>
	<select name ="usubname" class = "form-control"/><option value="English">English</option><option value = "Tamil">Tamil</option></select></td></tr>
		<tr>
	<th>
	Marks</th>
	<td>
	<input type ="number" name ="umarks" class = "form-control" required/></td></tr>
	<tr>
	<td colspan = "2">
	<input type ="submit" name ="update" value = "Update"class ="form-control" /></td></tr>
	</table>
	</form>
	</div>
	<div class ="col-lg-4">
	<label><h1>Delete</h1></label>
	<form action = "" method = "post" class = "form-vertical">
	<table>
	<tr>
	<th>Student Name</th><td><input type = "text" name = "dstname" class = "form-control"/></td></tr>
	<tr>
	<th>Subject Name</th><td><select name ="dsub" class = "form-control"/><option value="English">English</option><option value = "Tamil">Tamil</option></select></td>
	</tr>
	<td colspan = "2">
	<input type ="submit" name ="delete" value = "Delete"class = "form-control"/>
	</div>
	</div>
	<div class ="row">
	<div class = "col-lg-12">
	<label><h1 style="text-align:center;">View</h1></label>
	<form action ="" method ="post"class ="form-vertical">
	<input type ="submit" name ="view" value = "View ALL"class ="form-control"/>
	</form>
<?php
if(isset($_POST['view'])){
	$i = 1;
	?>
	<table>
	<thead>
	<th>
	Student Name</th>
	<th>
	Subject Name</th>
	<th>Marks</th>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM `stud_db` ";
	$res = mysqli_query($conn,$sql);
	while($rest = mysqli_fetch_array($res)){
		?>
		<td>
		<?php echo $rest['studname'];?></td>
		<td>
		<?php echo $rest['subname'];?></td>
		<td>
		<?php echo $rest['marks'];?></td>
		<?php
		$i = $i + 1;
	}
	?>
	</tbody>
	</table>
	<?php
}
?>	
</div>
	</div>
</div>
</body>
</html>