<?php

class NoteController
{
    public function saveNote()
    {
        $title = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $errors = [];

        if ($title) {
            $title = htmlspecialchars($title);
            if (strlen($title) < 4) {
                $errors['title'] = 'Title is too short (minimum of 4 characters).';
            }
        } else {
            $errors['title'] = 'Title is required.';
        }

        if ($description) {
            $description = htmlspecialchars($description);
            if (strlen($description) < 11) {
            $errors['description'] = 'Description is too short (minimum of 11 characters).';
            }
        } else {
            $errors['description'] = 'Description is required.';
        }

        if (!empty($errors)) {
            http_response_code(400);
            echo json_encode($errors);
            exit();
        }

        $response = [
            'title' => $title,
            'description' => $description,
        ];
        echo json_encode($response);
        exit();
    }

    public function viewAddNotes()
    {
        require './view/NoteView.html';
        exit();
    }
}
?>
