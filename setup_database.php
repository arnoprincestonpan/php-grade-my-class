<?php

$db_file = 'grades.sqlite';

try{
    $db = new SQLite3($db_file);

    $sql_students = "
        CREATE TABLE IF NOT EXISTS students (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL
        );
    ";

    $db->exec($sql_students);

    $sql_assignments = "
        CREATE TABLE IF NOT EXISTS assignments (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            weight REAL NOT NULL
        );
    ";

    $db->exec($sql_assignments);

    $sql_grades = "
        CREATE TABLE IF NOT EXISTS grades (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            student_id INTEGER NOT NULL,
            assignment_id INTEGER NOT NULL,
            score REAL,
            FOREIGN KEY (student_id) REFERENCES students(id),
            FOREIGN KEY (assignment_id) REFERENCES assignment(id)
        );
    ";

    $db->exec($sql_grades);

    echo "Database and tables created successfully!";

} catch (Exception $e){
    echo "Error: " . $e->getMessage();
} finally {
    if (isset($db)){
        $db->close();
    }
}

?>