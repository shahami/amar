<div id="user_menu">
	<a href ="<?php echo base_url();?>index.php/main">پنل مدیریت</a>
</div>
<fieldset>
	<legend>گزارش گیری نوع اول</legend>


<?php
        echo form_open('home/search1');

         foreach ($menu->result() as $row)
              $options[$row->s_id]=($row->s_title);

         echo form_label('گروه بندی', 'section_id');
        echo form_dropdown('section_id', $options);

         echo('<br>');
         echo "<br>";
	 echo form_label('واحد', 'unit');
         echo form_input('unit');
         echo(form_error('unit'));
         echo('<br>');
	 echo form_label('سال', 'year');
         echo form_input('year');
         echo(form_error('year'));
         echo('<br>');
	 echo form_label('ماه', 'month');
         echo form_input('month');
         echo(form_error('month'));
         echo('<br>');
         echo "<br>";


         echo form_submit('', 'جستجو');
         echo('</form><br>');
        ?>

</fieldset>

<fieldset>
	<legend>گزارش گیری نوع دوم</legend>


<?php
        echo form_open('home/search2');
        echo form_label('عنوان', 'caption');
         echo form_input('caption');
         echo(form_error('caption'));
         echo('<br>');
         echo "<br>";
        echo form_label('محتوا', 'value');
         echo form_input('value');
         echo(form_error('value'));
         echo('<br>');
         echo "<br>";
         echo form_submit('', 'جستجو');
         echo('</form><br>');
?>


</fieldset>
