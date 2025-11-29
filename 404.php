<?php http_response_code(404); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Willowen 404</title>
  <link rel="icon" href="./img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/404.css">
  <style>
 * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #000000;
      color: #ffffff;
      font-family: "Inter", sans-serif;
      height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 2rem;
      overflow: hidden;
    }

    .candle {
      position: relative;
      width: 16px;
      height: 40px;
      background: #e5e2df;
      border-radius: 4px;
      margin-bottom: 1.5rem;
      box-shadow: inset 0 -3px 0 #ccc;
    }

    .flame {
      position: absolute;
      top: -20px;
      left: 50%;
      transform: translateX(-50%);
      width: 12px;
      height: 18px;
      background: radial-gradient(circle at 50% 30%, #ffb347 0%, #ffcc33 60%, transparent 100%);
      border-radius: 50% 50% 50% 50%;
      animation: flicker 1.4s infinite ease-in-out alternate;
      transform-origin: center;
    }

    @keyframes flicker {
      0% { transform: translateX(-50%) scale(1) rotate(0deg); opacity: 1; }
      50% { transform: translateX(-50%) scale(1.1) rotate(2deg); opacity: 0.8; }
      100% { transform: translateX(-50%) scale(0.9) rotate(-2deg); opacity: 1; }
    }

    h1 {
      font-size: 4rem;
      letter-spacing: 1px;
      margin-bottom: 0.25rem;
    }

    p {
      font-size: 1rem;
      color: #555;
      margin-bottom: 2rem;
      max-width: 420px;
      line-height: 1.5;
    }

    a {
      text-decoration: none;
      color: #fff;
      background-color: #2c2c2c;
      padding: 0.75rem 1.5rem;
      border-radius: 25px;
      font-size: 0.95rem;
      transition: all 0.3s ease;
    }

    a:hover {
      background-color: #444;
      transform: translateY(-2px);
    }
  </style>
</head>
<body>
  <div class="candle">
    <div class="flame"></div>
  </div>
  <h1>404</h1>
  <p>
    Looks like we lost the wick 🔥  
    The page you’re searching for melted away...  
  </p>
  <a href="/">Back to safety</a>
</body>
</html>