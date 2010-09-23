<div id="page-bgtop">
	<div id="content">
		<?php
			echo form_open('main/update_category');
			echo form_hidden('id',$this->uri->segment(4));

			$data = $this->db->get('section');
			echo form_label('عنوان بخش', 'section');
			foreach ($data->result() as $row)
				$options[$row->s_id]=($row->s_title);
			echo form_dropdown('section_id', $options,$this->uri->segment(3));

			echo "<br><br>";

			echo form_label('عنوان محور', 's_url');
			echo form_input('s_url',$caption);
			echo('<br>');
			echo form_submit('', 'بروزرسانی');
			echo('</form><br><hr>');
		?>
	</div>
</div>
