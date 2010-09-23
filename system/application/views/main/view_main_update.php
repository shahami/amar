	<div id="page-bgtop">
		<div id="content">
<?php
        echo form_open('main/update_section');
        echo form_hidden('s_id',$this->uri->segment(3));
        echo form_label('عنوان بخش', 's_url');
         echo form_input('s_url',$s_title);
         echo('<br>');
         echo form_submit('', 'بروزرسانی');
         echo('</form><br><hr>');
?>
                </div>
        </div>
