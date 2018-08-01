<?php
  session_start();
  require('connect.php');
  if(@$_SESSION["ad_username"])
  {$ad_username=@$_SESSION['ad_username'];
	echo nl2br("\n\n\nWelcome,$ad_username");
?>
<html>
<head>
<title>
Home Page Admin
</title>
</head>
<body>
<center>
<?php
require('top_nav_admin.php');
require('connect.php');
$search_user=@$_POST['search_user'];
$sucess="";
$user_not="";
$no_enter="";
if(isset($_POST['search']))
{
	if($search_user)
	{
		$check=mysqli_query($connect,"SELECT * FROM users where username='".$search_user."'");
		$row=mysqli_num_rows($check);
		if($row==0)
		{
			$user_not="Username not found";
		}
		else if($row!=0)
		{
			$row2=mysqli_fetch_array($check);
			{
				$branch=$row2['branch'];
				$profile_pic=$row2['profilepic'];
			}
			$username=$search_user;
			echo nl2br("Search Query Result");
			echo '<img src="data:image/jpeg;base64,'.base64_encode($profile_pic).'" width="50" height="50">'; 
			echo nl2br("\nUsername:$username\n\nBranch:$branch");
			$check3=mysqli_query($connect,"SELECT * FROM users where username='".$username."'");
			while($row3=mysqli_fetch_array($check3))
				{
					$date=$row3['date'];
					$email=$row3['email'];
				}
				echo nl2br("\n\nEmail:$email\n\n");
			$question_no=0;
			$check=mysqli_query($connect,"SELECT * FROM questions where username='".$username."'");
			while($row=mysqli_fetch_array($check))
				{
					$question_no++;
				}
			echo nl2br("\n\nQuestions posted globally:"."$question_no");
			$answer_no=0;
			$check2=mysqli_query($connect,"SELECT * FROM answers where username='".$username."'");
			while($row2=mysqli_fetch_array($check2))
				{
					$answer_no++;
				}
			echo nl2br("\n\nAnswers posted globally:"."$answer_no");
			$branch_question_no=0;
			$check=mysqli_query($connect,"SELECT * FROM branchquestions where busername='".$username."'");
			while($row=mysqli_fetch_array($check))
				{
					$branch_question_no++;
				}
			echo nl2br("\n\nQuestions posted in branch:"."$branch_question_no");
			$branch_answer_no=0;
			$check3=mysqli_query($connect,"SELECT * FROM branchanswers where busername='".$username."'");
			while($row2=mysqli_fetch_array($check3))
				{
					$branch_answer_no++;
				}
			echo nl2br("\n\nAnswers posted in branch:"."$branch_answer_no");
			?>
			<br/><br/>
			<a href="user_profile.php?action=du">Delete User</a><br/><br/>
			<?php
			if(@$_GET['action']=='du')
 			{
				$check4=mysqli_query($connect,"DELETE FROM users where username='".$username."'");
				$check5=mysqli_query($connect,"SELECT * from questions where username='".$username."'");
				while($row8=mysqli_fetch_array($check5))
				{
					$question_id=$row8['questionid'];
				}
				$check6=mysqli_query($connect,"DELETE from answers where questionid='".$question_id."'");
				$check7=mysqli_query($connect,"DELETE FROM questions where username='".$username."'");
				$check8=mysqli_query($connect,"DELETE FROM answers where username='".$username."'");
				if($check4 or $check6 or $check7 or $check8)
				{
					echo "$search_user deleted sucessfully";
				}
			}
		}
	}
	else
	{
		$no_enter="Enter something first";
	}
}
?>
</center>
<form action="home_page_admin.php" method="POST">
	<br/>
	Search for a user<br/><input type="text" name="search_user">
	<br/><input type="submit" name="search" value="POST"><br/><?php echo $sucess; ?><?php echo $no_enter; ?><?php echo $user_not; ?>
	<br/>
</form>
</body>
</html>
<?php
}
else
  {
    echo "you must be logged in";
  }
?>