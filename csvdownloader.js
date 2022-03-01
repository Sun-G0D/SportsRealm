
fetch("https://v3.football.api-sports.io/fixtures?last=15", { // ?league=4&season=2020 fetch req to the api to get data, params are set with "name=**&name="
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
    downloadObjectAsJson(data.response, "finished");
})
.catch(err => {
    console.error(err);
});

fetch("https://v3.football.api-sports.io/fixtures?next=15", { // ?league=4&season=2020 fetch req to the api to get data, params are set with "name=**&name="
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
    downloadObjectAsJson(data.response, "notstarted");
})
.catch(err => {
    console.error(err);
});

function downloadObjectAsJson(exportObj, exportName){
    var dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(exportObj));
    var downloadAnchorNode = document.createElement('a');
    downloadAnchorNode.setAttribute("href",     dataStr);
    downloadAnchorNode.setAttribute("download", exportName + ".js");
    document.body.appendChild(downloadAnchorNode); // required for firefox
    downloadAnchorNode.click();
    downloadAnchorNode.remove();
  }