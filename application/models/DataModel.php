<?php
class DataModel extends CI_Model {
	public function get_data(){
		$query = $this->db->query('
		SELECT * FROM store 
		INNER JOIN store_area 
		ON store.area_id = store_area.area_id
		GROUP BY store.area_id
		');
		
		return $query->result();
	}
}
?>