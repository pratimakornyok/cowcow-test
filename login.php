<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <h1> Log in </h1>
    </header>

    <div class="header">
        <h2>login</h2>
    </div>

    <form action="logindb.php" method="post">
    
        <div class="input-group">
        <input type="text" name="username" placeholder="Username" require>
        </div>

        <div class="input-group">
        <input type="password" name="password" placeholder="Password" require>
        </div>

        <div class="input-group">
        <button type="submit" name="login" class="btn">login</button>
        </div>
    </form>