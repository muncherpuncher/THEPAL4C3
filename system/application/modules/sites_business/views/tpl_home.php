 <div class="col-xs-12 full-page-container">   
    <div class="full-page" id="marketing-item-a" style="height:520px;">    
        <div id="myCarousel" class="carousel slide col-xs-12">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="fill"> <img src="<?php echo $template_url_img;?>/slider_1.jpg" class="slider-image"> </div>
                    <div class="carousel-caption">
                        <h1>


                        </h1>
                    </div>
                </div>
               <div class="item">
                    <div class="fill"> <img src="<?php echo $template_url_img;?>/slider_2.jpg" class="slider-image"> </div>
                    <div class="carousel-caption">
                        <h1>


                        </h1>
                    </div>
                </div>
               <div class="item">
                    <div class="fill"> <img src="<?php echo $template_url_img;?>/slider_3.jpg" class="slider-image"> </div>
                    <div class="carousel-caption">
                        <h1>

                        </h1>
                    </div>
                </div>
                <div class="item">
                    <div class="fill"> <img src="<?php echo $template_url_img;?>/slider_4.jpg" class="slider-image"> </div>
                    <div class="carousel-caption">
                        <h1>

                        </h1>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
    </div>    
    <?php include('tpl_page_footer.php');?>
</div>

<?php include('js.php');?>

<script>
$(function($) {

    $(".sub-footer").hide();
    $(".footer-wrapper").css('position','relative');

    $('#myCarousel').carousel({
        interval: 3000
    });


});
</script>       
            
 <!-- /.container -->


    
