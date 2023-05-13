function copyText() {
    // Get the text to copy
    var text = document.getElementById("copy-text").textContent;
    
    // Copy the text to the clipboard
    navigator.clipboard.writeText(text).then(function() {
      // Show the toggle text
      document.getElementById("toggle-text").style.display = "inline";
      
      // Hide the toggle text after 1 second
      setTimeout(function() {
        document.getElementById("toggle-text").style.display = "none";
      }, 1000);
    }, function(err) {
      console.error('Failed to copy text: ', err);
    });
  }
  