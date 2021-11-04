<?php
class CommentModel extends CI_Model
{
	public function insert_entry($data)
	{
		return $this->db->insert('comments', $data);
	}

	function getAll(int $limit = 0, int $offset = 0)
	{
		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$this->db->like(array('name' => $keyword));
			$this->db->or_like(array('email' => $keyword));
			$this->db->or_like(array('comment' => $keyword));
		}
		$this->db->limit($limit);
		$this->db->offset($offset);
		$this->db->order_by('id DESC');
		return $this->db->get('comments')->result();
	}

	function countAll()
	{
		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$this->db->like(array('name' => $keyword));
			$this->db->or_like(array('email' => $keyword));
			$this->db->or_like(array('comment' => $keyword));
		}
		return $this->db->get('comments')->num_rows();
	}
}
