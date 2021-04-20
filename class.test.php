class Test {
	
	public function __construct($user='root', $password='', $database='jasaweb_webdb', $host = 'localhost') {
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->host = $host;
	}
	
	protected function connect() {
		return new mysqli($this->host, $this->user, $this->password, $this->database);
	}
	
	public function query($query) {
		$db = $this->connect();
		$result = $db->query($query);
		
		while ( $row = $result->fetch_object() ) {
			$results[] = $row;
		}
		
		return $results;
	} 
		
	public function SaveLog($type, $search, $imdbID)
	{
		$db = $this->connect();
		$sql = "INSERT INTO tb_log(Type, Search, imdbID) VALUE('$type','$search', '$imdbID')";		
		$result = $db->query($sql);
		return $result;
	}	
}