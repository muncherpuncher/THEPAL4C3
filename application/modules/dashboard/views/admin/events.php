
<div class="col-lg-12" style="color:#000">
    <section class="panel">
      <table class="table table-striped border-top tbl-records">
        <thead>
          <tr>
              <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
              <th> Title </th>
              <th class="hidden-phone"> Description </th>
              <th class="hidden-phone"> Location </th>
              <th class="hidden-phone"> From </th>
              <th class="hidden-phone"> To </th>
              <th class="hidden-phone"> Availability </th>
              <th class="hidden-phone">  </th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($events->result() as $value):?>
          <tr class="odd gradeX">
              <td><input type="checkbox" class="checkboxes" value="1" /></td>
              <td> <?php echo $value->title;?> </td>
              <td> <?php echo $value->description;?> </td>
              <td> <?php echo $value->location;?> </td>
              <td> Date:  <br><?php echo $value->start_date;?>  <br> Time: <br><?php echo $value->start_time;?>  </td>
              <td> Date:  <br><?php echo $value->end_date;?> <br> Time: <br><?php echo $value->end_time;?>  </td>
              <td>
                <?php if($value->status_flag == 1):?>
                <span class="label label-success"> Open </span>
                <?php endif;?>
                <?php if($value->status_flag == 0):?>
                <span class="label label-warning"> Close </span>
                <?php endif;?>
              </td>
              <td> 
                <a href="<?php echo base_url();?>dashboard/events/edit/<?php echo $value->id;?>" class="btn btn-primary btn-edit" value="Edit"> Edit </a> 
                <a href="#" class="btn btn-primary btn-delete" id="<?php echo $value->id;?>" value="Edit"> Delete </a>
              </td>
          </tr>
          <?endforeach;?>

        </tbody>
      </table>
    </section>

</div>

<script>

$(function(){


    $('.tbl-records').dataTable();

    $(".btn-delete").click(function(e){
    e.preventDefault();

        var conf = confirm('Delete event?');
        var event_id = $(this).attr('id');

        if( conf )
        {
          deleteEvent( event_id );
          $(this).closest('tr').fadeOut();
        }
        else
        {
          return false;
        }

    });

});

</script>