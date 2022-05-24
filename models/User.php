<?php
class User {
	protected $name;
	protected $surname;
	protected $email;
	protected $note;
	protected $url;

	function __construct(string $name, string $surname, string $email, string $note)
	{
		$this->name = htmlspecialchars($name);
		$this->surname = htmlspecialchars($surname);
		$this->email = htmlspecialchars($email);
		$this->note = htmlspecialchars($note);
		$this->url = htmlspecialchars(strtolower($name));
	}

	public function name(): string 
	{
		return $this->name;
	}

	public function surname(): string 
	{
		return $this->surname;
	}

	public function email(): string 
	{
		return $this->email;
	}

	public function note(): string 
	{
		return $this->note;
	}

	public function url(): string 
	{
		return $this->url;
	}

	public function validate() : void
	{
		if ( !filter_var($this->email, FILTER_VALIDATE_EMAIL) )
			throw new Error("Validation failed");
	}

}

?>
