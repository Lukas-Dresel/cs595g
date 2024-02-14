<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display File</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
        pre {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        p {
            margin-bottom: 20px;
        }
        a {
            color: blue;
            text-decoration: underline;
        }
        a:hover {
            color: darkblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $file = $_GET['file'];
        $filepath = 'resources/' . $file;
        if (file_exists($filepath)) {
            if (str_ends_with($filepath, "jpeg")) {
                echo '<img src="' . $filepath . '" alt="Image">';
            } else {
                echo '<pre>' . file_get_contents($filepath) . '</pre>';
            }
        } else {
            echo '<p>File not found or inaccessible.</p>';
        }
        ?>
        <p><a href="index.php">Go Back</a></p>
    </div>
</body>
</html>
