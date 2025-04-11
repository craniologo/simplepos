<?php
	class UserData {
		public static $tablename = "user";

		public function __construct(){
			$this->name = "";
			$this->lastname = "";
			$this->username = "";
			$this->address = "";
			$this->email = "";
			$this->password = "";
			$this->image = "";
			$this->is_active = "";
			$this->kind = "";
			$this->created_at = "NOW()";
		}

		public function add(){
			$sql = "insert into user (name,lastname,username,address,email,password,kind,created_at) ";
			$sql .= "value (\"$this->name\",\"$this->lastname\",\"$this->username\",\"$this->address\",\"$this->email\",\"$this->password\",\"$this->kind\",$this->created_at)";
			Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id=$this->id";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto

		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\",lastname=\"$this->lastname\",username=\"$this->username\",address=\"$this->address\",email=\"$this->email\",image=\"$this->image\",is_active=\"$this->is_active\",kind=\"$this->kind\" where id=$this->id";
			Executor::doit($sql);
		}

		public function update_passwd(){
			$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
			Executor::doit($sql);
		}

		public function update_image(){
			$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new UserData());
		}

		public static function getByMail($mail){
			$sql = "select * from ".self::$tablename." where email=\"$mail\"";
			$query = Executor::doit($sql);
			return Model::one($query[0],new UserData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename;
			$query = Executor::doit($sql);
			return Model::many($query[0],new UserData());
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			return Model::many($query[0],new UserData());
		}

	}

?>