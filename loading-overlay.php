<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="images/shosurbari-icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
    <link rel="icon" href="images/shosurbari-icon.png" type="image/png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .loader-container {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgb(255 255 255 / 85%);
            z-index: 9999;
        }
        .loader {
            position: relative;
            width: 70px;
            height: 70px;
            margin: 0 auto;
        }
        .loader img {
            position: absolute;
            top: 52%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 35px; 
            height: 35px;
        }
        .loader::before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 10px solid #f0f0f0;
            border-radius: 50%;
            border-top: 10px solid #0aa4ca;
            border-bottom: 10px solid #0aa4ca;
            animation: spin 1.5s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loading-message {
            margin-top: 10px;
            color: #000;
        }
    </style>
</head>
<body>
    <div class="loader-container" id="loader-container">
        <div class="loader" id="loader">
            <img src="images/shosurbari-email-icon.png"/>
        </div>
        <div class="loading-message" id="loading-message">শ্বশুরবাড়ি ডট কম</div>
    </div>
    <script>
    var loaderContainer = document.getElementById('loader-container');
    var loader = document.getElementById('loader');
    var loadingMessage = document.getElementById('loading-message');
    loaderContainer.style.display = 'flex';
    setTimeout(function () {
        loader.style.animation = 'none';
        loaderContainer.style.display = 'none';
        loadingMessage.style.display = 'none';
    }, 1000);
    </script>
</body>
</html>