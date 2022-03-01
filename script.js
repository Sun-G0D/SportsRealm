var displayStartedMatches = startedMatches.map(match => {
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

var displayNotStartedMatches = notStartedMatches.map(match => {
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

console.log(displayNotStartedMatches);
console.log(displayStartedMatches);
function updateMatchList() {
    document.getElementById("displayMatch").insertAdjacentHTML('afterbegin', displayStartedMatches);
    document.getElementById("displayMatch").insertAdjacentHTML('afterbegin', displayNotStartedMatches);
}
