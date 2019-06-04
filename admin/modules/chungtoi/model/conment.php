<?php
class Conment {
	private $conment;
	public function __construct() {
		global $_web;
		$this->lang = $_web['lang'];
		$this->conment = new system\Model('conment');
		$this->why_me = new system\Model('why_me');
	}
	public function getALLposts() {
		$select = "conment.*";
		$this->conment->orderBy("conment.create_time", "DESC");
		$result = $this->conment->get(null, null, $select);
		return $result;
	}
	public function getpostsOfId($id) {
		$select = "conment.*";
		$this->conment->orderBy("create_time", "DESC");
		$this->conment->where('author_create', $id);
		$result = $this->conment->get(null, null, $select);
		return $result;
	}
	public function getPagiposts($start, $limit) {
		$select = "conment.*";
		$this->conment->orderBy("conment.create_time", "DESC");
		$result = $this->conment->get(null, array($start, $limit), $select);
		return $result;
	}
	public function update($data, $id) {
		$this->why_me->where('id', $id);
		$this->why_me->update($data);
	}
	public function delete($id) {
		$this->why_me->where('id', $id);
		$this->why_me->delete();
	}
	public function insertData($data_insert) {
		$this->why_me->insert($data_insert);
	}

	public function checkId($id) {
		$this->why_me->where('id', $id);
		$result = $this->why_me->num_rows();
		if ($result > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function getUserById($id) {
		$select = "why_me.*";
		$this->why_me->where('why_me.id', $id);
		$result = $this->why_me->getOne(null, $select);
		return $result;
	}

	public function findSearch($search) {
		$select = "why_me.*";
		$this->why_me->where('why_me.title', '%' . $search . '%', 'like');
		$result = $this->why_me->get(null, null, $select);
		return $result;
	}
	public function dellWhereInArray($name_id) {
		$name = implode(",", $name_id);
		$sql = "DELETE FROM why_me WHERE id IN (" . $name . ")";
		$this->why_me->rawQuery($sql);
	}
	public function statusNew($id, $data) {
		$this->why_me->where('id', $id);
		$this->why_me->update($data);
	}
	public function getWhyChooseWe(){
		$select = "why_me.*";
		$this->why_me->where('status',1);
		$this->why_me->orderBy('id',"DESC");
		$data = $this->why_me->get(null,array(0,3),$select);
		return  $data;
	}
}