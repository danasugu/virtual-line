<div class="container">

  <?php //$pages = $page ?>

  <div>
    <header class="section_header">
      <h4>Purchasing Services</h4>
      <hr>
    </header>
    <div class="col-md-6 col-md-offset-3">

      <?php if($this->session->flashdata('error')){

                    echo '<div class="alert alert-danger alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' . $this->session->flashdata('error') . '</div>';
                } ?>


      <?php if($this->session->flashdata('success')){
                    echo
                     '<div class="alert alert-success alert-dismissable">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'. $this->session->flashdata('success') . '</div>'; } ?>

      <?php

                if($pages == 1){ ?>

      <form action="<?php echo base_url('dashboard/upgrade/2') ?>" method="post" enctype="multipart/form-data"
        class="form-horizontal" role="form">
        <div class="form-group">
          <label class="" for="reason">Select Package:</label>
          <div class="">
            <select class="form-control" id="" name="productid" required>
              <option value="Not Defined">Toggle List</option>
              <?php foreach($results as $package) { ?>
              <option value="<?php echo $package['id'] ?>"> <?php echo $package['item_name'] ?> </option>
              <?php } ?>
            </select>
          </div>
        </div>


        <div class="form-group">
          <div class="">
            <button type="submit" class="btn btn-primary" name="make_purchase"> Proceed</button><a href=""
              class="btn btn-danger pull-right" style="color: #fff;">Start Over</a>
          </div>
        </div>


      </form>

      <?php } ?>


      <?php

                if($pages == 2){

                    $itemName = $result->item_name;
                    $itemDesc = $result->item_desc;
                    $itemPrice = $result->item_price;

                    $this->session->set_userdata('itemName', $itemName );
                    $this->session->set_userdata('itemDesc', $itemDesc );
                    $this->session->set_userdata('itemPrice', $itemPrice );

                ?>

      <form action="<?php echo base_url('dashboard/upgrade/3') ?>" method="post" enctype="multipart/form-data"
        class="form-horizontal" role="form">
        <div class="form-group">
          <label class="" for="name">Your Product Name</label>
          <div class="">
            <input type="name" class="form-control" name="product_name" placeholder="<?php echo $itemName ?>"
              value="<?php echo $itemName ?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="" for="prof">Your Product Description</label>
          <div class="">
            <input type="text" class="form-control" name="product_desc" placeholder="<?php echo $itemDesc ?>"
              value="<?php echo $itemDesc  ?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <label class="" for="prof">Your Product Price</label>
          <div class="">
            <input type="text" class="form-control" name="price" placeholder="$ <?php echo $itemPrice ?>"
              value="<?php echo $itemPrice ?>" disabled>
          </div>
        </div>
        <div class="form-group">
          <div class="">
            <button type="submit" class="btn btn-primary" name="checkout"> Checkout</button><a href=""
              class="btn btn-danger pull-right" style="color: #fff;">Start Over</a>
          </div>
        </div>


      </form>

      <?php } ?>

      <?php

                if($pages == 3){ ?>

      <h2>Order Summary</h2><br>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Item Description</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $this->session->userdata('itemName') ?></td>
            <td><?php echo $this->session->userdata('itemDesc')  ?></td>
            <td><br>$<?php echo $this->session->userdata('itemPrice') ?></td>
          </tr>
        </tbody>
      </table>

      <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#save">Save Your Order</button>

      <br><br>

      <?php  include('templates/paymentform.php')   ?>

      <!-- Modal Save Order-->
      <div id="save" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Your Order Details will be Saved.</h4>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="<?php echo base_url("orders/saveorder") ?>">
                <input type="hidden" value="<?php echo $this->session->userdata('itemName') ?>" name="name">
                <input type="hidden" value="<?php echo $this->session->userdata('itemDesc')   ?>" name="desc">
                <input type="hidden" value="<?php echo $this->session->userdata('itemPrice') ?>" name="price">
                <input type="hidden" value="<?php echo $this->session->userdata('email') ?>" name="email">
                <button type="submit" name="saveorder" class="btn btn-success">Yes Save Order</button>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

      <?php } ?>

    </div>

  </div>


</div>
<!--page content-->