<?php
// save_message.php
require_once("includes/dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    session_start();
    if (isset($_SESSION['id'])) {
        $outgoing_id = $_SESSION['id'];
    } else {
        echo json_encode(array('success' => false, 'error' => 'User ID not found in session'));
        exit;
    }

    $query = "INSERT INTO messages (incoming_msg_user_id, outgoing_msg_user_id, message, msg_date) VALUES ('$incoming_id', '$outgoing_id', '$message', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Notify the WebSocket server about the new message
        $payload = array(
            'event' => 'new_message',
            'data' => array(
                'incoming_id' => $incoming_id,
                'outgoing_id' => $outgoing_id,
                'message' => $message,
                'msg_date' => date('j F Y, h:i:s A')
            )
        );
        sendWebSocketMessage(json_encode($payload));

        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false, 'error' => 'Failed to save message'));
    }
}

// Function to send WebSocket messages
function sendWebSocketMessage($message) {
    $context = new ZMQContext();
    $socket = $context->getSocket(ZMQ::SOCKET_PUSH, 'my pusher');
    $socket->connect("tcp://127.0.0.1:5555");
    $socket->send($message);
}
?>



<!-- HTML content for the chat interface -->
<div class="message-container">
  <div class="message-header">
    <h3>Chat Box</h3>
  </div>
  <div class="search-area">
    <input type="text" id="searchInput" placeholder="Find Message">
    <button type="button" onclick="searchMessages()">Search</button>
  </div>

  <div class="message-body" id="messageBody">
    <!-- Messages will be displayed here -->
  </div>

  <div class="message-footer">
    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
    <textarea type="text" rows="2" id="messageInput" name="message" class="input-field" placeholder="Type your message..." <?php echo isset($_SESSION["id"]) ? "" : "readonly"; ?>></textarea>
    <button type="button" onclick="sendMessage()" id="sendMessageButton" <?php echo isset($_SESSION["id"]) ? "" : "disabled"; ?>><i style="font-size:19px;" class="fa">&#xf1d9;</i></button> <br>
    <?php if (!isset($_SESSION["id"])) { ?>
      <div class="login-alert">
        <p id="loginMessage">মেসেজ করার জন্য অনুগ্রহ করে আপনার একাউন্ট <a href="login.php">লগইন</a> করুন</p>
      </div>
    <?php } ?>
  </div>
</div>




