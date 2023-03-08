<?php
 
class Database
{
    public $host;
    public $db_name;
    public $username;
    public $password;
    public $conn;

    public function __construct($host, $db_name, $username, $password)
    {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }

    public function connect()
    {

        
        $this->conn = null;

        
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        
        return $this->conn;
    } 



    //******************************************************************* */


    public function query($sql, $data = array())
{
    $req = $this->conn->prepare($sql);
    $req->execute($data);
    return $req->fetchAll(PDO::FETCH_OBJ);
}
}
?>