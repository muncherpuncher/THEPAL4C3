	<!--main content start-->
	<section id="main-content">
		<section class="wrapper">
		  <!-- invoice start-->
		  <section>
			  <div class="panel panel-primary">
				  <!--<div class="panel-heading navyblue"> INVOICE</div>-->
				  <div class="panel-body">
					  <div class="row invoice-list">
					  	   ORDER INVOICE
					  	   <div class="col-lg-4 col-sm-4">
							  <h4><img src="<?php echo base_url() . 'assets/_media_uploads/store/assets/' .$store_info->row()->logo;?>" height="100px;"></h4>
						  </div>

						  <div class="col-lg-4 col-sm-4">
							  <h4>BILLING ADDRESS</h4>
							  <p>
								  <?php echo $client__billing_info->row()->first_name;?> <?php echo $client__billing_info->row()->last_name;?> <br>
								  <?php echo $client__billing_info->row()->address;?> <br>
								  <?php echo $client__billing_info->row()->address2;?><br>
								  Phone: <?php echo $client__billing_info->row()->phone;?><br> 
							  </p>
						  </div>
						  <div class="col-lg-4 col-sm-4">
							  <h4>SHIPPING ADDRESS</h4>
							  <p>
								  <?php echo $client__shipping_info->row()->first_name;?> <?php echo $client__shipping_info->row()->last_name;?> <br>
								  <?php echo $client__shipping_info->row()->address;?> <br>
								  <?php echo $client__shipping_info->row()->address2;?><br>
								  Phone: <?php echo $client__shipping_info->row()->phone;?><br> 
							  </p>
						  </div>
						  <div class="col-lg-4 col-sm-4">
							  <h4>INVOICE INFO</h4>

							  <ul class="unstyled">
								  <li>Invoice Number	: <strong><?php echo $order_info->row()->id;?></strong></li>
								  <li>Invoice Date		: <?php echo $order_info->row()->order_date;?></li>
<!-- 								  <li>Due Date		: 2013-03-20</li> -->
								  <li>Invoice Status	: <?php echo $payment_status_info->row()->name;?>  </li>
								  <li> Order Status: <?php echo $order_status_info->row()->name;?> </li>
							  </ul>
						  </div>
					  </div>
					  <table class="table table-striped table-hover">
						  <thead>
	
						  <tr>
							  <th>#</th>
							  <th>Item</th>
							  <th class="hidden-phone">Description</th>
							  <th class="">Unit Cost</th>
							  <th class="">Quantity</th>
							  <th>Total</th>
						  </tr>
						  </thead>
						  <tbody>
						  	<?php $item_no = 1;?>
						  	<?php $total_amount = 0;?>
						  	<?php foreach ($order_details->result() as $key ):?>
						  	<?php $product_info = Modules::run('products/get_info',$key->products_id);?>
						  	<?php $total_amount += $product_info->row()->price * $key->qty;?>
							  <tr>
								  <td><?php echo $item_no++;?></td>
								  <td><?php echo $product_info->row()->name;?></td>
								  <td class="hidden-phone"><?php echo $product_info->row()->description;?></td>
								  <td class="">P<?php echo number_format($product_info->row()->price,2);?></td>
								  <td class=""><?php echo $key->qty;?></td>
								  <td class="">P<?php echo number_format($product_info->row()->price * $key->qty,2);?></td>
							  </tr>
							<?php endforeach;?>
							 
						  </tbody>
					  </table>
					  <div class="row">
						  <div class="col-lg-4 invoice-block pull-right">
							  <ul class="unstyled amounts">
								<!--   <li><strong>Sub - Total amount :</strong> $6820</li> -->
								  <!-- <li><strong>Discount :</strong> 10%</li> -->
								 <!--  <li><strong>VAT :</strong> -----</li> -->
								  <li><strong>Grand Total :</strong> P<?php echo number_format($total_amount,2);?></li>
							  </ul>
						  </div>
					  </div>
					  
				  </div>
			  </div>
		  </section>
		  <!-- invoice end-->
		</section>
	</section>
	
	