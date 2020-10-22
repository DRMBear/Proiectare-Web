


<form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<h2>Lista studentilor imaginari: - Dragomir Razvan Mihai</h2>
	Student: <input type="text" name="Student" value="<?php echo $Student; ?>">
	<input type="submit" name="submit" value="Submit">
</form>

<?php

//Conection to database
$servername = "remotemysql.com";
$username = "eBQcIJMD67";
$password = "ZsREhJKhFn";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if (empty($_POST["Student"])) {
	$StudentErr = "Name is required";
} else {
	$Student = $_POST["Student"];
	if (!preg_match("/^[a-zA-Z-' ]*$/", $Student)) {
		$StudentErr = "Only letters and white space allowed";
	}
}

if ($_POST["Student"] != "") {
	$sql = "INSERT INTO eBQcIJMD67.table (Student)
		VALUES ('$Student')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$Student = "";
}

?>

<form class="delete" action="" method="post">
	id: <input type="number" name="name" value="<?php echo $numberId; ?>">
	<button type="submit" name="sub" value="">Delete</button>

	<?php


	if (isset($_POST['name'])) {


		$sql = "DELETE FROM eBQcIJMD67.table WHERE ID=" . $_POST['name'];
		if ($conn->query($sql) === TRUE) {
			echo "Record deleted successfully";
		} else {
			echo "Error deleting record: " . $conn->error;
		}
	}

	?>
</form>

<form class="delete" action="" method="post">
	id: <input type="number" name="edit" value="<?php echo $EditNumberID; ?>">
	Student: <input type="text" name="edidoi" value="<?php echo $StudentName; ?>">
	<button type="submit" name="sub" value="">Edit</button>

	<?php


	if (isset($_POST['edit'])) {

		$StudentName = $_POST['edidoi'];
		$sql = "UPDATE eBQcIJMD67.table SET Student= '$StudentName' WHERE ID =" . $_POST['edit'];
		if ($conn->query($sql) === TRUE) {
			echo "Record edited successfully";
		} else {
			echo "Error editing record: " . $conn->error;
		}
	}



	$sql = "SELECT ID, Student FROM eBQcIJMD67.table";
	$result = $conn->query($sql);
	echo "<br><h2>Your Input:</h2>";
	echo '<table><tr>';
	echo '<th>' . "ID " . '</th>';
	echo '<th>' . "Student " . '</th>';

	echo '</tr><tbody>';
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			echo '<tr>';
			echo "<td>" . $row["ID"] . '</td>' . "<td>" . $row["Student"] . '</td>';
			echo '</tr>';
		}
	} else {
		echo "0 results";
	}



	?>
</form>