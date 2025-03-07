<?php
	class ReadjustData {
		public static $tablenam3 = "readjust";

		public function __construct(){
			$this->operation_id = "";
			$this->justify = "";
			$this->user_id = "";
			$this->created_at = "NOW()";
		}

		public function getUser(){ return UserData::getById($this->user_id);}

		public function add(){
			$sql = "insert into readjust (operation_id,justify,user_id,created_at) ";
			$sql .= "value ($this->operation_id,\"$this->justify\",$this->user_id,$this->created_at)";
			Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablenam3." where id=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablenam3." where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablenam3." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ReadjustData());
		}

		public static function getByOperation($id){
			$sql = "select * from ".self::$tablenam3." where operation_id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new ReadjustData());
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablenam3." order by created_at ";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ReadjustData());
		}

		public static function getAllByUser($id){
			$sql = "select * from ".self::$tablenam3." where user_id=$id order by created_at desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new ReadjustData());
		}

	}

?>