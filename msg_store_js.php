<?php
// save_message.php

require_once("includes/dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
  $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  // Get the sender's ID from the session or wherever you store it
  session_start(); // Start the session (you may already have this line in your code)

  if (isset($_SESSION['id'])) {
    $outgoing_id = $_SESSION['id']; // Replace 'user_id' with the actual session variable storing the sender's ID
  } else {
    // If the user ID is not available in the session, handle it as per your application's logic.
    echo json_encode(array('success' => false, 'error' => 'User ID not found in session'));
    exit;
  }

  $query = "INSERT INTO messages (incoming_msg_user_id, outgoing_msg_user_id, message, msg_date) VALUES ('$incoming_id', '$outgoing_id', '$message', DATE_FORMAT(NOW(), '%e %M %Y, %h:%i:%s %p'))";
  $result = mysqli_query($conn, $query);

  if ($result) {
    // If the message is saved successfully
    echo json_encode(array('success' => true));
  } else {
    // If there was an error saving the message
    echo json_encode(array('success' => false, 'error' => 'Failed to save message'));
  }
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

  <div class="emoji-container">
    <button class="emoji-button" onclick="addEmoji('😊')">😊</button>
    <button class="emoji-button" onclick="addEmoji('🥰')">🥰</button>
    <button class="emoji-button" onclick="addEmoji('😍')">😍</button>
    <button class="emoji-button" onclick="addEmoji('❤️')">❤️</button>
    <button class="emoji-button" onclick="addEmoji('😢')">😢</button>
    <button class="emoji-button" onclick="addEmoji('😆')">😆</button>
    <button class="emoji-button" onclick="addEmoji('😡')">😡</button>
    <!-- <button class="emoji-button" onclick="addEmoji('👍')">👍</button> -->
    <button class="emoji-button" onclick="addEmoji('👨‍👩‍👧‍👦')">👨‍👩‍👧‍👦</button>
  </div>

<!-- <div class="message-footer">
  <form action="#" class="typing-area"> 
    <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $id; ?>" hidden>
   <input type="text" name="message" id="messageInput" class="input-field" placeholder="Type a message here..." autocomplete="off"> 
    <textarea type="text" name="message" id="messageInput" class="input-field" placeholder="Type a message here..." autocomplete="off"></textarea>
    <button type="button" id="sendMessageButton" onclick="sendMessage()" ><i style="font-size:19px;" class="fa">&#xf1d9;</i></button> <br>
   </form> 
</div> -->

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

      var replyButton = document.createElement("button");
      replyButton.innerText = "Reply";
      replyButton.addEventListener("click", function () {
        displayReplyMessage(newMessage, message.content);
      });

      var removeButton = document.createElement("button");
      removeButton.innerText = "Remove";
      removeButton.addEventListener("click", function () {
        removeMessage(newMessage);
      });

      var reactionButtons = document.createElement("div");
      reactionButtons.classList.add("reaction-buttons");

      var reactionEmojis = ["❤️", "😃", "👍", "👎"]; // Add your desired reaction emojis here

      reactionEmojis.forEach(function (emoji) {
        var reactionButton = document.createElement("button");
        reactionButton.innerText = emoji;
        reactionButton.addEventListener("click", function () {
          addReaction(newMessage, emoji);
        });
        reactionButtons.appendChild(reactionButton);
      });

      messageOptions.appendChild(replyButton);
      messageOptions.appendChild(removeButton);
      messageOptions.appendChild(reactionButtons);

      // Restore reactions for the message if they exist
      if (message.reactions.length > 0) {
        message.reactions.forEach(function (emoji) {
          addReaction(newMessage, emoji);
        });
      }

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
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          console.log("Message saved to database successfully!");
        } else {
          console.error("Failed to save message to database!");
        }
      }
    };
  }

    function loadMessages() {
      // Load the messages array from local storage
      var storedMessages = localStorage.getItem("messages");

      if (storedMessages) {
        messages = JSON.parse(storedMessages);
        messages.forEach(function (message) {
          displayMessage(message);
        });
      }
    }

    function saveMessages() {
    // Save the messages array to local storage
    localStorage.setItem("messages", JSON.stringify(messages));
  }
  
