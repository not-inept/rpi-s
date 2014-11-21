<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Account Page</title>
        <style type="text/css">
        form{
            margin:auto;
            position: relative;
            width:50%;
            height:100%;
            font-family: Tahoma, Geneva, sans-serif;
            font-size: 14px;
            font-style: italic;
            line-height: 24px;
            font-weight: bold;
            color: #09C;
            border-radius: 10px;
            padding:10px;
            padding-bottom: 0px;
            border: 1px solid #999;
            border: inset 1px solid #333;
            text-decoration: none;
            box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
        }
        input{
            width:375px;
            display:block;
            border: 1px solid #999;
            height: 25px;
        }
        input[type="radio"]{
            display: inline-block;
            height: 15px;
            width: 40px;
        }
        </style>
    </head>
    <body>

    <?php

        $conn = new PDO('mysql:host=localhost;dname=project_test', 'root', 'root');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $use_table = "USE `project_test`;";
        $conn->exec($use_table);

        $get_info = $conn->prepare('SELECT * 
            FROM `persons`
            WHERE id = 1;');
            $get_info->execute();

        while($row = $get_info->fetch(PDO::FETCH_OBJ)) { // Print out each row of the DB into HTML
            $a = $row->FirstName;
            $b = $row->LastName;
            $c = $row->Pass;
            $d = $row->Email;
            $e = $row->Sex;
            $f = $row->Class;
        }

    ?>

        <form name="input" action="account_update.php" method="post">
            First Name: <input type="text" name="first" id="first" value="<?php echo $a; ?>"><br>
            Last Name: <input type="text" name="last" id="last" value="<?php echo $b; ?>"><br>
            Password: <input type="password" name="pwd" id="pwd" value="<?php echo $c; ?>"><br>
            Email: <input type="text" name="email" id="email" value="<?php echo $d; ?>"><br>
            Sex: <br>
            <input type="radio" name="sex" <?php echo ($e=='M')?'checked':'' ?> value="male">Male
            <input type="radio" name="sex" <?php echo ($e=='F')?'checked':'' ?> value="female">Female<br><br>
            Class: <br>
            <input type="radio" name="class" <?php echo ($f=='Fr')?'checked':'' ?> value="Fr">Freshmen<br>
            <input type="radio" name="class" <?php echo ($f=='So')?'checked':'' ?> value="So">Sophomore<br>
            <input type="radio" name="class" <?php echo ($f=='Jr')?'checked':'' ?> value="Jr">Junior<br>
            <input type="radio" name="class" <?php echo ($f=='Sr')?'checked':'' ?> value="Sr">Senior<br><br>
            <input type="submit" value="Update">
        </form>
    </body>
</html>
