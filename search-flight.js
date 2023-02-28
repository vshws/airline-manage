// Retrieve search criteria from query parameters
const urlParams = new URLSearchParams(window.location.search);
const departure = urlParams.get('departure');
const arrival = urlParams.get('arrival');
const date = urlParams.get('date');
const passengers = urlParams.get('passengers');

// Send HTTP request to server to retrieve search results
const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    // Display search results in container
    const searchResults = document.getElementById('search-results');
    searchResults.innerHTML = this.responseText;
  }
};
xhttp.open('GET', `search-flight.php?departure=${departure}&arrival=${arrival}&date=${date}&passengers=${passengers}`, true);
xhttp.send();
