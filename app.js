const searchForm = document.querySelector('#flight-search-form');
const searchButton = document.querySelector('#search-button');

searchButton.addEventListener('click', (event) => {
  event.preventDefault();

  // Retrieve the search parameters entered by the user
  const departure = document.getElementById('departure').value;
  const arrival = document.getElementById('arrival').value;
  const date = document.getElementById('date').value;
  const passengers = document.getElementById('passengers').value;

  // Generate the URL for the redirect page with the search parameters as query parameters
  const url = `search-flight.html?departure=${departure}&arrival=${arrival}&date=${date}&passengers=${passengers}`;

  // Set the action attribute of the search form to the generated URL
  searchForm.action = url;

  // Submit the search form to redirect to the new page with the search results
  searchForm.submit();
});
