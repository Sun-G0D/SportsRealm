const legName = `<p>k;llkj</p>`;

fetch("https://v3.football.api-sports.io/fixtures?next=2", { // ?league=4&season=2020 fetch req to the api to get data, params are set with "name=**&name="
    "method": "GET",
    "headers": {
        "x-apisports-key": "33f39848c59f36bde81b32221df49f0f", //our own api key
        "x-rapidapi-host": "v3.football.api-sports.io"
    }
})
.then(response => { // promise for doing the response body mixin
    if(!response.ok) {
        throw Error("ERROR"); //if fetch req url is wrong, will say error
    }
    return response.json(); // to make sure the other promise doesnt run until after mixin
})
.then(data => {  // another promise to get the actual response
    console.log(data.response);
    const html = data.response.map(match => {
        return `
            <li onclick="inDepthDisplayMatch();" style="cursor: pointer;" class="apiBorder"> 
                <div>
                    <p class="smallDisplayText">
                        Home Team: ${match.teams.home.name} vs. Away Team: ${match.teams.away.name}
                    </p>
                </div>
            </li>
        `;

    }).join(' ');

    

    console.log(html);
    document
    .getElementById("displayMatch")
    .insertAdjacentHTML('afterbegin', html); //changes the html element where we want to display data
})
.catch(err => {
    console.error(err);
});

function inDepthDisplayMatch() {
    document
    .getElementById("detailDisplayMatch")
    .insertAdjacentHTML('afterbegin', legName);
    alert("asdf");
}

