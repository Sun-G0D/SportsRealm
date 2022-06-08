<?php
    require_once('config.php');
    require_once('core/controller.Class.php');

    $Controller = new Controller;
?>
<!DOCTYPE HTML>

<html>
    <head>
        <script src="started.js"></script>
        <script src="notStarted.js"></script>
    </head> 

    <body>
        <script>
            
            nsm =
                <?php
                    $curl = curl_init();

                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://v3.football.api-sports.io/fixtures?next=15',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            'x-rapidapi-key: 33f39848c59f36bde81b32221df49f0f',
                            'x-rapidapi-host: v3.football.api-sports.io'
                        ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                    echo $response;

                    $dec = json_decode($response,true)["response"];

                    foreach ($dec as $value) {
                        $Controller -> updateMatches($value["fixture"]["id"],$value["fixture"]["status"]["long"]);
                    }
                ?>;



            sm =
                <?php
                    $curl = curl_init();
        
                    curl_setopt_array($curl, array(
                        CURLOPT_URL => 'https://v3.football.api-sports.io/fixtures?last=15',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_ENCODING => '',
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 0,
                        CURLOPT_FOLLOWLOCATION => true,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => 'GET',
                        CURLOPT_HTTPHEADER => array(
                            'x-rapidapi-key: 33f39848c59f36bde81b32221df49f0f',
                            'x-rapidapi-host: v3.football.api-sports.io'
                        ),
                    ));

                    $response = curl_exec($curl);

                    curl_close($curl);
                    echo $response;
                    $Controller -> cleanMatches();
                ?>;

            console.log(<?php echo json_encode($response, true)?>);
    
            /*console.log(nsm);

            var dnsm = nsm.response.map(match => {
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

            console.log(dnsm);*/
        </script>
    </body>
</html>

