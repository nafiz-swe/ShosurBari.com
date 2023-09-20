<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #2ecc71; /* Updated background color */
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 10px;
        background: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .header {
        background: linear-gradient(#0ea5e9, #06b6d4);
        color: white;
        text-align: center;
        padding: 10px;
    }

    .content {
        padding: 10px 30px;
        border-right: 50px solid #06b6d4;
        border-left: 50px solid #06b6d4;
        text-align: center;
    }

    table {
        border: 1px #ccc;
        border-collapse: collapse;
        border-spacing: 0;
        margin: auto;
        width: 100%;
    }

    .sb-reg-info{
        border: 2px solid #06b6d4;
        padding: 25px;
    }

    .sb-reg-info-heading{
        font-size: 15px;
        color: #000000;
        padding: 5px;
        font-weight: 450;
        width: 33%;
        position: inherit;
        text-align: center;
        border: 1px solid #ccc;
        border-style: groove;
    }

    .sb-reg-info-data{
        font-size: 15px;
        color: #06b6d4;
        padding: 5px;
        font-weight: 450;
        width: 67%;
        position: inherit;
        text-align: center;
        text-decoration: none;
        border: 1px solid #ccc;
        border-style: groove;
    }

    .note{
        border: 1.5px solid #ccc;
        margin-top: 5px;
        padding: 13px;
    }

    .content p {
        font-size: 15px;
        color: #000;
        font-weight: 500;
        padding: 2px;
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .content span{
        text-decoration: none;
        color: #06b6d4;
        font-size: 15px;
    }

    .ii a[href] {
        text-decoration: none;
        color: #06b6d4;
        font-size: 15px;
    }

    span a {
        text-decoration: none;
        color: #06b6d4;
        font-size: 15px;
    }

    .content h3 {
        font-size: 16px;
        font-weight: none;
        color: #06b6d4;
        margin-bottom: 22px;
        text-align: justify;
    }

    .content h4 {
        font-size: 15px;
        font-weight: none;
        color: #000;
        margin-bottom: 8px;
    }

    .content h5 {
        text-align: justify;
        color: #696262;
        font-size: 13px;
    }

    .footer {
        background: linear-gradient(#06b6d4, #0ea5e9);
        color: white;
        text-align: center;
        padding: 15px 10px 30px 10px;
    }

    .footer img{
        padding:10px;
        margin: auto;
        align-items: center;
    }
</style>
</head>

<body>
<div class='container'>
    <div class='header'>
        <h1>Welcome to ShosurBari!</h1>
    </div>
    <div class='content'>
        <h3>Thank you for registering at ShosurBari. Here are your registration details:</h3>
        <div class="sb-reg-info">
        <table>
            <tbody>
                <tr>
                    <td class="sb-reg-info-heading">Biodata Number</td>
                    <td class="sb-reg-info-data"> <?php echo $id; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Full Name</td>
                    <td class="sb-reg-info-data"> <?php echo $fullname; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Username</td>
                    <td class="sb-reg-info-data"> <?php echo $username; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Email</td>
                    <td class="sb-reg-info-data"> <?php echo $email; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Number</td>
                    <td class="sb-reg-info-data"> <?php echo $number; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Gender</td>
                    <td class="sb-reg-info-data"> <?php echo $gender; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Password</td>
                    <td class="sb-reg-info-data"> <?php echo $password; ?> </td>
                </tr>
            </tbody>
        </table>
    </div>

        <!-- <p>Biodata Number: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $id; ?> </span></p>
        <p>Full Name: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $fullname; ?> </span></p>
        <p>Username: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $username; ?> </span></p>
        <p>Email: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $email; ?> </span></p>
        <p>Phone Number: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $number; ?> </span></p>
        <p>Gender: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $gender; ?> </span></p>
        <p>Password: <span style="text-decoration: none; color: #0ea5e9; font-size: 16px;"> <?php echo $password; ?> </span></p> -->

        <h4>Login to your account: <a style="text-decoration:underline; color:#06b6d4;" href='https://www.shoshurbari.rf.gd/login.php' target='_blank'>ShosurBari Login </a></h4>

        <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">Note: </strong> Please remember to keep your passwords secure. Do not share them with anyone.</h5>
    </div>

    <div class='footer'>
        <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved</p>
        <a href="http://www.shoshurbari.rf.gd/login.php"><img src="https://www.linkpicture.com/q/shosurbari-email-icon_1.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline: none; text-decoration: none; height: 24px; width: 24px; vertical-align: middle" width="24" height="24"></a>
        <a href="https://www.facebook.com/ShosurBari.bd/"><img src="https://www.linkpicture.com/q/shosurbari-facebook_1.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline: none; text-decoration: none; height: 24px; width: 24px; vertical-align: middle" width="24" height="24"></a>
        <a href="mailto:info@shosurbari.com"><img src="https://www.linkpicture.com/q/shosurbari-email_1.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline: none; text-decoration: none; height: 24px; width: 24px; vertical-align: middle" width="24" height="24"></a>
        <a href="https://www.youtube.com/"><img src="https://www.linkpicture.com/q/shosurbari-youtube.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline: none; text-decoration: none; height: 24px; width: 24px; vertical-align: middle" width="24" height="24"></a>
    </div>
</div>

</body>
</html>
