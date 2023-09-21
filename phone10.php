<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    // Get reference to uploaded image
$image_file = $_FILES["image"]; //image is the form input file element name

// Exit if no file uploaded
if (!isset($image_file)) {
    die('No file uploaded.');
}

// Exit if image file is zero bytes
if (filesize($image_file["tmp_name"]) <= 0) {
    die('Uploaded file has no contents.');
}

// Exit if is not a valid image file
$image_type = exif_imagetype($image_file["tmp_name"]);
if (!$image_type) {
    die('Uploaded file is not an image.');
}

// Get file extension based on file type, to prepend a dot we pass true as the second parameter
$image_extension = image_type_to_extension($image_type, true);

// Create a unique image name
$image_name = bin2hex(random_bytes(16)) . $image_extension;

// Move the temp image file to the images directory
move_uploaded_file(
    // Temp image location
    $image_file["tmp_name"],

    // New image location
    __DIR__ . "/images/" . $image_name
);
    $fullname=$_POST["fullname"];
    $phone_no=$_POST["phone"];
    $fax=$_POST["fax"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    $comment=$_POST["comment"];
include_once("db_conn.php");
    try{
        $sql='INSERT INTO `phone_index`(`fullname`, `phone`, `fax`, `email`, `address`,`comment`,`image`) VALUES (?,?,?,?,?,?,?)';
        //use names of columns in database
        $stmt=$conn -> prepare($sql);
        $stmt->execute([$fullname,$phone_no,$fax,$email,$address,$comment,$image_name]);
        //use same order as in database
        echo "Data added successfully";
    }
    catch(PDOException $e){
            echo "Failed to insert data " . $e->getMessage();
    }
}else{
    echo "Invalid Request";
}
?>