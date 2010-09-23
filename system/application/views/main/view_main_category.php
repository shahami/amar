<?php
	echo form_open('main/insert_category');
	echo form_hidden('id',0);
	echo form_label('عنوان بخش', 'section');
	foreach ($menu->result() as $row)
		$options[$row->s_id]=($row->s_title);
	echo form_dropdown('section_id', $options);
	echo "<br><br>";
	echo form_label('عنوان محور', 'caption');
	echo form_input('caption');
	echo(form_error('caption'));
	echo('<br>');
	echo form_submit('', 'ثبت محور جدید');
	echo('</form><br><hr>');
?>

	

<?php
	$this->table->set_heading('نام بخش', 'نام محور', 'حذف', 'بروزرسانی');
	foreach ($query as $row){
//		$query=$this->db->get_where('section',array('s_id'=> $row->section_id));
//		$data = $query->row(); 
		
	$this->table->add_row($this->mainmodel->get_section_title($row->section_id), $row->caption, anchor('main/delet_category/'.$row->section_id.'/'.$row->id, '<img src="'.base_url().'system/application/views/them/delete.png" alt="delete" />', array('title' => 'delet this record!')), anchor('main/pre_update_category/'.$row->section_id.'/'.$row->id, '<img src="'.base_url().'/system/application/views/them/edit.png" alt="update" />', array('title' => 'update this record!')));

}

	echo $this->table->generate(); 
?>



