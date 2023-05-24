<pre>
<?php
require_once("includes/connection.php");
print_r($_REQUEST);


// Assuming you have the $post array
$post = $_POST;
$post['total_tax'] = $post['mv_tax'] + $post['cess'] + $post['infra_cess'] + $post['permit_fee'] + $post['permit_variation'];

// Prepare the columns and values arrays
$columns = array_keys($post);
$values = array_values($post);

// Prepare the placeholders for the query
$placeholders = array_fill(0, count($columns), '?');
$placeholders = implode(', ', $placeholders);

// Prepare the insert query
$sql = "INSERT INTO formData (" . implode(', ', $columns) . ") VALUES (" . $placeholders . ")";

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind values to the query
$stmt->bind_param(str_repeat('s', count($values)), ...$values);

// Execute the statement
if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>