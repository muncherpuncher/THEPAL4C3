                
      
                  <div class="col-lg-12">
                      <section class="panel">
                        <input type="text" value="<?php echo $type;?>" id="set_image_type">
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

                  <div class="modal fade" id="delete_modal_media" tabindex="-1" role="dialog" aria-labelledby="delete_modal" aria-hidden="true">
                               
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title"> Delete Item? </h4>
                                          </div>
                                          <div class="modal-body">

                                                This content will no longer be available with other items associated with it.Confirm action? 

                                          </div>
                                          <div class="modal-footer">
                                              <form method="post" action="<?php echo base_url();?>admin/catalog/delete/">
                                              <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                              <button href="" class="btn btn-success" type="button"> OK </a>
                                          </div>
                                      </div>
                                  </div>
                  </div>
                      
        