<?php
class Info {
	private $info;
	public function __construct() {
		global $_web;
		$this->info = new system\Model('info');
	}
	public function getALLposts() {
		$select = "info.*";
		$this->info->orderBy("info.create_time", "DESC");
		$result = $this->info->get(null, null, $select);
		return $result;
	}
	public function getpostsOfId($id) {
		$select = "info.*";
		$this->info->orderBy("create_time", "DESC");
		$this->info->where('author_create', $id);
		$result = $this->info->get(null, null, $select);
		return $result;
	}
	public function getPagiposts($start, $limit) {
		$select = "info.*";
		$this->info->orderBy("info.create_time", "DESC");
		$result = $this->info->get(null, array($start, $limit), $select);
		return $result;
	}
	public function update($data, $id) {
		$this->info->where('id', $id);
		$this->info->update($data);
	}
	public function delete($id) {
		$this->info->where('id', $id);
		$this->info->delete();
	}
	public function insertData($data_insert) {
		$this->info->insert($data_insert);
	}

	public function checkId($id) {
		$this->info->where('id', $id);
		$result = $this->info->num_rows();
		if ($result > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function getUserById($id) {
		$select = "info.*";
		$this->info->where('info.id', $id);
		$result = $this->info->getOne(null, $select);
		return $result;
	}

	public function findSearch($search) {
		$select = "info.*";
		$this->info->where('info.title', '%' . $search . '%', 'like');
		$result = $this->info->get(null, null, $select);
		return $result;
	}
	public function dellWhereInArray($name_id) {
		$name = implode(",", $name_id);
		$sql = "DELETE FROM info WHERE id IN (" . $name . ")";
		$this->info->rawQuery($sql);
	}
	public function statusNew($id, $data) {
		$this->info->where('id', $id);
		$this->info->update($data);
	}

}