<?php

if($_POST["submit"]) {

  // order: name => email => phone => reason => location => message

  $location=$_POST["location"]; // The location the sender is inquiring about (taken from the form)

  if($location == "st-george") {
    $recipientEmail="corndogstgeorge@gmail.com"; // $receipentEmail = the email address the data will be delivered to
  } elseif ($location == "cedar-city") {
    $recipientEmail="thecorndogcompanycedarcity@gmail.com";
  } elseif ($location == "ogden") {
    $recipientEmail="thecorndogcompanyog@gmail.com";
  } elseif ($location == "gilbert") {
    $recipientEmail="thecorndogcompanygilbert@gmail.com";
  } elseif ($location == "eastern-idaho") {
    $recipientEmail="corndogsofeasternidaho@gmail.com";
  } elseif ($location == "eastern-washington") {
    $recipientEmail="thecorndogcompanyeasternwa@gmail.com";
  }

  $subject="New Website Inquiry"; // The message that will be in the subject line

  $sender=$_POST["sender"]; // The sender's name (taken from the form)
  $senderEmail=$_POST["senderEmail"]; // The sender's email address (taken from the form)
  $senderPhone = $_POST["senderPhone"]; // The sender's phone number (taken from the form)
  $senderReason = $_POST["senderReason"]; // The sender's reason for sending form (taken from the form)

  $message=$_POST["message"]; // The sender's message (taken from the form)

  $mailBody="Name: $sender\nEmail: $senderEmail\nPhone: $senderPhone\nReason: $senderReason\nMessage:\n\n$message";
    // << Formats the email >>
    // Name: *Sender's name*/
    // Email: *Sender's email address*/
    // Phone: *Sender's phone number*/
    // Reason: *Sender's reason*/
    // Message:
    //
    // *Sender's message*/


    mail($recipientEmail, $subject, $mailBody, "From: $sender <$senderEmail>"); // Sending the email, using the variables

    $thankYou="<p>Thank you! Your message has been sent.</p>"; // Setting a variable for a confirmation message
    
}

?>



<!DOCTYPE html>
<html>
  <head>
    <title>The Corndog Company</title>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="styles.css" />

    <!-- Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

    <!-- Javascript -->
    <script>

      function openNav() {
        document.getElementById("subNav").style.width = "100%";
      }

      function closeNav() {
        document.getElementById("subNav").style.width = "0%";
      }
    </script>

  </head>

  <body>

    <div class="grid-wrapper-2-col">

      <div class="tile-white nav-tile">
        <div class="nav-container-flex">
          <a class="nav-brand" href="index.html">
            <h2>
              <span style="color: #601426;">The</span> <br>
              <span style="color: var(--primary-background-color);">Corndog</span> <br>
              <span style="color: #AA303E;">Company</span>
            </h2>
          </a>

          <div class="nav-menu">
            <ul>

              <li><a href="menu.html">Menu</a></li>

              <li><a href="contact.html" style="color: var(--primary-background-color);">Contact</a></li>

              <!-- Hidden Sub Menu -->
              <div id="subNav" class="overlay">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <div class="overlay-content">
                  <a href="locations-st-george.html">St. George, Utah</a>
                  <a href="locations-cedar-city.html">Cedar City, Utah</a>
                  <a href="locations-ogden.html">Ogden, Utah</a>
                  <a href="locations-gilbert.html">Gilbert, Arizona</a>
                  <a href="locations-eastern-idaho.html">Eastern Idaho</a>
                  <a href="locations-eastern-washington.html">Eastern Washington</a>
                </div>
              </div>
              <li onclick="openNav()">Locations</li>
            </ul>
          </div>

        </div>
      </div>

    </div> <!-- End 2-col-grid -->

    <!-- Contact Form Section -->
    <div class="section">

      <h1 class="contact-page-section-header">
          Let's talk.
      </h1>

      <div class="contact-page-form-container">

          <?=$thankYou ?>

         <form action="contact.php" method="POST">
            <label for="sender">Name <span style="color: red;">*</span></label>
            <input type="text" id="sender" name="sender" placeholder="Your name.." required>

            <label for="senderEmail">Email <span style="color: red;">*</span></label>
            <input type="text" id="senderEmail" name="senderEmail" placeholder="Your email.." required>

            <label for="senderPhone">Phone Number</label>
            <input type="tel" id="senderPhone" name="senderPhone" placeholder="XXX-XXX-XXXX"
                   pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">

            <label for="senderReason">Reason <span style="color: red;">*</span></label>
            <select id="senderReason" name="senderReason" required>
              <option value="" disabled selected hidden>Select your option</option>
              <option value="comments">Comments and Recommendations</option>
              <option value="catering">Catering</option>
              <option value="private-event">Private Event</option>
              <option value="other">Other</option>
            </select>

            <label for="location">Location <span style="color: red;">*</span></label>
            <select id="location" name="location" required>
              <option value="" disabled selected hidden>Select your option</option>
              <option value="st-george">St. George, Utah</option>
              <option value="cedar-city">Cedar City, Utah</option>
              <option value="ogden">Ogden, Utah</option>
              <option value="gilbert">Gilbert, Arizona</option>
              <option value="eastern-idaho">Eastern Idaho</option>
              <option value="eastern-washington">Eastern Washington</option>
            </select>


            <label for="message">Message <span style="color: red;">*</span></label>
            <textarea id="message" name="message" placeholder="Your Message.."></textarea>

            <input type="submit" value="Send" name="submit" class="btn-secondary btn-responsive raise">


        </form>

      </div>

    </div>


    <div class="grid-wrapper-footer">

      <div class="tile-white footer-bottom-tile">
        <div class="footer-container">

            <div class="footer-copyright">
              <p>&#169; 2020-2021 The Corndog Company. All rights reserved.</p>
            </div>

            <div class="footer-devtag">
              <p>
                Written, designed, and built by
                <a href="https://holdenhalford.com" style="text-decoration: underline;">Holden Halford</a>.
              </p>
            </div>

        </div>
      </div>


    </div>

  </body>
</html>
