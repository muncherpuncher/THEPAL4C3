<?php for ($i=1; $i < 13; $i++):?>
<?php $num = 0;
if($i < 10) { $i = '0'.$i; }
?>
<option> <?php echo $i;?> </option>
<?php endfor;?>
