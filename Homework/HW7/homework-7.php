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
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Notes</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #e0f7fa;
                    margin: 0;
                    padding: 0;
                }
                h1 {
                    color: #007bb5;
                }
                form {
                    background-color: #ffffff;
                    padding: 20px;
                    margin: 20px;
                    border-radius: 5px;
                }
                label, input, textarea, button {
                    display: block;
                    width: 100%;
                    margin-bottom: 10px;
                }
                button {
                    background-color: #007bb5;
                    color: #ffffff;
                    border: none;
                    padding: 10px;
                    cursor: pointer;
                }
                button:hover {
                    background-color: #005f8a;
                }
                p {
                    color: #007bb5;
                }
            </style>
        </head>
        <body>
            <h1>A Note</h1>
            ' . $message . '
            <form method="post" action="">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>
                <br>
                <button type="submit">Submit</button>
            </form>
        </body>
        </html>';
    }
}
?>
