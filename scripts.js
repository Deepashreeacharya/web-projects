 // Get references to the password input field and the toggle button
 const passwordInput = document.getElementById('t4');
 const togglePassword = document.getElementById('toggle-password');
 
 // Add event listener for toggling password visibility
 togglePassword.addEventListener('click', function() {
     // Check if the password is currently hidden or visible
     const isPasswordHidden = passwordInput.type === 'password';
 
     // Toggle the type of the password field
     if (isPasswordHidden) {
         passwordInput.type = 'text'; // Show password
         togglePassword.textContent = '👁️'; // Change icon to a closed eye
     } else {
         passwordInput.type = 'password'; // Hide password
         togglePassword.textContent = '🙈'; // Change icon back to an open eye
     }
 }); 