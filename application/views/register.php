<div class="row">
      <div class="col-md-4 col-md-offset-4">
  
      <?php 
      if ($this->session->flashdata('error')){
      echo  '<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->session->flashdata('error'). '</div>';
      }  ?>


          <?php if($this->session->flashdata('success')){
    echo
    '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $this->session->flashdata('success') . '</div>'; } ?>

      
      <?php echo validation_errors('<div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' ,  '</div>'); ?>

      </div>
      <div class="col-md-4 col-md-offset-4">
      <p class=""><a class="pull-right" href="<?php echo base_url('home/login') ?>"> Login</a></p><br>
        <!--<form class = 'form-horizontal', role = 'form', action="<?php //echo base_url('home/register') ?>"  -->
        <?php  $attributes = array (
          'class' => 'form-horizontal',
          'role' => 'form'
        )
        ?>

        <?php echo form_open('home/register', $attributes) ?>
          <div class="form-group">
            <label class="control-label col-sm-2" for="name"></label>
            <div class="col-sm-10">
              <input type="name" name="name" value="" class="form-control" id="name" placeholder="Enter Full Name" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="sex"></label>
            <div class="col-sm-10">
              <select type="" name="sex" class="form-control" id="sex" >
                  <option value="">Select Sex</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Secret">N/A</option>
              </select>
            </div>
          </div>
          
          <div class="form-group">
            <label class="control-label col-sm-2" for="email"></label>
            <div class="col-sm-10">
              <input type="email" name="email" value="" class="form-control" id="email" placeholder="Enter Email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-10"> 
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required>
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-10"> 
              <input type="password" name="confirm_password" class="form-control" id="pwd" placeholder="Confirm Password" required>
            </div>
          </div>
        
          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
                <label><input type="checkbox" required> Accept Agreement</label>
              </div>
            </div>
          </div>

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button type="submit" class="btn btn-primary pull-right" name="submit_registration">Register</button>
              <a class="pull-left btn btn-danger" href=""> Cancel</a>
            </div>
          </div>
    </form>
         
          
  </div>
</div>
          
  </div>
</div>
  