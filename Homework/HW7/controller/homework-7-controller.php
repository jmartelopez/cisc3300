<?php
namespace controllers;

class NoteController
{
    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            if (count($errors)) {
                http_response_code(400);
                $this->display('<p>' . implode('<br>', $errors) . '</p>');
            } else {
                $this->display('<p style="color: #28a745;">Your note has been submitted successfully!</p>');
            }
        } else {
            $this->display('');
        }
    }

    private function display($message)
    {
        include '../views/notes_view.php';
    }
}
?>

?>
