                
      
                  <div class="col-lg-12">
                      <section class="panel">
                       
                          <table class="table table-striped border-top" id="sample_1">
                          <thead>
                          <tr>
                            
                              <th class="show-phone"> Image </th>
                              <th class="show-phone">Name</th>
                              <th class="show-phone"></th>
                          </tr>
                          </thead>
                          <tbody>
                          <?php foreach ($media_list->result() as $key):?>
                          <tr id="row-<?php echo $key->id;?>" class="odd gradeX">
             
                              <th class="show-phone"> 
                                <img class="media-thumb-image" src="<?php echo base_url().'assets/_media_uploads/images/'.$key->media_file_name;?>">
                               </th>
                              <td class="show-phone">
                                <b> Name:  </b><?php echo $key->media_name;?>
                                 <br>
                                <b>Type: </b><?php echo $key->media_type;?>
                                <br>
                                <b>Description:</b><?php echo substr($key->media_description, 10);?>
                                <br>
                                <b>Date Added </b><?php echo $key->media_dateadded;?>
                              </td>
                              <td class="show-phone">

                                <button id="<?php echo $key->id;?>" type="button" class="btn_set_image btn btn-shadow btn-warning"> Select Image</button>       

                              </td>
                          </tr>
                          <?php endforeach;?>
                         
                          </tbody>
                          </table>
                      </section>
                  </div>

                 

                 
                      
        