                  <div class="col-lg-12">
                  
                       
              
                      <section class="panel">


                       <div class="panel-body">
                          <a href="<?php echo base_url();?>admin/media/view" class="btn btn-shadow btn-danger" type="button"> 
                           View All

                          </a>
                         <a href="<?php echo base_url();?>admin/media/upload" class="btn btn-shadow btn-danger" type="button"> 
                          Add Item
                          </a>
                       </div>

                          <table class="table table-striped border-top" id="sample_1">
                          <thead>
                          <tr>
                              
                              <th class="show-phone"> Image </th>
                              <th class="show-phone">Name</th>
                              <th class="show-phone">Description</th>
                              <th class="hidden-phone">Date Uploaded</th>
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
                                <?php echo $key->media_name;?>
                                 <br>
                                <?php echo $key->media_type;?>
                              </td>
                              <td class="show-phone"><?php echo $key->media_description;?></td>
                              <td class="center hidden-phone"><?php echo $key->media_dateadded;?></td>
                              <td class="show-phone">

                              <a id="<?php echo $key->id;?>" title="Edit item" class="btn btn-primary btn-xs" href="<?php echo base_url();?>admin/media/edit/<?php echo $key->id;?>">
                                  <i class="icon-pencil"></i>
                              </a>

                              <a id="<?php echo $key->id;?>" title="delete item" href="#delete_modal_media" data-toggle="modal" class="btn_delete btn btn-danger btn-xs">
                                  <i class="icon-trash "></i>
                              </a>

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
                      
        