
        <div class="col-lg-12">
               <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="icon-user"></i>
                          </div>
                          <div class="value">
                              <h1> <?php echo count($total_users->result());?></h1>
                              <p> Users </p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="icon-briefcase"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo count($total_owned_businesses->result());?></h1>
                              <p> Owned Branches </p>
                          </div>
                      </section>
                  </div>
                   <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="icon-briefcase"></i>
                          </div>
                          <div class="value">
                              <h1><?php echo count($total_open_businesses->result());?></h1>
                              <p> Open Businesses </p>
                          </div>
                      </section>
                  </div>

                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="icon-bar-chart"></i>
                          </div>
                          <div class="value">
                              <h1> <?php echo count($total_brand_engaments->result());?></h1>
                              <p> Brand Engagements </p>
                          </div>
                      </section>
                  </div>
              </div>
      </div>    

