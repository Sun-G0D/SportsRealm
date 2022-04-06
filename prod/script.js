var displayStartedMatches = startedMatches.map(match => {
    return `
        <li onclick="inDepthDisplayMatch(${match.fixture.id});" style="cursor: pointer;" class="apiBorder"> 
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
        <li onclick="inDepthDisplayMatch(${match.fixture.id});" style="cursor: pointer;" class="apiBorder"> 
            <div>
                <p class="smallDisplayText">
                    Home Team: ${match.teams.home.name} vs. Away Team: ${match.teams.away.name}
                </p>
            </div>
        </li>
    `;
}).join(' ');

function inDepthDisplayMatch(matchid) {
    if(notStartedMatches.find(match => match.fixture.id == matchid) == undefined) {
        fixtureObj = startedMatches.find(match => match.fixture.id == matchid);
    } else {
        fixtureObj = notStartedMatches.find(match => match.fixture.id == matchid);
    }
    console.log(fixtureObj);
    console.log(`${fixtureObj.fixture.status.long}`);
    document.getElementById("detailDisplayMatch").innerHTML = `status: ${fixtureObj.fixture.status.long}`;
}



function updateMatchList() {
    document.getElementById("displayMatch").insertAdjacentHTML('afterbegin', displayStartedMatches);
    document.getElementById("displayMatch").insertAdjacentHTML('afterbegin', displayNotStartedMatches);
}

