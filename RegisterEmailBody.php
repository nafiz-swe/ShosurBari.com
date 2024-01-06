<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: 'AdorshoLipi', 'Ubuntu', sans-serif !important;
    margin: 0;
    padding: 0;
}
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 30px;
    background: #ddf4ff66;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.header {
    background: #0aa4ca;
    color: white;
    text-align: center;
    padding: 2px 20px;
    font-size: 12px;
    line-height: 30px;
    height: 80px;
}
.header h1 {
    font-size: 30px;
    line-height: 40px;
}
.content {
    text-align: center;
}
.content h3 {
    font-size: 16px;
    font-weight: 500;
    color: black;
    margin-top: 22px;
    margin-bottom: 22px;
    text-align: left;
    line-height: 22px;
}
.content h5 {
    text-align: justify;
    color: #696262;
    font-size: 12px;
    margin-top: 22px;
    line-height: 20px;
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
span a {
    text-decoration: none;
    color: black;
    font-size: 12px;
}
table {
    border: 1px #ccc;
    border-collapse: collapse;
    border-spacing: 0;
    margin: auto;
    width: 100%;
}
.sb-reg-info{
    padding: 20px;
    background: #fff;
    margin-bottom: 22px;
    box-shadow: 0 0 13px 0 rgba(82,63,105,.05);
    border: 1px solid rgba(0,0,0,.05);
}
.sb-reg-info-heading{
    font-size: 12px;
    color: #000000;
    padding: 5px;
    padding-right: 10px;
    font-weight: 450;
    width: 35%;
    position: inherit;
    text-align: right;
    border: 1px solid #ccc;
    border-style: groove;
}
.sb-reg-info-data {
    font-size: 12px;
    color: #0aa4ca;
    padding: 5px;
    padding-left: 10px;
    font-weight: 450;
    width: 65%;
    position: inherit;
    text-align: left;
    text-decoration: none;
    border: 1px solid #ccc;
    border-style: groove;
}
.sb-reg-info-data a {
    font-size: 12px;
    color: #0aa4ca;
}
.ii a[href] {
    text-decoration: none;
    color: #0aa4ca;
    font-size: 12px;
}
.note{
    border: 1px solid #ccc;
    margin-top: 5px;
    padding: 13px;
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
        <h3>Thank you for choosing ShosurBari.com! Your registration details have been received. We look forward to serving you.</h3>
        <div class="sb-reg-info">
            <table>
                <tbody>
                    <tr>
                        <td class="sb-reg-info-heading">Biodata Number</td>
                        <td class="sb-reg-info-data"><a href="https://www.shosurbari.com/my-account.php"><?php echo $id; ?></a></td>
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
                        <td class="sb-reg-info-data"> <?php echo "$selectedCountryCode $pnumber"; ?> </td>
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
        <h4>Post your biodata: <a style="text-decoration:underline; color:#0aa4ca;" href='https://www.shosurbari.com/biodata-post.php'>Biodata Post </a></h4>
        <h5 class="note" style="font-weight: none;"> <strong style="color: red; font-weight: bold;">Note: </strong> Please remember to keep your passwords secure. Do not share them with anyone.</h5>
    </div>
    <div class='footer'>
        <p>&copy; 2022-23 ShosurBari.com | All Rights Reserved</p>
        <a href="https://www.shosurbari.com"> <img src="https://i.ibb.co/xqxgyDZ/shosurbari-email-icon.png" style=" border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="https://www.facebook.com/ShosurBari.bd/"> <img src="https://i.postimg.cc/fytRD9ZK/shosurbari-facebook.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="mailto:info@shosurbari.com"> <img src="https://i.postimg.cc/FsVx0d0z/shosurbari-email.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
        <a href="https://www.youtube.com/"> <img src="https://i.postimg.cc/T1zYw33X/shosurbari-youtube.png" style="border-radius: 4px; padding: 2px; background: #fff; margin: auto 10px; outline:none;text-decoration:none;height:24px;width:24px;vertical-align:middle" width="24" height="24" class="CToWUd" data-bit="iit"></a>
    </div>
</div>
</body>
</html>
