<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mainmodel
 *
 * @author pesarkhobeee
 */
class mainmodel extends Model {



    function mainmodel()
    {
        // Call the Model constructor
        parent::Model();
    }

    function get_last_ten_entries($tablename)
    {
        $query = $this->db->get($tablename, 10);
        return $query->result();
    }



    function update_section()
    {
        $this->s_title = $_POST['s_url'];


        $this->db->update('section', $this, array('s_id' => $_POST['s_id']));
    }

    function update_category()
    {
		$this->caption = $_POST['s_url'];
		$this->section_id = $_POST['section_id'];
		$this->db->update('category', $this, array('id' => $_POST['id']));
    }

    function update_data()
    {

	$this->caption = $_POST['caption'];
$this->section_id = $_POST['section_id'];
$this->unit = $_POST['unit'];
$this->year = $_POST['year'];
$this->month = $_POST['month'];
$this->value = $_POST['value'];

        $this->db->update('data', $this, array('data_id' => $_POST['data_id']));
    }

    function delet_entry($tablename,$idname ,$id){
        $this->db->delete($tablename, array($idname => $id));
    }


    function get_section_title($id)
    {
	$query=$this->db->get_where('section',array('s_id'=> $id));
	$data = $query->row(); 
        return $data->s_title;
    }



    function get_category_title($id)
    {
	$query=$this->db->get_where('category',array('id'=> $id));
	$data = $query->row(); 
        return $data->caption;
    }


    function section_dropdown_option()
    {
	$data = $this->db->get('section');
	foreach ($data->result() as $row)
		$options[$row->s_id]=($row->s_title);
        return $options;
    }


    function category_dropdown_option()
    {
	$data = $this->db->get('category');
	foreach ($data->result() as $row)
		$options[$row->id]=($row->caption);
        return $options;
    }



}
?>
