
<div class="col-lg-12" style="color:#000">

    <?php  if($_POST) :?>
      <?php $response = Modules::run('events/update_event');?>
      <?php if( $response == true ):?>
      <div class="alert alert-success fade in">
          <button data-dismiss="alert" class="close close-sm" type="button">
              <i class="icon-remove"></i>
          </button>
          <strong>Event updated!</strong> 
      </div>

      <?php  $this->output->set_header('refresh:0; url='.base_url().'dashboard/events/edit/'.$event_info->id );?>
      <?php endif;?> 
    <?php endif;?>    
    <section class="panel">

        <header class="panel-heading">
          <b>  New Event </b>
        </header>

        <div class="panel-body">
            <form class="form-horizontal tasi-form" method="POST" action="">
                <input class="form-control" name="id" type="hidden" value="<?php echo isset( $event_info->id ) ? $event_info->id : '' ;?>">
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Title </label>
                    <div class="col-sm-10">
                        <input class="form-control" name="title" type="text" value="<?php echo isset( $event_info->title ) ? $event_info->title : '' ;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Description </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="description"><?php echo isset( $event_info->description ) ? $event_info->description : '' ;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Location </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="location"><?php echo isset( $event_info->location ) ? $event_info->location : '' ;?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess"> From </label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                               Start Date <input id="start_date" name="start_date" value="<?php echo isset( $event_info->start_date ) ? $event_info->start_date : '' ;?>" size="16" class="form-control event-date" type="text">
                            </div>
                            <div class="col-lg-4">
                               Start Time <input class="form-control event-time" name="start_time" placeholder="" type="text" value="<?php echo isset( $event_info->start_time ) ? $event_info->start_time : '' ;?>">
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess"> To </label>
                    <div class="col-lg-10">
                        <div class="row">
                            <div class="col-lg-4">
                               End Date  <input id="start_date" name="end_date" value="<?php echo isset( $event_info->end_date ) ? $event_info->end_date : '' ;?>" size="16" class="form-control event-date" type="text">
                            </div>
                            <div class="col-lg-4">
                               End time <input id="" name="end_time" size="16" value="<?php echo isset( $event_info->end_time ) ? $event_info->end_time : '' ;?>" class="form-control event-time" type="text">
                            </div>
                            
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Availability </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="status" type="text">
                            <option value="1" <?php echo $event_info->status_flag == 1 ? "selected" : "" ;?>> Open </option>
                            <option value="0" <?php echo $event_info->status_flag == 0 ? "selected" : "" ;?>> Close </option>
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

