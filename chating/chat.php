
<?php 
//  session_start();
//require_once("chating/includes/dbconn.php");
////  include_once "php/config.php";
////  if(!isset($_SESSION['unique_id'])){
////    header("location: login.php");
//  //}
//
//if (!isset($_SESSION['id'])) {
//    // Redirect the user to the login page or display an error message
//    header("location: login.php");
//    exit;
//}
?>


<?php include_once "header.php"; ?>


<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
//          $id = mysqli_real_escape_string($conn, $_GET['id']);
//          $sql = mysqli_query($conn, "SELECT * FROM users WHERE id = {$id}");
//          if(mysqli_num_rows($sql) > 0){
//            $row = mysqli_fetch_assoc($sql);
//          }else{
//            header("location: users.php");
//          }
        ?>

        <a href="view_profile.php?id=<?php echo $id;?>" class="back-icon"><i class="fas fa-arrow-left"></i></a>
<!--        <img src="php/images/<?php  ?>" alt=""> echo $row['img'];-->
        <div class="details">
<!--          <span><?php ?></span>  echo $row['username']. " " . $row['ussername'] -->
<!--          <p><?php  ?></p>echo $row['status'];-->
        </div>

      </header>
      <div class="chat-box">

      </div>
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/chat.js"></script>

</body>
</html>
