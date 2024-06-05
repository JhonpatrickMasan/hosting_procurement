<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-image: url('{{ asset('images/image 1.png') }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center; /* Center the image both vertically and horizontally */
            height: 100vh; /* Ensure the body takes up the full viewport height */
            margin: 0; /* Remove default margin */
            display: flex; /* Use flexbox for vertical centering */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 10px;
            position: relative;
            text-align: center;
            width: 400px;
        }
        .logo {
            background-image: url('{{ asset('images/image 7.png') }}');
            background-size: contain; /* Resize the image to fit within the container */
            background-repeat: no-repeat; /* Prevent repeating of the background image */
            background-position: center; /* Center the background image */
            width: 250px; /* Desired width */
            height: 246.43px; /* Desired height */
            margin-bottom: 20px;
            padding-right: 20px;
        }
        .title-img {
            width: 70%;
            margin-top: 20px;
            padding-left: 25px;
        }
        hr {
            margin-top: 20px;
            border: 1px solid #000;
            width: 90%;
        }
        .small-text {
            font-size: 14px;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
        }
        .blue-button-container {
            margin-top: 10px;
        }
        .blue-button {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 30px;
            margin-bottom: 20px;
            font-weight: bold;
            border: none;
            width: 305px;
            height: 42px;
        }
    </style>
        <script>
            function navigateToSignIn() {
                window.location.href = "{{ route('login') }}";
            }
        </script>
</head>
<body>
    <div class="full-background">
        <div class="container">
            <!-- Logo -->
            <div class="logo"></div>

            <!-- Title -->
            <img src="{{ asset('images/Group 4602.png') }}" alt="Title" class="title-img">

            <!-- Line -->
            <hr>

            <!-- Small Text -->
            <p class="small-text">Select an account of whom you wish to log in as.</p>

            <!-- Login Buttons -->
            <div class="blue-button-container">
                <button onclick="navigateToSignIn()" class="btn btn-primary blue-button">Procurement Office</button><br>
                <button onclick="navigateToSignIn()" class="btn btn-primary blue-button">End-user</button><br>
            </div>
        </div>
    </div>
</body>
</html>
