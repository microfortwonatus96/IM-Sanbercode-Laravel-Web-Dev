<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Form</title>
</head>
<body>
    <form action="/welcome" method="POST">
        @csrf
        <h1>Buat Account Baru!</h1>
    
        <h3>Sign Up Form</h3>

        <label for="firstname">First Name:</label><br><br>
        <input type="text" name="firstname"><br><br>

        <label for="lasstname">Last Name:</label><br><br>
        <input type="text" name="lastname"><br><br>

        <label for="gender">Gender:</label><br><br>
        <input type="radio"> Male <br><br>
        <input type="radio"> Female <br><br>
        <input type="radio"> Other <br><br>

        <label for="Nationality">Nationality:</label><br><br>
        <select name="nationality">
            <option value="Indonesian">Indonesian</option>
            <option value="Japan">Japan</option>
        </select><br><br>

        <label for="Language">Language Spoken:</label><br><br>
        <input type="checkbox" name="Language"> Bahasa Indonesia<br><br>
        <input type="checkbox" name="Language"> English<br><br>
        <input type="checkbox" name="Language"> Other<br><br>

        <label for="Bio">Bio:</label><br><br>
        <textarea name="" id="" cols="30" rows="10"></textarea><br><br>
        <input type="submit" value="Sign Up"> <br><br>
        <a href="/">kembali ke home</a>

    </form> 
</body>
</html>

