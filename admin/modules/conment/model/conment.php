<?php
class Conment {
	private $conment;
	public function __construct() {
		global $_web;
		$this->lang = $_web['lang'];
		$this->conment = new system\Model('conment');
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
		$this->conment->where('id', $id);
		$this->conment->update($data);
	}
	public function delete($id) {
		$this->conment->where('id', $id);
		$this->conment->delete();
	}
	public function insertData($data_insert) {
		$this->conment->insert($data_insert);
	}

	public function checkId($id) {
		$this->conment->where('id', $id);
		$result = $this->conment->num_rows();
		if ($result > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function getUserById($id) {
		$select = "conment.*";
		$this->conment->where('conment.id', $id);
		$result = $this->conment->getOne(null, $select);
		return $result;
	}

	public function findSearch($search) {
		$select = "conment.*";
		$this->conment->where('conment.title', '%' . $search . '%', 'like');
		$result = $this->conment->get(null, null, $select);
		return $result;
	}
	public function dellWhereInArray($name_id) {
		$name = implode(",", $name_id);
		$sql = "DELETE FROM conment WHERE id IN (" . $name . ")";
		$this->conment->rawQuery($sql);
	}
	public function statusNew($id, $data) {
		$this->conment->where('id', $id);
		$this->conment->update($data);
	}

}