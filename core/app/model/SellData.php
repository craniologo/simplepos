<?php
	class SellData {
		public static $tablename = "sell";

		public function __construct(){
			$this->ref_id = "";
			$this->person_id = "";
			$this->operation_type_id = "";
			$this->box_id = "";
			$this->total = "";
			$this->discount = "";
			$this->user_id = "";
			$this->created_at = "NOW()";
		}

		public function getPerson(){ return PersonData::getById($this->person_id); }
		public function getUser(){ return UserData::getById($this->user_id); }

		public function add(){
			$sql = "insert into ".self::$tablename." (ref_id,total,discount,user_id,created_at) ";
			$sql .= "value (\"$this->ref_id\",\"$this->total\",\"$this->discount\",$this->user_id,$this->created_at)";
			return Executor::doit($sql);
		}

		public function add_with_client(){
			$sql = "insert into ".self::$tablename." (ref_id,total,discount,person_id,user_id,created_at) ";
			$sql .= "value (\"$this->ref_id\",\"$this->total\",\"$this->discount\",\"$this->person_id\",$this->user_id,$this->created_at)";
			return Executor::doit($sql);
		}

		public function add_re(){
			$sql = "insert into ".self::$tablename." (ref_id,user_id,operation_type_id,total,created_at) ";
			$sql .= "value (\"$this->ref_id\",$this->user_id,1,\"$this->total\",$this->created_at)";
			return Executor::doit($sql);
		}

		public function add_re_with_client(){
			$sql = "insert into ".self::$tablename." (ref_id,person_id,operation_type_id,total,user_id,created_at) ";
			$sql .= "value (\"$this->ref_id\",\"$this->person_id\",1,\"$this->total\",$this->user_id,$this->created_at)";
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

		public function update_box(){
			$sql = "update ".self::$tablename." set box_id=$this->box_id where id=$this->id";
			Executor::doit($sql);
		}

		public function update_box_null(){
			$sql = "update ".self::$tablename." set box_id=NULL where id=$this->id";
			Executor::doit($sql);
		}

		public static function getById($id){
			 $sql = "select * from ".self::$tablename." where id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new SellData());
		}

		public static function getSells(){
			$sql = "select * from ".self::$tablename." where operation_type_id=2 order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getSellsByUser($id){
			$sql = "select * from ".self::$tablename." where operation_type_id=2 and user_id=$id order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getSellsUnBoxed(){
			$sql = "select * from ".self::$tablename." where operation_type_id=2 and box_id is NULL order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getByBoxId($id){
			$sql = "select * from ".self::$tablename." where operation_type_id=2 and box_id=$id order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getRes(){
			$sql = "select * from ".self::$tablename." where operation_type_id=1 order by id desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getAllByPage($start_from,$limit){
			$sql = "select * from ".self::$tablename." where id<=$start_from limit $limit";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getAllByDateOp($start,$end,$op){
	  		$sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and operation_type_id=$op order by created_at desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getAllByDateBCOp($clientid,$start,$end,$op){
	 		$sql = "select * from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and client_id=$clientid  and operation_type_id=$op order by created_at desc";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function getGroupByDateOp($start,$end,$op){
	  		$sql = "select sum(total) as tot,sum(total) as t,count(*) as c from ".self::$tablename." where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and operation_type_id=$op";
			$query = Executor::doit($sql);
			return Model::many($query[0],new SellData());
		}

		public static function countByStatusId($id){
			$sql = "select count(*) as c from ".self::$tablename." where operation_type_id=$id";
			$query = Executor::doit($sql);
			return Model::one($query[0],new SellData());
		}

		public static function getLastSell(){
			$sql = "select * from ".self::$tablename." where operation_type_id=2 order by ref_id desc limit 1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new SellData());
		}

		public static function getLastRe(){
			$sql = "select * from ".self::$tablename." where operation_type_id=1 order by ref_id desc limit 1";
			$query = Executor::doit($sql);
			return Model::one($query[0],new SellData());
		}

	}

?>