<pre>
<?php
require_once("includes/connection.php");

// Check if the table exists
$tableName = 'formData';

//$query = "DROP TABLE IF EXISTS $tableName";
//$result = mysqli_query($conn, $query);

$query = "SHOW TABLES LIKE '$tableName'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    // Table doesn't exist, create it
    $createQuery = "CREATE TABLE $tableName (
        id INT AUTO_INCREMENT PRIMARY KEY,
        selected_state VARCHAR(255),
        vehicle_no VARCHAR(255),
        chassis_no VARCHAR(255),
        owner_name VARCHAR(255),
        mobileno VARCHAR(255),
        from_state VARCHAR(255),
        vehicle_type INT,
        vehicle_class INT,
        seating_cap INT,
        service_type INT,
        distance INT,
        tax_mode INT,
        barrier_district VARCHAR(255),
        tax_from DATETIME,
        tax_upto DATETIME,
        permit INT,
        permit_upto DATE,
        permit_no INT,
        mv_tax INT,
        cess INT,
        infra_cess INT,
        permit_fee INT,
        permit_variation INT,
        total_tax INT,
        uid INT DEFAULT NULL,
        createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    // Execute the create query
    $createResult = mysqli_query($conn, $createQuery);

    if ($createResult) {
        echo "Table created successfully.";
    } else {
        echo "Error creating table: " . mysqli_error($conn);
    }
}

// Assuming you have the $post array
$post = $_POST;
$post['total_tax'] = $post['mv_tax'] + $post['cess'] + $post['infra_cess'] + $post['permit_fee'] + $post['permit_variation'];

// Prepare the columns and values arrays
$columns = array_keys($post);
$values = array_values($post);

// Prepare the placeholders for the query

$placeholders = implode("','", $values);

print_r($post);

// Prepare the insert query
$sql = "INSERT INTO " . $tableName . " (" . implode(', ', $columns) . ") VALUES ('" . $placeholders . "')";
echo $sql;
// Execute the query
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Record inserted successfully.";
} else {
    echo "Error inserting record: " . mysqli_error($conn);
}

// Close the database conn
mysqli_close($conn);
?>