<?php 
/**
 *  DB manager Class
 */
class db{
    /**
     * Define static variable 
     */
    private static $host = "localhost:3306";
    private static $username = "root";
    private static $password = "";
    private static $database = "warehouse";
    private static $coding = "utf8";
    private static $instance = null;
    private $conn = "";
    /**
     * Constructor 
     */
    public function __construct(){
        $this->conn = mysqli_connect(self::$host,self::$username,self::$password);
        if(mysqli_connect_errno($this->conn)){
            die("Could not connect mysql database");
        }else{
            mysqli_select_db($this->conn,self::$database);
            mysqli_set_charset($this->conn, self::$coding);
        }
    }
    /** Singleton -> egyszerre csak egy példány létezhez */
    public static function get(){
        if(is_null(self::$instance)){
            self :: $instance = new db;
        }
        return self::$instance;
    }
    /**
     * Usage $db = db::get();
     *  $db->query("SELECT * FROM 'USER'");
     * Művelet végrehajtása -> INSERT | UPDATE | DELETE
     */
    public function query($queryString){
        $result = mysqli_query($this->conn,$queryString);
        if(!$result){
            $this->error(mysqli_error($this->conn),$queryString);
        }
        return $result;
    }
    /**
     * Insert ID -> last insert id
     */
    public function insert_id(){
        return mysqli_insert_id($this->conn);
    }
    /* Elérhető sorok száma */
    public function numrows($queryString){
        $result = $this->query($queryString);
        return mysqli_num_rows($result);
    }
    public function getRow($queryString){
        $result = $this->query($queryString);
        return mysqli_fetch_assoc($result);
    }
    public function getArray($queryString){
        $rows = array();
        $result = $this->query($queryString);
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    public function error($error,$query){
        die("SQL err".$error."<br> with the following query: ".$query);
    }
    public function escape($string){
        return mysqli_real_escape_string($this->conn, $string);
    }
}