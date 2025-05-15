<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 20px;">
    <div style="max-width: 500px; margin: 40px auto; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h3 style="color: #333; margin: 0; padding: 10px 0;">Registration Successful!</h3>
        </div>
        <div style="margin-bottom: 20px;">
            <h4 style="color: #555; margin-bottom: 15px;">User Information:</h4>
            <div style="background-color: #f8f9fa; padding: 15px; border-radius: 4px;">
                <p style="margin: 10px 0;"><strong>ID:</strong> <span id="userId"></span></p>
                <p style="margin: 10px 0;"><strong>Name:</strong> <span id="userName"></span></p>
                <p style="margin: 10px 0;"><strong>Email:</strong> <span id="userEmail"></span></p>
                <p style="margin: 10px 0;"><strong>Password:</strong> <span id="userPassword"></span></p>
            </div>
        </div>
        <div style="text-align: center; margin-top: 20px;">
            <p style="color: #888; font-size: 14px;">Current URL: <span style="color: #4a90e2;">/registration-success</span></p>
        </div>
        <div style="text-align: center;">
            <a href="/" style="display: inline-block; padding: 12px 24px; background-color: #4a90e2; color: white; text-decoration: none; border-radius: 4px; font-size: 16px;">Go to Home</a>
        </div>
    </div>

    <script>
        // Get the user data from localStorage
        const userData = JSON.parse(localStorage.getItem('registeredUser'));
        console.log(userData);
        if (userData) {
            document.getElementById('userId').textContent = userData.id;
            document.getElementById('userName').textContent = userData.name;
            document.getElementById('userEmail').textContent = userData.email;
            document.getElementById('userPassword').textContent = userData.password;
        }
    </script>
</body>
</html> 