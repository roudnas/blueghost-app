<?php
include_once "models/User.php";

class Db {
	protected static $path;
	protected static $data = [];

	public static function connect(string $path)
	{
		self::$path = $path;
		$decoded = json_decode(file_get_contents($path))->users;
		foreach ($decoded as $usr)
			self::$data[strtolower($usr->name)] = new User(
				$usr->name, $usr->surname, $usr->email, $usr->note
			);
	}	

	public static function getUsers () : array 
	{
		return self::$data;
	}

	public static function getUser(string $name)
	{
		return self::$data[strtolower($name)]; 
	}

	public static function isDefined(string $name)
	{
		return array_key_exists($name, self::$data);
	}

	public static function addUser(User $user)
	{
		self::$data[$user->url()] = $user;
		self::save();
	}

	public static function delUser(string $param)
	{
		unset(self::$data[strtolower($param)]);
		self::save();
	}

	// Emulating a DB
	public static function save()
	{
		$arr = [];
		foreach (self::$data as $usr)
		{
			$arr["users"][] = [
				"name" => $usr->name(),
				"surname" => $usr->surname(),
				"email" => $usr->email(),
				"note" => $usr->note()
			];
		}
		$json = json_encode($arr);
		file_put_contents(self::$path, ["users" => $json]);
	}

}
?>
