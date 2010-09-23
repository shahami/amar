<?php
	class home extends Controller {
        function home(){
		 parent::Controller();
	}
	
	function index(){
	$data["menu"] = $this->db->get('section');
		 $this->load->view('them/header');
		 $this->load->view('home/index',$data);
                 $this->load->view('them/footer');
	}

	function search1(){
		$this->load->library('table');

		if($_POST["section_id"]!="")
		$this->db->where('section_id', $_POST["section_id"]);
		if($_POST["unit"]!="")
		$this->db->where('unit', $_POST["unit"]);
		if($_POST["year"]!="")
		$this->db->where('year', $_POST["year"]); 
		if($_POST["month"]!="")
		$this->db->where('month', $_POST["month"]);

		$data["menu"] = $this->db->get("data");
		$this->load->view('them/header');
		 $this->load->view('home/search_resualt.php', $data);
                 $this->load->view('them/footer');

		
	}

	function search2(){
$this->load->library('table');
		if($_POST["caption"]!="")
		$query="SELECT * FROM data WHERE caption LIKE '%".$_POST["caption"]."%'";
		if($_POST["value"]!="")
		$query="SELECT * FROM data WHERE value LIKE '%".$_POST["value"]."%'";
		if($_POST["value"]!="" && $_POST["caption"]!="")
		$query="SELECT * FROM data WHERE value LIKE '%".$_POST["value"]."%' and caption LIKE '%".$_POST["caption"]."%'";
		$data["menu"] = $this->db->query($query);
		$this->load->view('them/header');
		 $this->load->view('home/search_resualt.php', $data);
                 $this->load->view('them/footer');
	}

}

?>
