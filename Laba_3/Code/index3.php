<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bulletin Board</title>
    <style>
        body
        {
            background: #fff0eb;
            font-size: 20px;
            font-family: "SansSerif", serif;
        }
    </style>
</head>
<body>
    <div id ="form">
        <form action ="save.php" method ="post">
            <label for ="email">Email</label>
            <input type ="email" name ="email" required>
            <label for ="category">Category</label>
            <select name ="category" required>
                <option value="appliances">Appliances</option>
                <option value="clothes">Clothes</option>
                <option value="other">Other</option>
            </select>
            <label for ="title">Title</label>
            <input type ="text" name ="title" required>
            <label for ="description">Description</label>
            <textarea rows ="3" name ="description"></textarea>

            <input type ="submit" name="button" value ="Save">
        </form>
    </div>
    <div id ="table">
        <table>
            <thead>
                <th>Category</th>
                <th>Title</th>
                <th>Description</th>
            </thead>
            <tbody>
                <?php
                $dir = opendir('categories');

                //Reading subdirectories
                while ($file = readdir($dir))
                {
                    if (is_dir('categories/'.$file) && $file != '.' && $file != '..')
                    {
                        $subdir = opendir('categories/'.$file);
                        while ($obj = readdir($subdir))
                        {
                            if ($obj != '.' && $obj != '..')
                            {
                                //Open file for reading only, copy the description line for line
                                $fp = fopen('categories/'.$file.'/'.$obj, 'r');
                                $desc = "";
                                while ($line = fgets($fp))
                                {
                                    $desc .= $line;
                                }
                                fclose($fp);

                                //Table
                                echo '<tr>';
                                echo "<td>$file</td>";
                                echo "<td>".substr($obj, 0, strlen($obj))."</td>";
                                echo "<td>$desc</td>";
                                echo '</tr>';
                            }
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>