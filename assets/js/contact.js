document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector('.php-email-form');
  
    form.addEventListener('submit', function(event) {
      var name = document.getElementById('name');
      var email = document.getElementById('email');
      var subject = document.getElementById('subject');
      var message = document.getElementById('message');
      var errorElement = document.querySelector('.error-message');
  
      var isValid = true;
  
      // Check if name is empty
      if (name.value.trim() === '') {
        errorElement.innerHTML = 'Name is required';
        isValid = false;
      }
  
      // Check if email is empty or not a valid email address
      if (email.value.trim() === '') {
        errorElement.innerHTML = 'Email is required';
        isValid = false;
      } else if (!isValidEmail(email.value.trim())) {
        errorElement.innerHTML = 'Enter a valid email address';
        isValid = false;
      }
  
      // Check if subject is empty
      if (subject.value.trim() === '') {
        errorElement.innerHTML = 'Subject is required';
        isValid = false;
      }
  
      // Check if message is empty
      if (message.value.trim() === '') {
        errorElement.innerHTML = 'Message is required';
        isValid = false;
      }
  
      if (!isValid) {
        // Prevent form submission if validation fails
        event.preventDefault();
      }
    });
  
    function isValidEmail(email) {
      // Regular expression for a valid email address
      var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
  });