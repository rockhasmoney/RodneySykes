<!-- Create a form for the newsletter subscribe -->
<form id="subscribe-form">
  <!-- Create an input field for the email address -->
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" required>
  <br>
  <!-- Create a button to submit the form -->
  <button type="submit">Subscribe</button>
</form>

<!-- Create a container to display the message -->
<div id="message"></div>

<!-- Add a script to handle the form submission and send the email address to the server -->
<script>
  // Get the form and message container elements
  const form = document.querySelector('#subscribe-form');
  const messageContainer = document.querySelector('#message');

  // Add an event listener for the form submission
  form.addEventListener('submit', (event) => {
    // Prevent the default form submission behavior
    event.preventDefault();

    // Get the email address from the form
    const email = form.email.value;
