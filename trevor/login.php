<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
  <div class="login-container">
    <h1>LOGIN</h1>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          // Set the login tab as active by default
          document.querySelector('.tab-link[data-tab="login-tab"]').classList.add('active');
          document.getElementById('login-tab').classList.add('active');

          // Add event listener to tab links for tab switching
          var tabLinks = document.querySelectorAll('.tab-link');
          tabLinks.forEach(function(link) {
              link.addEventListener('click', function() {
                  var tabName = this.dataset.tab;
                  switchTab(tabName);
              });
          });
      });

      function switchTab(tabName) {
          var tabLinks = document.querySelectorAll('.tab-link');
          var tabContents = document.querySelectorAll('.tab-content');

          // Remove active class from all tab links and contents
          tabLinks.forEach(function(link) {
              link.classList.remove('active');
          });

          tabContents.forEach(function(content) {
              content.classList.remove('active');
          });

          // Add active class to the clicked tab link and corresponding content
          document.querySelector('.tab-link[data-tab="' + tabName + '"]').classList.add('active');
          document.getElementById(tabName).classList.add('active');
      }
  </script>
  </div>
</body>
</html>