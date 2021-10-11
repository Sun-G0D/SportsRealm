fetch("https://v3.football.api-sports.io/fixtures", {
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