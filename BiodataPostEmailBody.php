<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #2ecc71;
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
    background: #0aa4ca;
    color: white;
    text-align: center;
    padding: 2px 20px;
    font-size: 12px;
    line-height: 30px;
    height: 60px;
}
.content {
    padding: 10px 15px;
    border-right: 20px solid #0aa4ca;
    border-left: 20px solid #0aa4ca;
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
    border: 2px solid #0aa4ca;
    padding: 25px;
}
.sb-reg-info-heading{
    font-size: 15px;
    color: #000000;
    padding: 5px;
    padding-left: 10px;
    font-weight: 450;
    width: 33%;
    position: inherit;
    text-align: left;
    border: 1px solid #ccc;
    border-style: groove;
}
.sb-reg-info-data{
    font-size: 15px;
    color: #0aa4ca;
    padding: 5px;
    padding-left: 10px;
    font-weight: 450;
    width: 67%;
    position: inherit;
    text-align: left;
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
    font-size: 12px;
    color: #000;
    font-weight: bold;
    padding: 2px;
    margin-top: 0px;
    margin-bottom: 0px;
    text-align: left;
}
.content p span{
    font-size: 10px;
    color: #000;
}
.content span{
    text-decoration: none;
    color: #0aa4ca;
    font-size: 12px;
}
.ii a[href] {
    text-decoration: none;
    color: #0aa4ca;
    font-size: 12px;
}
span a {
    text-decoration: none;
    color: black;
    font-size: 12px;
}
.content h3 {
    font-size: 15px;
    font-weight: none;
    color: black;
    margin-bottom: 22px;
    text-align: left;
}
.content h5 {
    text-align: justify;
    color: #696262;
    font-size: 12px;
    margin-top: 15px;
}
.footer {
    background: #0aa4ca;
    color: white;
    text-align: center;
    padding: 5px 10px 20px 10px;
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
        <h1>Welcome to ShosurBari</h1>
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
                    <td class="sb-reg-info-data"> <?php echo $fname; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Username</td>
                    <td class="sb-reg-info-data"> <?php echo $uname; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Email</td>
                    <td class="sb-reg-info-data"> <?php echo $email; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Number</td>
                    <td class="sb-reg-info-data"> <?php echo $pnumber; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Gender</td>
                    <td class="sb-reg-info-data"> <?php echo $gender; ?> </td>
                </tr>
                <tr>
                    <td class="sb-reg-info-heading">Password</td>
                    <td class="sb-reg-info-data"> For security reasons, do not display the password </td>
                </tr>
            </tbody>
        </table>
    </div>
        <h4>Login to your account: <a style="text-decoration:underline; color:#0aa4ca;" href='https://www.shoshurbari.rf.gd/login.php' target='_blank'>ShosurBari Login </a></h4>

        <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">Note: </strong> Please remember to keep your passwords secure. Do not share them with anyone.</h5>
    </div>
    <div class='footer'>
        <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved</p>
        <a href="http://www.shoshurbari.rf.gd/login.php"> <img src="https://i.ibb.co/xqxgyDZ/shosurbari-email-icon.png" style=" border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="https://www.facebook.com/ShosurBari.bd/"> <img src="https://i.postimg.cc/fytRD9ZK/shosurbari-facebook.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="mailto:info@shosurbari.com"> <img src="https://i.postimg.cc/FsVx0d0z/shosurbari-email.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="https://www.youtube.com/"> <img src="https://i.postimg.cc/T1zYw33X/shosurbari-youtube.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
    </div>
</div>
</body>
</html>
