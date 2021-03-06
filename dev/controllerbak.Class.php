<?php
class Connect extends PDO{
    public function __construct(){
        parent::__construct("mysql:host=sql202.epizy.com;dbname=epiz_31292830_SportsRealm", 'epiz_31292830', 'E98DahqaEQJvv',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"));
        $this->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
}
class Controller {
    // Print data to the screen
    function printData($id, $sess){
        $servername = "sql202.epizy.com";
        $username = "epiz_31292830";
        $password = "E98DahqaEQJvv";
        $dbname = "epiz_31292830_SportsRealm";
        $db = new mysqli($servername, $username, $password, $dbname);
        $user = $db -> query("SELECT * FROM users WHERE id=1 AND session='session'");
        
        $content = '
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Avatar</th>
                <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>';
        while($userInfo = $user -> fetch_assoc()){
            echo "id: " . $userInfo["f_name"]. " - Name: " . $userInfo["l_name"]. " " . $userInfo["email"]. "<br>";
            $content .= '
            <tr>
                <td>'.$userInfo["f_name"].'</td>
                <td>'.$userInfo["l_name"].'</td>
                <td><img style="max-width: 50px;" src="'.$userInfo["avatar"].'" alt="User Avatar"></td>
                <td>'.$userInfo["email"].'</td>
            </tr>
            ';
        }
        $content .= '</tbody></table>
        ';
        return $content;
    }
    // check if user is logged in
    function checkUserStatus($id, $sess){
        $db = new Connect;
        $user = $db -> prepare("SELECT id FROM users WHERE id=:id AND session=:session");
        $user -> execute([
            ':id'       => intval($id),
            ':session'  => $sess
        ]);
        $userInfo = $user -> fetch(PDO::FETCH_ASSOC);
        if(!$userInfo["id"]){
            return FALSE;
        }else{
            return TRUE;
        }
    }
    // function for generating password and login session
    function generateCode($length){
		$chars = "vwxyzABCD02789";
		$code = ""; 
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length){ 
			$code .= $chars[mt_rand(0,$clen)];
		}
		return $code;
    }
    
    function insertData($data){
        $db = new Connect;
        $checkUser = $db -> prepare("SELECT * FROM users WHERE email=:email");
        $checkUser -> execute(array(
            'email' => $data['email']
        ));
        $info = $checkUser -> fetch(PDO::FETCH_ASSOC);
        
        if(!$info["id"]){
            $session = $this -> generateCode(10);
            $insertNewUser = $db -> prepare("INSERT INTO users (f_name, l_name, avatar, email, password, session) VALUES (:f_name, :l_name, :avatar, :email, :password, :session)");
            $insertNewUser -> execute([
                ':f_name'   => $data["givenName"],
                ':l_name'   => $data["familyName"],
                ':avatar'   => $data["avatar"],
                ':email'    => $data["email"],
                ':password' => $this -> generateCode(5),
                ':session'  => $session
            ]);
            if($insertNewUser){
                setcookie("id", $db->lastInsertId(), time()+60*60*24*30, "/", NULL);
                setcookie("sess", $session, time()+60*60*24*30, "/", NULL);
                echo("jcasdf");
            }else{
                return "Error inserting user!";
            }
        }else{
            setcookie("id", $info['id'], time()+60*60*24*30, "/", NULL);
            setcookie("sess", $info["session"], time()+60*60*24*30, "/", NULL);
            header('Location: home.php');
            exit();
        }
    }
}
?>