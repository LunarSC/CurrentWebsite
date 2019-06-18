<?php
include 'db_connection.php';

$conn = OpenCon();

//Input boxes from html
$ssn = $_GET['ssn'];
$fName = $_GET['fName'];
$mInit = $_GET['mInit'];
$lName = $_GET['lName'];
$address = $_GET['address'];
$dob = $_GET['dob'];
$payType = $_GET['payType'];
$payRate = $_GET['payRate'];
// Build the where clause, 42 = 42 allows the query to build with no parameters
$where = "WHERE 42=42 ";

// Allows for searching when some fields are blank
if(!empty($ssn)) {
	$where .= " AND `ssn` LIKE '$ssn%'";
}


if(!empty($fName)) {
	$where .= " AND `fName` LIKE '$fName%'";
}
if(!empty($mInit)) {
	$where .= " AND `mInit` LIKE '$mInit%'";
}
if(!empty($lName)) {
	$where .= " AND `lName` LIKE '$lName%'";
}
if(!empty($address)) {
	$where .= " AND `address` LIKE '$address%'";
}
if(!empty($dob)) {
	$where .= " AND `dob` LIKE '$dob%'";
}
if(!empty($payType)) {
	$where .= " AND `payType` LIKE '$payType%'";
}
if(!empty($payRate)) {
	$where .= " AND `payRate` LIKE '$payRate%'";
}
$where .= " ORDER BY fName ASC";

// Query generation
$sql = "SELECT `ssn`, `fName`, `mInit`, `lName`, `address_`, `dob`, `payType`, `payRate` FROM `Employee` $where";

// Get results of query
$result = $conn->query($sql);

// Tuple readability counter
$numRows = mysqli_num_rows($result);

// Readability integration for my website, header and html elements
echo 		"<div class=\"header\">".
			"<div class=\"navBar\">".
				"<nav class=\"bar\">".
					"<div class=\"icons_64\">".
						"<a class=\"iconLink\" href=\"http://www.tompedraza.com\">".
							"<div class=\"icon\">".
								"<img id=\"homeIcon\" src=\"img/icons/homeIcon.png\" alt width=\"32\" height=\"32\"></img>".
							"</div>".
						"</a>".
						"<a class=\"iconLink\" href=\"http://tompedraza.com/descriptions/About.html\">".
							"<div class=\"icon\" id=\"homeContainer\">".
								"<img id=\"resumeIcon\" src=\"img/icons/resumeIcon.png\" alt width=\"32\" height=\"32\" ></img>".
							"</div>".
						"</a>".
						"<a class=\"iconLink\" href=\"mailto:LunarSC95@gmail.com\">".
							"<div class=\"icon\">".
								"<img id=\"contactIcon\" src=\"img/icons/contactIcon.png\" alt width=\"32\" height=\"32\" ></img>".
							"</div>".
						"</a>".
						"<a class=\"iconLink\" href=\"https://www.linkedin.com/in/thomas-pedraza-349554148/\">".
							"<div class=\"icon\">".
								"<img id=\"linkdInIcon\" src=\"img/icons/linkdInIcon.png\" alt width=\"32\" height=\"32\" ></img>".
							"</div>".
						"</a>".
					"</div>".
				"</nav>".
			"</div>".
			"<div class=\"logo\">".
				"<div class=\"grid--center\">".
					"<div class=\"pageBanner\">".
"".
						"<h1>Tom Pedraza</h1>".
"".
						"<span class=\"bannerSubTitle\">Software Developer</span>".
					"</div>".
				"</div>".
			"</div>".
		"</div>".
		"<h2 align-text=center>". $numRows. " results </h2>".
		"<div class=\"grid\"> ";

// Displays the entries in a neat format
if($numRows > 0) {
	$i = 1;
	while($row = mysqli_fetch_assoc($result)) {
		echo "<div class=\"grid1 grid_item\">".
					 "<div class=\"dbMember\"> ".
					 "<p class=\"dbEntry\" id=\"resNum\"> #". $i. " </p>".
						 "<p class=\"dbEntry\" id=\"\"> SSN: " . $row["ssn"]. " </p>".
						 "<p class=\"dbEntry\" id=\"fName\"> First name: " . $row["fName"]. " </p>".
						 "<p class=\"dbEntry\" id=\"midIni\"> Middle initial: ". $row['mInit']. " </p>".
						 "<p class=\"dbEntry\" id=\"lName\"> Last name: ". $row["lName"].  " </p>".
						 "<p class=\"dbEntry\" id=\"add\"> Address: " . $row["address_"]. " </p>".
						 "<p class=\"dbEntry\" id=\"dob\"> Date of birth: " . $row["dob"]. " </p>".
						 "<p class=\"dbEntry\" id=\"pType\"> Pay type: " . $row["payType"]. " </p>".
						 "<p class=\"dbEntry\" id=\"pRate\"> Pay rate: " . $row["payRate"]. "</p>".
					 "</div>".
				 "</div>";
	$i += 1;
	}

// If no entries are found
} else {
	echo "<div class=\"grid4 grid_item\">".
		 		"<div class=\"dbMember\"> ".
			 		"Sorry, no entries with that information!".
		 	  "</div>".
	    "</div>";
}

// Closes out the html document
	echo "</div>".
	"</body>".
	"</html>";

CloseCon($conn);

?>
