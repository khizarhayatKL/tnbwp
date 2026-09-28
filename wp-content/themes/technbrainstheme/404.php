<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 - Page Not Found</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #ee2222;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      font-family: 'Segoe UI', Arial, sans-serif;
      color: #ffffff;
    }

    .container {
      text-align: center;
      padding: 20px;
    }

    /* ---- 404 Big Number ---- */
    .error-code {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      margin-bottom: 40px;
    }

    .error-code .num {
      font-size: 160px;
      font-weight: 700;
      line-height: 1;
      color: #ffffff;
    }

    /* Circle with ? in the middle (replaces the zero) */
    .error-code .icon {
      width: 130px;
      height: 130px;
      border: 8px solid #ffffff;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .error-code .icon span {
      font-size: 80px;
      font-weight: 700;
      color: #ffffff;
      line-height: 1;
    }

    /* ---- Message Text ---- */
    .message {
      font-size: 18px;
      font-weight: 400;
      line-height: 1.7;
      color: #ffffff;
      max-width: 420px;
      margin: 0 auto 10px auto;
    }

    .home-link-line {
      font-size: 18px;
      color: #ffffff;
    }

    .home-link-line a {
      color: #000000;
      font-weight: 700;
      text-decoration: none;
      text-transform: uppercase;
    }

    .home-link-line a:hover {
      text-decoration: underline;
    }

    /* ---- Responsive ---- */
    @media (max-width: 600px) {
      .error-code .num {
        font-size: 90px;
      }
      .error-code .icon {
        width: 80px;
        height: 80px;
        border-width: 5px;
      }
      .error-code .icon span {
        font-size: 48px;
      }
      .message {
        font-size: 15px;
      }
    }
  </style>
</head>
<body>

  <div class="container">

    <!-- 4 ? 4 -->
    <div class="error-code">
      <span class="num">4</span>
      <div class="icon">
        <span>?</span>
      </div>
      <span class="num">4</span>
    </div>

    <!-- Message -->
    <p class="message">
      Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first place?
    </p>

    <!-- Home Link -->
    <p class="home-link-line">
      Let's go <a href="/">HOME</a> and try from there.
    </p>

  </div>

</body>
</html>