<script>
  var messages = [];

  const socket = new WebSocket('ws://localhost:8080');
    
    socket.onmessage = function(event) {
        const data = JSON.parse(event.data);
        if (data.event === 'new_message') {
            const message = data.data;
            displayReceivedMessage(message);
        }
    };

  function sendMessage() {
    const incoming_id = document.querySelector(".incoming_id").value;
    const messageInput = document.getElementById("messageInput");
    const message = messageInput.value.trim();

    if (!message) {
      return; // Don't send empty messages
    }

    // Clear the input field
    messageInput.value = "";

    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();

    // Configure the request
    xhr.open("POST", "save_message.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Define the callback function when the request completes
    xhr.onload = function () {
      if (xhr.status === 200) {
        const response = JSON.parse(xhr.responseText);
        if (response.success) {
          // Message saved successfully, update the chat interface as needed
          // For example, you can display the new message in the chat window
          console.log("Message sent and saved successfully!");
          // Display the message in the chat window
          displaySentMessage(message);
        } else {
          console.error("Failed to save the message:", response.error);
        }
      } else {
        console.error("Request failed with status:", xhr.status);
      }
    };

    // Handle network errors
    xhr.onerror = function () {
      console.error("Network error occurred");
    };

    // Send the request with the message data
    xhr.send("incoming_id=" + encodeURIComponent(incoming_id) + "&message=" + encodeURIComponent(message));

    // Get the current date and time
    var currentDate = new Date();
    var sentTime = currentDate.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
    var sentDate = currentDate.toLocaleDateString([], { day: "numeric", month: "short", year: "numeric" });
    var sentDay = currentDate.toLocaleDateString([], { weekday: "short" });

    var newMessage = {
      content: message,
      sentTime: sentTime,
      sentDate: sentDate,
      sentDay: sentDay,
      reactions: [],
      emojis: [], // Add the extracted emojis to the message object
    };

    

    // Add the message to the messages array
    messages.push(newMessage);

    // Display the message
    displayMessage(newMessage);

    // Save the message to the server/database (Replace 'save_message.php' with your server endpoint)
    saveMessageToServer(newMessage);
  
          // Send the message to the WebSocket server
          const payload = {
            event: 'new_message',
            data: {
                incoming_id: incoming_id,
                outgoing_id: outgoing_id,
                message: message,
                msg_date: (new Date()).toLocaleString() // Add the current timestamp to the payload
            }
        };
        socket.send(JSON.stringify(payload));
    }


  function displaySentMessage(message) {
    // Create a new message object
    var currentDate = new Date();
    var sentTime = currentDate.toLocaleTimeString([], { hour: "2-digit", minute: "2-digit" });
    var sentDate = currentDate.toLocaleDateString([], { day: "numeric", month: "short", year: "numeric" });
    var sentDay = currentDate.toLocaleDateString([], { weekday: "short" });

    var newMessage = {
      content: message,
      sentTime: sentTime,
      sentDate: sentDate,
      sentDay: sentDay,
      reactions: [],
      emojis: [], // Add the extracted emojis to the message object
    };

    // Add the message to the messages array
    messages.push(newMessage);

    // Display the message
    displayMessage(newMessage);
  }


function displayMessage(message) {
      var messageBody = document.getElementById("messageBody");

      var newMessage = document.createElement("div");
      newMessage.classList.add("message", "message-sent");
      newMessage.dataset.messageId = generateMessageId();

      var messageContent = document.createElement("div");
      messageContent.classList.add("message-content");
      messageContent.innerText = message.content;

      var messageDetails = document.createElement("div");
      messageDetails.classList.add("message-details");
      messageDetails.innerText =
      message.sentTime + " | " + message.sentDate + " (" + message.sentDay + ")";

      var messageOptions = document.createElement("div");
      messageOptions.classList.add("message-options");

      newMessage.appendChild(messageContent);
      newMessage.appendChild(messageDetails);
      newMessage.appendChild(messageOptions);

      // Check if there's a reply container and insert the new message after it
      var replyContainers = document.getElementsByClassName("reply-container");
      if (replyContainers.length > 0) {
        var lastReplyContainer = replyContainers[replyContainers.length - 1];
        lastReplyContainer.parentNode.insertBefore(
          newMessage,
          lastReplyContainer.nextSibling
        );
        message.replyTo = lastReplyContainer.dataset.messageId; // Set the replied-to message ID
      } else {
        messageBody.appendChild(newMessage);
      }
      // Scroll to the last message
      messageBody.scrollTop = messageBody.scrollHeight;
    }

    

    function saveMessageToServer(message) {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "save_message.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        console.log("Message saved to database successfully!");
      } else {
        console.error("Failed to save message to database!");
      }
    }
  };

  // Prepare the data to be sent in the request
  const data = "incoming_id=" + encodeURIComponent(incoming_id) + "&outgoing_id=" + encodeURIComponent(outgoing_id) + "&message=" + encodeURIComponent(message);

  // Send the request with the message data
  xhr.send(data);
}


  function loadMessages() {
  // Fetch messages from the database and display them
  fetchAndDisplayMessages();
}



  
function fetchAndDisplayMessages() {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "get_messages.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (xhr.status === 200) {
      const response = JSON.parse(xhr.responseText);
      if (response.success) {
        // Clear existing messages before adding new ones
        messages = [];

        const receivedMessages = response.messages;
        receivedMessages.forEach(function (message) {
          if (message.incoming_msg_user_id == <?php echo $id; ?>) {
            // Display incoming messages
            displayReceivedMessage(message);
          } else {
            // Display outgoing messages
            displaySentMessage(message);
          }
        });
      } else {
        console.error("Failed to fetch messages:", response.error);
      }
    } else {
      console.error("Request failed with status:", xhr.status);
    }
  };

  xhr.onerror = function () {
    console.error("Network error occurred");
  };

  xhr.send();
}


function searchMessages() {
      var searchInput = document.getElementById("searchInput");
      var searchText = searchInput.value.toLowerCase();

      // Clear the input field
      searchInput.value = "";

      var searchResults = messages.filter(function (message) {
        return message.content.toLowerCase().includes(searchText);
      });

      displaySearchResults(searchResults);
    }

    function displaySearchResults(results) {
      var messageBody = document.getElementById("messageBody");
      messageBody.innerHTML = "";

      results.forEach(function (message) {
        displayMessage(message);
      });
    }


function displayReceivedMessage(message) {
    // Create a new message object for received messages
    var newMessage = {
      content: message.message,
      sentTime: message.msg_date,
      reactions: [],
      emojis: [] // Add the extracted emojis to the message object
    };

    // Add the message to the messages array
    messages.push(newMessage);

    // Display the message
    displayMessage(newMessage);
  }

  function saveMessages() {
  // Save the messages array to local storage
  localStorage.setItem("messages", JSON.stringify(messages));
  }

  function generateMessageId() {
    return Math.random().toString(36).substr(2, 9);
  }

  // Load the messages from local storage when the page is loaded
  loadMessages();
  </script>

