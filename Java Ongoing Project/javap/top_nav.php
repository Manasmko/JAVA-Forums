<style>
/* Add a black background color to the top navigation */
.topnav {
    background-color: #333;
    overflow: hidden;
	position:fixed;
	top: 0;
    width: 100%;
}

/* Style the links inside the navigation bar */
.topnav a {
    float: left;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
    background-color: #ddd;
    color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
    background-color: #4CAF50;
    color: white;
}
img
{
	display: block;
	margin-left:auto;
	margin-right:auto;
	margin-top:20px;
}
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}


.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}


.dropdown-content a:hover {background-color: #ddd}


.dropdown:hover .dropdown-content {
    display: block;
}


.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<div class="topnav">
  <a class="active" href="home_page.php">Home Page</a>
  <a href="your_answers.php">Your Answers</a>
  <a href="your_questions.php">Your questions</a>
  <a href="branch.php"><?php echo $_SESSION['branch']; ?></a>
  <a style="float:right" href="logout.php">Log Out</a>
  <a style="float:right" href="user_profile.php">Profile</a>
</div>
<br/>
 