//here start



    function displayReplyMessage(parentMessage, parentContent) {
      // Remove any existing reply container
      removeReplyContainer();

      var messageBody = document.getElementById("messageBody");

      replyContainer = document.createElement("div");
      replyContainer.classList.add("reply-container");
      replyContainer.dataset.messageId = generateMessageId(); // Set a unique ID for the reply container

      var replyMessage = document.createElement("div");
      replyMessage.classList.add("reply-message");
      replyMessage.innerText = "Replying to: " + parentContent;

      var cancelReplyLink = document.createElement("a");
      cancelReplyLink.innerText = "Cancel";
      cancelReplyLink.style.textDecoration = "underline";
      cancelReplyLink.style.color = "red";
      cancelReplyLink.addEventListener("click", function () {
        removeReplyContainer(replyContainer.dataset.messageId);
      });

      replyContainer.appendChild(replyMessage);
      replyContainer.appendChild(cancelReplyLink);

      // Set the background color of the reply container
      replyContainer.style.backgroundColor = "#ddd";

      // Insert the reply container below the message box area
      messageBody.appendChild(replyContainer);

      // Save the messages array back to local storage
      saveMessages();
    }



    function removeReplyContainer(replyToMessageId) {
      if (replyContainer && replyContainer.dataset.messageId === replyToMessageId) {
        var messageBody = document.getElementById("messageBody");
        messageBody.removeChild(replyContainer);
        replyContainer = null;

        // Save the messages array back to local storage
        saveMessages();
      }
    }



    function removeMessage(messageElement) {
      var messageBody = document.getElementById("messageBody");
      messageBody.removeChild(messageElement);

      // Remove the message from the messages array
      var messageId = messageElement.dataset.messageId;
      var index = messages.findIndex(function (message) {
        return message.dataset.messageId === messageId;
      });

      if (index !== -1) {
        messages.splice(index, 1);
      }

      // Save the messages array back to local storage
      saveMessages();
    }

    function addEmoji(emoji) {
      var messageInput = document.getElementById("messageInput");
      messageInput.value += emoji;
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

    function generateMessageId() {
      return Math.random().toString(36).substr(2, 9);
    }



    function addReaction(messageElement, emoji) {
      // Check if the message already has a reaction from the user
      var existingReaction = messageElement.querySelector(".reaction");
      if (existingReaction) {
        // If the same emoji is clicked again, remove the reaction
        if (existingReaction.innerText === emoji) {
          existingReaction.remove();
          removeReactionFromMessage(messageElement.dataset.messageId, emoji);
          saveMessages(); // Save the updated messages to local storage
          return;
        } else {
          // If a different emoji is clicked, replace the existing reaction
          existingReaction.innerText = emoji;
          updateReactionInMessage(messageElement.dataset.messageId, emoji);
          saveMessages(); // Save the updated messages to local storage
          return;
        }
      }

      var reaction = document.createElement("span");
      reaction.classList.add("reaction");
      reaction.innerText = emoji;

      messageElement.appendChild(reaction);
      addReactionToMessage(messageElement.dataset.messageId, emoji);
      saveMessages(); // Save the updated messages to local storage
    }

    function addReactionToMessage(messageId, emoji) {
      var message = messages.find(function (message) {
        return message.dataset.messageId === messageId;
      });

      if (message) {
        message.reactions.push(emoji);
      }
    }

    function updateReactionInMessage(messageId, emoji) {
      var message = messages.find(function (message) {
        return message.dataset.messageId === messageId;
      });

      if (message) {
        var reactionIndex = message.reactions.findIndex(function (reaction) {
          return reaction === emoji;
        });

        if (reactionIndex !== -1) {
          message.reactions[reactionIndex] = emoji;
        }
      }
    }

    function removeReactionFromMessage(messageId, emoji) {
      var message = messages.find(function (message) {
        return message.dataset.messageId === messageId;
      });

      if (message) {
        var reactionIndex = message.reactions.findIndex(function (reaction) {
          return reaction === emoji;
        });

        if (reactionIndex !== -1) {
          message.reactions.splice(reactionIndex, 1);
        }
      }
    }


    // Load the messages from local storage when the page is loaded
    loadMessages();
  </script>
