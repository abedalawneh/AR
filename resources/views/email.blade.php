<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <title>reset email </title>
</head>

<body>
    <!-- password reset form -->
    <form action="{{ route('reset') }}" method="post">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <button type="submit">Send Password Reset Link</button>
    </form>

    <!-- password reset success -->
    <!-- <p>A password reset link has been sent to your email address.</p> -->

</body>

</html>