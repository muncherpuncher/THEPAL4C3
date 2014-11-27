
<div class="col-lg-12" style="color:#000">

    <?php  if($_POST) :?>
      <?php  $response = Modules::run('events/add_event');?>
      <?php if( $response == true ):?>
      <div class="alert alert-success fade in">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          <strong>Event added!</strong> 
      </div>
      <?php endif;?> 
    <?php endif;?>    
    <section class="panel">

        <header class="panel-heading">
          <b>  New Event </b>
        </header>

        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="POST" action="">
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Title </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Location </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="location"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess"> From </label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                               Start Date <input id="start_date" name="start_date" value="<?php echo date('Y-m-d');?>" size="16" class="form-control event-date" type="text">
                            </div>
                            <div class="col-lg-4">
                               Start Time <input class="form-control event-time" name="start_time" placeholder="" type="text">
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess"> To </label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                               End Date  <input id="start_date" name="end_date" value="<?php echo date('Y-m-d');?>" size="16" class="form-control event-date" type="text">
                            </div>
                            <div class="col-lg-4">
                               End time <input id="start_date" value=""  name="end_time" size="16" class="form-control event-time" type="text">
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Availability </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="status" type="text">
                            <option value="1"> Open </option>
                            <option value="0"> Close </option>
                        </select>
                    </div>
                </div>
        
                <div class="form-group">
                   
                    <div class="col-lg-10">
                        <input type="submit" class="btn btn-primary btn-lg" value="Save">
                    </div>
                </div>

            </form>
        </div>
    </section>

</div>

