<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Page Not Found – 404</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #f7f5f2;
      color: #2c2c2c;
      font-family: "Poppins", sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      height: 100vh;
      padding: 2rem;
    }

    .ghost {
      width: 80px;
      height: 80px;
      background: #2c2c2c;
      border-radius: 50%;
      position: relative;
      animation: float 3s infinite ease-in-out;
      margin-bottom: 2rem;
    }

    .ghost::after,
    .ghost::before {
      content: "";
      position: absolute;
      width: 30px;
      height: 30px;
      background: #2c2c2c;
      border-radius: 50%;
      bottom: -15px;
    }

    .ghost::before { left: -15px; }
    .ghost::after { right: -15px; }

    @keyframes float {
      0% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0); }
    }

    h1 {
      font-size: 3rem;
      margin-bottom: .5rem;
    }

    p {
      max-width: 380px;
      font-size: 1rem;
      color: #555;
      margin-bottom: 2rem;
    }

    a {
      text-decoration: none;
      color: #fff;
      background-color: #2c2c2c;
      padding: .75rem 1.5rem;
      border-radius: 25px;
      transition: 0.3s;
    }

    a:hover {
      background-color: #444;
    }
  </style>
</head>
<body>

  <div class="ghost"></div>
  <h1>404</h1>
  <p>The page you're looking for doesn’t exist or was moved.</p>
  <a href="/">Back to Home</a>

</body>
</html>