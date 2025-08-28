<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Tracker</title>
</head>
<body>
    <h1>Add New Student</h1>
    <?php
    $db_file = 'grades.sqlite';

    try{
        $db = new SQLite3($db_file);
        $student_name = $_POST['student_name'];

        $stmt = $db->prepare("INSERT INTO students (name) VALUES (:name)");
        $stmt->bindValue(":name", $student_name, SQLITE3_TEXT);
        $stmt->execute();

        echo "<p>Student " . $student_name . " added succesfully! </p>";

    } catch (Exception $e){
        echo "<p style='color: red;'>Error: " . $e->getMessage() . "</p>";
    } finally {
        if(isset($db)){
            $db->close();
        }
    }
    ?>

    <form method="POST">
        <label for="student_name">Student Name:</label>
        <input type="text" id="student_name" name="student_name" required>
        <button type="submit">Add Student</button>
    </form>
</body>
</html>