<?php 

class UserDAO { 
    function get( $username ) {
        
        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare select
        $sql = "SELECT uid, hashed_pw FROM userinfo WHERE uid = :username";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
            
        $user = null;
        if ( $stmt->execute() ) {
            
            while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
                $user = new User($row["uid"], $row["hashed_pw"], $row['password'], $row['email'], $row['address']);
            }
        }
        else {
            $connMgr->handleError( $stmt, $sql );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $user;
    }

    function create($user) {
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->connect();
        
        // prepare insert
        $sql = "INSERT INTO userinfo (uid, hashed_pw, password, email, address) VALUES (:username, :passwordHash, :pw, :email, :address)";
        $stmt = $conn->prepare($sql);
        
        $username = $user->getUsername();
        $passwordHash = $user->getPasswordHash();
        $pw = $user->getPassword(); 
        $email = $user->getEmail(); 
        $address = $user->getAddress(); 

        $stmt->bindParam(":username", $username, PDO::PARAM_STR);
        $stmt->bindParam(":passwordHash", $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(":pw", $pw, PDO::PARAM_STR); 
        $stmt->bindParam(":email", $email, PDO::PARAM_STR); 
        $stmt->bindParam(":address", $address, PDO::PARAM_STR); 
        

        $result = $stmt->execute();
        if (! $result ){ // encountered error
            $parameters = [ "user" => $user, ];
            $connMgr->handleError( $stmt, $sql, $parameters );
        }
        
        // close connections
        $stmt = null;
        $conn = null;        
        
        return $result;
    }
}

?>  
