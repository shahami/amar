

<script type="text/javascript" src="<?php echo base_url();?>system/application/views/them/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<!-- /TinyMCE -->
<div id="right">
	<?php
		$caption= array(
			'name'        => 'caption',
			'id'          => 'caption',
			'style'       => 'margin:1px',
		);

		$value = array(
			'name'        => 'value',
			'id'          => 'value',
			'cols'       => '50',
			'style'       => 'margin:10px',
		);

		echo form_open('main/insert_data');
		echo form_hidden('data_id',0);
		$this->table->add_row(form_label('عنوان بخش', 'section_id'),form_dropdown('section_id', $this->mainmodel->section_dropdown_option()));
		$this->table->add_row(form_label('عنوان محور', 'category_id'),form_dropdown('category_id', $this->mainmodel->category_dropdown_option()));
		$this->table->add_row(form_label('عنوان', 'caption'),form_input($caption));
		$this->table->add_row(form_label('واحد', 'unit'),form_input('unit'));
		$this->table->add_row(form_label('سال', 'year'),form_input('year'));
		$this->table->add_row(form_label('ماه', 'month'),form_input('month'));
		$this->table->add_row(form_label('محتوا', 'value'),form_input('value'));
		$this->table->add_row(' ',form_submit('', 'ذخيره'));
/*		echo form_label('عنوان بخش', 'section_id');
		echo form_dropdown('section_id', $this->mainmodel->section_dropdown_option());
		echo "<br>";
		echo form_label('عنوان محور', 'category_id');
		echo form_dropdown('category_id', $this->mainmodel->category_dropdown_option());
		echo "<br>";
		echo form_label('عنوان', 'caption');
		echo form_input($caption);
		echo(form_error('caption'));
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
		echo form_label('محتوا', 'value');
		echo form_textarea($value);
		echo(form_error('value'));
		echo('<br>');*/
		echo $this->table->generate(); 
		$this->table->clear();
		echo('</form><br>');
	?>
	<hr>
	<?php
		$this->table->set_heading('نام بخش','نام محور','عنوان','واحد','سال','ماه','مقدار', 'حذف', 'بروزرسانی');
			foreach ($query as $row){
				$this->table->add_row($this->mainmodel->get_section_title($row->section_id),$this->mainmodel->get_category_title($row->category_id),$row->caption,$row->unit,$row->year,$row->month,$row->value,anchor('main/delet_data/'.$row->data_id, '<img src="'.base_url().'system/application/views/them/delete.png" alt="delete" />', array('title' => 'delet this record!')), anchor('main/pre_update_data/'.$row->data_id.'/'.$row->category_id.'/'.$row->section_id, '<img src="'.base_url().'/system/application/views/them/edit.png" alt="update" />', array('title' => 'update this record!')));
			}
		echo $this->table->generate(); 
	?>
</div>
