<?php
	class BoxData {
		public static $tablename = "box";

		public function __construct(){
			$this->id = "";
			$this->user_id = "";
			$this->created_at = "NOW()";
		}

		public function getUser(){ return UserData::getById($this->user_id); }

		public function add(){
			$sql = "insert into box (user_id,created_at) ";
			$sql .= "value ($this->user_id,$this->created_at)";
			return Executor::doit($sql);
		}

		public static function delById($id){
			$sql = "delete from ".self::$tablename." where id=$id";
			Executor::doit($sql);
		}
		public function del(){
			$sql = "delete from ".self::$tablename." where id=$this->id";
			Executor::doit($sql);
		}

		// partiendo de que ya tenemos creado un objecto BoxData previamente utilizamos el contexto

		public function update(){
			$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			$sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			$found = null;
			$data = new BoxData();
			while($r = $query[0]->fetch_array()){
				$data->id = $r['id'];
				$data->user_id = $r['user_id'];
				$data->created_at = $r['created_at'];
				$found = $data;
				break;
			}
			return $found;
		}

		public static function getAll(){
			$sql = "select * from ".self::$tablename." order by id desc";
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;
			while($r = $query[0]->fetch_array()){
				$array[$cnt] = new BoxData();
				$array[$cnt]->id = $r['id'];
				$array[$cnt]->user_id = $r['user_id'];
				$array[$cnt]->created_at = $r['created_at'];
				$cnt++;
			}
			return $array;
		}

		public static function getLike($q){
			$sql = "select * from ".self::$tablename." where name like '%$q%'";
			$query = Executor::doit($sql);
			$array = array();
			$cnt = 0;
			while($r = $query[0]->fetch_array()){
				$array[$cnt] = new BoxData();
				$array[$cnt]->id = $r['id'];
				$array[$cnt]->user_id = $r['user_id'];
				$array[$cnt]->created_at = $r['created_at'];
				$cnt++;
			}
			return $array;
		}

	}

?>