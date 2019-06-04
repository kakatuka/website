<?php
class Service {
	private $service;
	public function __construct() {
		global $_web;
		$this->service = new system\Model('service');
	}
	public function getALLposts() {
		$select = "service.*";
		$this->service->orderBy("service.create_time", "DESC");
		$result = $this->service->get(null, null, $select);
		return $result;
	}
	public function getpostsOfId($id) {
		$select = "service.*";
		$this->service->orderBy("create_time", "DESC");
		$this->service->where('author_create', $id);
		$result = $this->service->get(null, null, $select);
		return $result;
	}
	public function getPagiposts($start, $limit) {
		$select = "service.*";
		$this->service->orderBy("service.create_time", "DESC");
		$result = $this->service->get(null, array($start, $limit), $select);
		return $result;
	}
	public function update($data, $id) {
		$this->service->where('id', $id);
		$this->service->update($data);
	}
	public function delete($id) {
		$this->service->where('id', $id);
		$this->service->delete();
	}
	public function insertData($data_insert) {
		$this->service->insert($data_insert);
	}

	public function checkId($id) {
		$this->service->where('id', $id);
		$result = $this->service->num_rows();
		if ($result > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function getUserById($id) {
		$select = "service.*";
		$this->service->where('service.id', $id);
		$result = $this->service->getOne(null, $select);
		return $result;
	}

	public function findSearch($search) {
		$select = "service.*";
		$this->service->where('service.title', '%' . $search . '%', 'like');
		$result = $this->service->get(null, null, $select);
		return $result;
	}
	public function dellWhereInArray($name_id) {
		$name = implode(",", $name_id);
		$sql = "DELETE FROM service WHERE id IN (" . $name . ")";
		$this->service->rawQuery($sql);
	}
	public function statusNew($id, $data) {
		$this->service->where('id', $id);
		$this->service->update($data);
	}

}