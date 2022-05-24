<?php 
require_once 'controllers/Controller.php';
require_once 'models/User.php';
require_once 'models/Db.php';

class UserController extends Controller {

	public function __construct(array $reqUri)
	{
		$this->view = 'users';
		parent::__construct($reqUri);
	}
	
	public function handleParams()
	{
		if ( $this->post("add-user") )
			return $this->handleAddUser();

		if ( $this->post("edit-user") && Db::isDefined($_POST['id']) )
			return $this->handleEditUser($_POST['id']);

		if ( !$this->paramDefined(0) )
		{
			$this->data["users"] = Db::getUsers();
			return;
		}

		if ( $this->param(0) === "delete" && Db::isDefined($this->param(1)) )
			return $this->handleDeleteUser($this->param(1));	

		if ( !Db::isDefined($this->param(0)) )
			$this->redir("/");

		$this->view = 'edit-user';
		$this->data['user'] = Db::getUser($this->param(0));	

	}

	protected function handleAddUser() : void
	{
		try {
			$user = new User(
				$_POST["name"], $_POST["surname"], $_POST["email"], $_POST["note"]
			);	
			$user->validate();
			Db::addUser($user);
			$this->redir("/");
		} catch (Error $e)
		{
			// There'd be a session error write, usually
			$this->redir("/");
		}

	}

	protected function handleEditUser(string $id) : void
	{
		try {
		$user = new User($_POST["name"], $_POST["surname"], $_POST["email"], $_POST["note"]);	
		Db::delUser($id);	
		Db::addUser($user);
		$this->redir("/");
		} catch (Error $e)
		{
			// There'd be a session error write, usually
			$this->redir("/");
		}
	}

	protected function handleDeleteUser(string $param)
	{
		Db::delUser($param);
		$this->redir("/");
	}

}
?>
