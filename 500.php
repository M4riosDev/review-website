<?php http_response_code(500); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Server Error 500</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f7f5f2;
      color: #2c2c2c;
      font-family: "Inter", sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      height: 100vh;
      padding: 2rem;
    }

    .smoke {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background-color: rgba(120, 120, 120, 0.2);
      animation: smoke 3s infinite ease-in-out;
      margin-bottom: 1rem;
    }

    @keyframes smoke {
      0% { transform: translateY(0) scale(1); opacity: 0.3; }
      50% { transform: translateY(-30px) scale(1.2); opacity: 0.5; }
      100% { transform: translateY(-60px) scale(1.4); opacity: 0; }
    }

    h1 {
      font-size: 3rem;
      margin-bottom: 0.5rem;
    }

    p {
      font-size: 1rem;
      color: #555;
      margin-bottom: 2rem;
      max-width: 400px;
    }

    a {
      text-decoration: none;
      color: #fff;
      background-color: #2c2c2c;
      padding: 0.75rem 1.5rem;
      border-radius: 25px;
      transition: all 0.3s ease;
    }

    a:hover {
      background-color: #444;
    }
  </style>
</head>
<body>

  <h1>500</h1>
  <p>Something went wrong on our server. We will be back shortly.</p>
  <a href="/">Back to Home</a>

</body>
</html>