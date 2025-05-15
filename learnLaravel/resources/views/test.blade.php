<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f5f5f5; margin: 0; padding: 20px;">
    
    <form action="/test" method="POST">
        @csrf
        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="last_name" placeholder="Last Name">
        <button type="submit">Register</button>
    </form>

    <div style="max-width: 500px; margin: 40px auto; background: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); padding: 20px;">
        <div style="text-align: center; margin-bottom: 30px;">
            <h3 style="color: #333; margin: 0; padding: 10px 0;">Register</h3>
        </div>
        <form id="registerForm">
            <div style="margin-bottom: 20px;">
                <label for="name" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">Name</label>
                <input type="text" id="name" name="name" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="email" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">Email address</label>
                <input type="email" id="email" name="email" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">Password</label>
                <input type="password" id="password" name="password" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 16px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password_confirmation" style="display: block; margin-bottom: 5px; color: #555; font-weight: bold;">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; font-size: 16px;">
            </div>
            <button type="submit" style="width: 100%; padding: 12px; background-color: #4a90e2; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer;">Register</button>
        </form>
    </div>

    <script>
        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const formData = {
                name: document.getElementById('name').value,
                email: document.getElementById('email').value,
                password: document.getElementById('password').value,
                password_confirmation: document.getElementById('password_confirmation').value
            };

            try {
                const response = await fetch('http://127.0.0.1:8000/api/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify(formData)
                });

                const data = await response.json();
                
                if (response.ok) {
                    // Store user data in localStorage
                    localStorage.setItem('registeredUser', JSON.stringify({
                        id: data.user.id,
                        name: formData.name,
                        email: formData.email,
                        password: formData.password
                    }));
                    window.location.href = "{{ url('/registration-success') }}";
                } else {
                    let errorMsg = data.message || 'Registration failed';
                    if (data.errors) {
                        errorMsg += '\n' + Object.values(data.errors).flat().join('\n');
                    }
                    alert(errorMsg);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred during registration');
            }
        });

        localStorage.removeItem('registeredUser');
    </script>
</body>
</html>