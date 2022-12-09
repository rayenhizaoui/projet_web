<!DOCTYPE html>
<html lang="en">
    <head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">
<title>Send an email with a form </title>
<link rel="style">
</head>
<body>
    <p class="request_message">
        message envoyé !
    </p>
    <form action=""method="POST">
    <h2>Contact Us </h2>
    <label>username</label>
    <input type="text" name="username">
    <label>email</label>
    <input type="text" name="email">
    <label>phone</label>
    <input type="number" name="phone">
    <label>message</label>
    <textarea name="message" cols="30" rows="10"></textarea>
    <button name="send">send</button>  
</form>  
</body>
</html>