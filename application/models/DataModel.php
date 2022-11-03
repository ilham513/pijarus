<?php
class DataModel extends CI_Model {
	public function get_data(){
		$query = $this->db->query('
			SELECT COUNT(*) AS "row", SUM(report_product.compliance) AS "sum", product_brand.brand_name, store_area.area_name
			FROM report_product
			INNER JOIN store
			ON report_product.store_id = store.store_id
			INNER JOIN store_area
			ON store.area_id = store_area.area_id
			INNER JOIN product
			ON report_product.product_id = product.product_id
			INNER JOIN product_brand 
			ON product.brand_id = product_brand.brand_id
			GROUP BY product_brand.brand_name, store_area.area_name
		');
		
		return $query->result();
	}
}
?>