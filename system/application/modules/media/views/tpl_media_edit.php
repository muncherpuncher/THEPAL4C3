
                  <div class="col-lg-12">
                      <section class="panel">
                          <div class="panel-body">
                              <div class=" form">
                                  <form class="cmxform form-horizontal tasi-form" id="catalog_form_products" method="POST" action="<?php echo base_url();?>admin/media/update/<?php echo $this->uri->segment(4);?>" enctype="multipart/form-data">
                                    <?php foreach($item_detail->result() as $key):?>
                                      <div class="form-group ">
                                          <label for="name" class="control-label col-lg-2">Name (required)</label>
                                          <div class="col-lg-10">
                                              <input type="hidden" name="id" value="<?php echo $this->uri->segment(4);?>">
                                              <input class=" form-control" id="name" name="name"  value="<?php echo $key->media_name;?>" minlength="2" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="desc" class="control-label col-lg-2">Description (optional)</label>
                                          <div class="col-lg-10">
                                              <textarea class="form-control " id="description" name="description"><?php echo $key->media_description;?></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <img class="media-thumb-image" src="<?php echo base_url();?>assets/_media_uploads/images/<?php echo $key->media_file_name;?>">
                                          <label for="desc" class="control-label col-lg-2"> File (required) Max file size 5 MB</label>
                                          <div class="col-lg-10">
                                              <input type="file" name="file" id="file">
                                          </div>
                                      </div>

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-danger" type="submit">Save</button>
                                             <a href="<?php echo base_url() . 'admin/media/view'?>" class="btn btn-default">Cancel</a>
                                          </div>
                                      </div>
                                    <?php endforeach;?>
                                  </form>
                              </div>

                          </div>
                      </section>
                  </div>
   