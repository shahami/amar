
<?php
			echo form_open('main/insert_section');
			echo form_hidden('s_id',0);
			echo form_label('عنوان بخش', 's_title');
			 echo form_input('s_title');
			 echo(form_error('s_title'));
			 echo('<br>');
			 echo form_submit('', 'ثبت بخش جدید');
			 echo('</form><br><hr>');
?>

	

<?php


	$this->table->set_heading('نام بخش', 'حذف', 'بروزرسانی');

        foreach ($query as $row){
	$this->table->add_row($row->s_title, anchor('main/delet_section/'.$row->s_id, '<img src="'.base_url().'system/application/views/them/delete.png" alt="delete" />', array('title' => 'delet this record!')), anchor('main/pre_update_section/'.$row->s_id, '<img src="'.base_url().'/system/application/views/them/edit.png" alt="update" />', array('title' => 'update this record!')));
}

	echo $this->table->generate(); 
?>



