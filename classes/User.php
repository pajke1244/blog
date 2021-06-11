<?php 
//nasledjuemo klasu QueryBuilder da bi mogli da pristupimo konekciji
class User extends QueryBuilder {
	//varijabla koja nam sluzi za ispis notifikacije
	public $register_result = NULL;
		//varijabla koja nam sluzi za ispis notifikacije da li je korisnik logovan
	public $login_result = NULL;

//pravimo metodu koja ce registrovari korisnika
	public function registerUser(){
		$name = $_POST['register_name'];
		$email = $_POST['register_email'];
		$password = $_POST['register_password'];

		$sql = "INSERT INTO users values (null,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->execute([$name,$email,$password]);
		//ako je registracija uspela pojavice se div u formu sa ispisom notifikacije!!!
		if ($query) {
			$this->register_result=true;
		}
	}
//pravimo funkciju koja ce logovati korisnika

	public function logUser(){
		$email = $_POST['login_email'];
		$password = $_POST['login_password'];

		$sql = "SELECT * FROM users where email = ? and password = ? ";
		$query = $this->db->prepare($sql);
		$query->execute([$email,$password]);
		//rezultat smestamo u promenljivu loggedUser i stavljamo samo fetch zzbog toga sto vraca jedan rezultat

		$loggedUser = $query->fetch(PDO::FETCH_OBJ);

		if ($loggedUser != NULL) {
			//dodeljujemo sesiji celog usera (OBJEKAT)
			$_SESSION['loggedUser'] = $loggedUser;
			//ovde dodeljujemo usera iz baze varijabli login_result!!!
			$this->login_result = $loggedUser;
		}
	}
	//metoda koja vraca id korisnika ciji je oglas!!!
	public function getUserWithId($id){

		$sql = "Select * from users where id = ?";
		$query = $this->db->prepare($sql);
		$query->execute([$id]);

		$postOwner = $query->fetch(PDO::FETCH_OBJ);
		return $postOwner;
	}

}

?>