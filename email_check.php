<!DOCTYPE html>
<html>
<head>
    <title>Email Check</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="error-container">
        <p class="error-message">Email already exists. Please choose a different email.</p>
        <a href="register.php">Go back to registration</a>
    </div>
</body>
</html>


<style>
.error-container {
    text-align: center;
    margin: 20px;
    padding: 10px;
    border: 1px solid #ff0000;
    background-color: #ffcccc;
    width: 300px;
    margin: 0 auto;
}

.error-message {
    color: #ff0000;
    font-weight: bold;
    margin-bottom: 10px;
}

</style>