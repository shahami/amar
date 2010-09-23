<div id="user_menu">
	<a href ="<?php echo base_url();?>index.php">صفحه اول</a>
</div>
        <?php


$this->table->set_heading('نام','سال','ماه', 'واحد', 'محتوا');
	
         foreach ($menu->result() as $row){
$this->table->add_row($row->caption,$row->year,$row->month,$row->unit,$row->value);
}

echo $this->table->generate(); 
        ?>
     
