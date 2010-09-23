<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main
 *
 * @author pesarkhobeee
 */
class main extends Controller {
        function main(){
            parent::Controller();
            $this->load->model('mainmodel');
            $this->load->helper('url');
		if(!$this->session->userdata('userEmail')){
		 redirect('user/login');
}
            
        }
	function index()
	{
                  $this->load->view('them/header');
		$this->load->view('user/menu.php');
		 $this->load->view('main/index');
                 $this->load->view('them/footer');
}

//Section

	function insert_section()
	{
		$this->db->insert('section', $_POST);
 		redirect('main/admin_section');
}

	function admin_section()
	{
                $this->load->library('table');
            
        	 $data['query'] = $this->mainmodel->get_last_ten_entries("section");


                                  $this->load->view('them/header');
		$this->load->view('user/menu.php');
		 $this->load->view('main/view_main', $data);
                 $this->load->view('them/footer');

	}


           
        function delet_section(){
                          
                      
                     $this->mainmodel->delet_entry('section','s_id',$this->uri->segment(3));
                     redirect("main/admin_section");
           }

       function pre_update_section(){
           


                 $this->load->view('them/header');
		$this->load->view('user/menu.php');
			$query=$this->db->get_where('section',array('s_id'=> $this->uri->segment(3)));
			$data = $query->row(); 
		 $this->load->view('main/view_main_update',$data);
                 $this->load->view('them/footer');
       }

           function update_section(){


                     $this->mainmodel->update_section();
                   redirect("main/admin_section");
           }


//Category

	function admin_category(){
			$this->load->library('table');
            
			$data['query'] = $this->mainmodel->get_last_ten_entries("category");
			$data["menu"] = $this->db->get('section');
			$this->load->view('them/header');
		  	$this->load->view('user/menu.php');
			$this->load->view('main/view_main_category', $data);
			$this->load->view('them/footer');
	}

	function insert_category(){
			$this->db->insert('category', $_POST);
 			redirect('main/admin_category');
	}

	function delet_category(){
			$this->mainmodel->delet_entry('category','id',$this->uri->segment(4));
			redirect("main/admin_category");
	}

	function pre_update_category(){
			$this->load->view('them/header');
			$this->load->view('user/menu.php');
			$query=$this->db->get_where('category',array('id'=> $this->uri->segment(4)));
			$data = $query->row(); 
			$this->load->view('main/view_main_category_update',$data);
			$this->load->view('them/footer');
	}

	function update_category(){
			$this->mainmodel->update_category();
			redirect("main/admin_category");
	}



//Data

	function insert_data(){
		$this->db->insert('data', $_POST);
 		redirect('main/admin_data');
	}

	function admin_data(){
		$this->load->library('table');
		$data['query'] = $this->mainmodel->get_last_ten_entries("data");
		$data["menu"] = $this->db->get('section');
		$this->load->view('them/header');
		$this->load->view('user/menu.php');
		$this->load->view('main/view_main_data', $data);
		$this->load->view('them/footer');
	}
         
	function delet_data(){
		$this->mainmodel->delet_entry('data','data_id',$this->uri->segment(3));
		redirect("main/admin_data");
	}

	function pre_update_data(){
//		$data["menu"] = $this->db->get('section');
		$this->load->view('them/header');
		$this->load->view('user/menu.php');
		$query=$this->db->get_where('data',array('data_id'=> $this->uri->segment(3)));
		$data = $query->row(); 
		$this->load->view('main/view_main_update_data',$data);
		$this->load->view('them/footer');
	}

	function update_data(){
		$this->mainmodel->update_data();
		redirect("main/admin_data");
	}

}
?>
