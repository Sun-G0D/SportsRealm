/*var url = new URL(window.location.href);
var search_params = url.searchParams;

// timezone param value set to Europe to get matches data from this timezone
search_params.set('timezone', 'Europe/London');

// change the search property of the main url
url.search = search_params.toString();

// the new url string
var new_url = url.toString();

fetch("https://v3.football.api-sports.io/fixtures?live=all", {
    "method": "GET",
    "headers": {
        "x-apisports-key": "33f39848c59f36bde81b32221df49f0f",
        "x-rapidapi-host": "v3.football.api-sports.io"
    }
})
.then(response => {
    console.log(response);
})
.catch(err => {
    console.error(err);
});

*/