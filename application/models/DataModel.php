<?php
class DataModel extends CI_Model {
	public function get_data(){
		$query = $this->db->query('
			SELECT SUM(report_product.compliance) AS "sum" ,COUNT(*) AS "total"  FROM report_product
			INNER JOIN store
			ON report_product.store_id = store.store_id
			INNER JOIN store_area
			ON store.area_id = store_area.area_id
			INNER JOIN product
			ON report_product.product_id = product.product_id
			INNER JOIN product_brand 
			ON product.brand_id = product_brand.brand_id
			WHERE store.area_id = 1
		');
		
		return $query->result();
	}
}
?>