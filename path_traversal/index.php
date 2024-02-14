<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .submit-link {
            background: none;
            border: none;
            color: blue;
            text-decoration: underline;
            cursor: pointer;
            padding: 0;
            font-size: 16px;
        }
        .submit-link:hover {
            color: darkblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>File Viewer</h1>
        <table>
            <tr>
                <th>File</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>Dog At Work 1</td>
                <td>
                    <form action="/display.php" method="get">
                        <input type="hidden" name="file" value="images/dog_at_work1.jpeg">
                        <button type="submit" class="submit-link">View</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>Dog At Work 2</td>
                <td>
                    <form action="/display.php" method="get">
                        <input type="hidden" name="file" value="images/dog_at_work2.jpeg">
                        <button type="submit" class="submit-link">View</button>
                    </form>
                </td>
            </tr>
            <tr>
                <td>WebSec Resources</td>
                <td>
                    <form action="/display.php" method="get">
                        <input type="hidden" name="file" value="notes/useful_web_resources.html">
                        <button type="submit" class="submit-link">View</button>
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
