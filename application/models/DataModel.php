<?php
class DataModel extends CI_Model {
	public function get_data($daerah){
		
		if($daerah != null){
			$daerah = str_replace(".",",",$daerah);
			$filter_daerah = "WHERE store.area_id IN ($daerah)";
		}else{
			$filter_daerah = "";
		}

		$query = $this->db->query("
			SELECT COUNT(*) AS 'row', SUM(report_product.compliance) AS 'sum', product_brand.brand_name, store_area.area_name
			FROM report_product
			INNER JOIN store
			ON report_product.store_id = store.store_id
			INNER JOIN store_area
			ON store.area_id = store_area.area_id
			INNER JOIN product
			ON report_product.product_id = product.product_id
			INNER JOIN product_brand 
			ON product.brand_id = product_brand.brand_id
			$filter_daerah
			GROUP BY product_brand.brand_name, store_area.area_name
		");
		
		return $query->result();
	}
	
	public function get_tabel($daerah){
		
		if($daerah != null){
			$daerah = str_replace(".",",",$daerah);
			$filter_daerah = "WHERE store.area_id IN ($daerah)";
		}else{
			$filter_daerah = "";
		}

		$query = $this->db->query("
			SELECT COUNT(*) AS 'row', SUM(report_product.compliance) AS 'sum',store_area.area_name FROM report_product
			INNER JOIN store
			ON report_product.store_id = store.store_id
			INNER JOIN store_area
			ON store.area_id = store_area.area_id
			$filter_daerah
			GROUP BY store_area.area_name;
		");
		
		return $query->result();
	}
	
	public function get_daerah(){
		$query = $this->db->query("
			SELECT * FROM store_area
		");
		
		return $query->result();
	}
}
?>