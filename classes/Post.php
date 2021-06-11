<?php 

class Post extends QueryBuilder {

	public $new_post_status = NULL;

	public function createPost(){
		$title = $_POST['post_title'];
		$post_description = $_POST['post_description'];
		$createdAt = date('d-m-Y');
		$user_id = $_SESSION['loggedUser']->id;
		$sql = "INSERT INTO posts values (NULL,?,?,?,?)";
		$query = $this->db->prepare($sql);
		$query->execute([$title,$post_description,$user_id,$createdAt]);
		if ($query) {
			$this->new_post_status= true;
		}else{
			$this->new_post_status= false;
		}
		
	}
	//metoda za brisanje posta

	 public function deletePost($id)
	 {
	 	$sql= "DELETE FROM posts where id = ?";
	 	$query = $this->db->prepare($sql);
	 	$query->execute([$id]);
	 
	 }


}


?>