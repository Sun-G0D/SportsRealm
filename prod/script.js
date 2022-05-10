var displayStartedMatches = sm.response.map(match => {
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

var displayNotStartedMatches = nsm.response.map(match => {
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

//console.log(displayNotStartedMatches);
//console.log(displayStartedMatches);

function inDepthDisplayMatch(matchid) {
    if(nsm.response.find(match => match.fixture.id == matchid) == undefined) {
        fixtureObj = sm.response.find(match => match.fixture.id == matchid);
    } else {
        fixtureObj = nsm.response.find(match => match.fixture.id == matchid);
    }
    console.log(fixtureObj);
    console.log(`${fixtureObj.fixture.status.long}`);
    document.getElementById("detailDisplayMatch").innerHTML = `status: ${fixtureObj.fixture.status.long}`;
}



function updateMatchList() {
    document.getElementById("displayMatch").insertAdjacentHTML('afterbegin', displayStartedMatches);
    document.getElementById("displayMatch").insertAdjacentHTML('afterbegin', displayNotStartedMatches);
}

