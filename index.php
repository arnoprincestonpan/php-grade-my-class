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
    } catch (Exception $e){

    } finally {
        if(isset($db)){
            $db->close();
        }
    }
    ?>
</body>
</html>