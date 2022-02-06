<?php
class Connexion {

	public function __construct(
        private string $host,
        private string $login,
        private string $password,
        private string $db,
        private ?PDO $co,
    ){
		$this->conn();
	}

	private function conn(){
		try
		{
	         $bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8mb4', $this->login, $this->password);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			$bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			$this->co = $bdd;
		}
		catch (PDOException $e)
		{
			die('ERREUR PDO : ' . $e->getMessage());
		}
	}

    public function getCo():PDO{
        return $this->co;
    }

	public function query(string $sql,Array $params = []){
		$query = $this->co->prepare($sql, [
			PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY
		]);
		$query->execute($params);
		return $query;
	}


}
