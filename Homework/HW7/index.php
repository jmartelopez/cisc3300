<?php

require './controller/NoteController.php';

$noteController = new NoteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $noteController->saveNote();
} else {
    $noteController->viewAddNotes();
}
?>

