 <!-- Business Info pop up -->    
 <div  class="modal" id="fs-business-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-body">
                       <div class="cover-image">
                            <div class="share-buttons">
                                <ul>
                                    <li> <img class="pulse" id="like" src="<?php echo $template_url_img;?>/share-icons/like.png" title="Like"> </li>
                                    <li> <img class="pulse" id="star" src="<?php echo $template_url_img;?>/share-icons/star.png" title="Add to Favorites"> </li>
                                    <li> <img class="pulse" id="bucket" src="<?php echo $template_url_img;?>/share-icons/bucket.png" title="Add to Bucket"> </li>
                                    <li> <img class="pulse" id="checkin" src="<?php echo $template_url_img;?>/share-icons/check.png" title="Check In"> </li>
                                    <li> <img class="pulse" id="flare" src="<?php echo $template_url_img;?>/share-icons/flare.png" title="Share to Friends"> </li>
                                </ul>
                            </div>    
                       </div>
                       <div class="business-name">
                            <div class="title"></div>
                            <div class="type"> Type </div>
                            <hr>
                            <div class="address col-lg-9"></div>

                            <div class="location col-lg-3">
                                <div class="caption">
                                <br>
                                <h6>Distance <br>
                                from you</h6>
                                </div>
                                <div class="value"></div>
                            </div>
                       </div>
                       <div id="map-canvas"></div>
                       <div class="business-directions">
                        Directions
                       </div>
                       <div class="business-hours">
                            More Info <br>
                            Hours <br>
                            <hr>

                            <table>
                                <tr>
                                    <td>
                                        Monday: 
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="monday">
                                        <span class="day"></span>
                                        </div>
                                    </td>
                                    <td style="padding-left:30px;">
                                        Thursday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="thursday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tuesday: 
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="tuesday">
                                        <span class="day"></span>
                                        </div>
                                    </td>
                                    <td style="padding-left:30px;">
                                        Friday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="friday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        Wednesday: 
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="wednesday">
                                        <span class="day"></span>
                                        </div>
                                    </td>
                                    <td style="padding-left:30px;">
                                        Saturday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="saturday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                <tr>
                                    <td>
                                        
                                    </td>
                                    <td style="padding-left:5px;">
                                       
                                    </td>
                                    <td style="padding-left:30px;">
                                        Sunday:
                                    </td>
                                    <td style="padding-left:5px;">
                                        <div class="sunday">
                                        <span class="day"></span>
                                        </div>
                                     </td>
                                </tr>
                                

                            </table>

                            <!-- <div class="col-lg-6 pull-left">
                                
                                <div class="tueday">
                                    Tuesday <span class="day"></span>
                                </div>
                                <div class="wednesday">
                                    Wednesday <span class="day"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 pull-right">
                                <div class="thursday">
                                    Thursday <span class="day"></span>
                                </div>
                                <div class="friday">
                                    Friday <span class="day"></span>
                                </div>
                                <div class="saturday">
                                    Saturday <span class="day"></span>
                                </div>
                                <div class="sunday">
                                    Thursday <span class="day"></span>
                                </div>
                            </div>  -->   

                       </div>
                       <div class="business-about">
                            
                            <div class="title"> <h4> GET TO KNOW <span class="name"></span> </h4></div>
                            <div class="clearfix"></div>
                            <div class="description"></div>
                       </div>

                  </div>
                  <div class="modal-footer">
                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                  </div>
              </div>
          </div>
 </div>
 <!-- Business Info pop up -->  