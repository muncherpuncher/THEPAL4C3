<?php $this->load->view('templates/front_end/includes/header_view')?>
</head>
<body>
<div id="main-container">
    <header><?php $this->load->view('templates/front_end/includes/header_page_view')?></header>
    <div id="main-wrapper">
        <form action="" method="POST">
            <?php foreach($payment as $options):?>
                <input type="radio" name="payment[]" value="<?php echo $options->options?>" />
                <label><?php echo $options->options?></label>
                <div class="clr"></div>
            <?php endforeach?>
            
            <input type="submit" name="submit" value="Choose" />
        </form>
    </div>
</div>
<footer><?php $this->load->view('templates/front_end/includes/footer_page_view')?></footer>
<?php $this->load->view('templates/front_end/includes/footer_view')?>
<script type="text/javascript">
$(function() {
    $('input[name="submit"]').click(function(event) {
        if($('input[type="radio"]:checked').val() == 'otc') {
            location.href = "<?php echo base_url()?>payment/otc";
        } else if($('input[type="radio"]:checked').val() == 'paypal') {
            location.href = "<?php echo base_url()?>payment/paypal";
        }
        
        event.preventDefault();
    });
});
</script>
</body>
</html>