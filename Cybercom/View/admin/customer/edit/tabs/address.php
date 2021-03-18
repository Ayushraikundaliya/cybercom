<?php
$address = $this->getAddress();
$billing = [];
$shipping = [];

if($address){
    foreach($address as $key=>$value){
        if($value['addressType'] == 'Billing'){
            $billing = $value;
        }
        else if($value['addressType'] == 'Shipping'){
            $shipping = $value;
        }
    }
}
?>

<h3 style="text-align:center">Address Form</h3>
<div class="container border mt-3" style="padding:0px 70px; width:50%">
<form action="<?php echo $this->getUrl('addressSave') ?>" method="POST">
    <div class="form-group">
    <h3 class="text-center m-5 ">Billing Address</h3>
        <div class="row">
            <div class="col-6">
                <label for="address" class=" control-label">ADDRESS</label><br>
                <input class="form-control" type="text" name="address" value="<?php 
                        if(array_key_exists('address',$billing)){
                            echo $billing['address'];
                        };
                    ?>">
            </div>

            <div class="col-6">
                <label for="city" class=" control-label">CITY</label><br>
                <input class="form-control" type="text" name="city" value="<?php 
                        if(array_key_exists('city',$billing)){
                            echo $billing['city'];
                        };
                    ?>">
            </div>

            <div class="col-6">
                <label for="state" class=" control-label">STATE</label><br>
                <input class="form-control" type="text" name="state" value="<?php 
                        if(array_key_exists('state',$billing)){
                            echo $billing['state'];
                        };
                    ?>">
            </div>

            <div class="col-6">        
                <label for="zipcode" class=" control-label">ZIPCODE</label><br>
                <input class="form-control" type="text" name="zipcode" value="<?php 
                        if(array_key_exists('zipcode',$billing)){
                            echo $billing['zipcode'];
                        };
                    ?>">
            </div>

            <div class="col-6">        
                <label for="country" class=" control-label">COUNTRY</label><br>
                <input class="form-control" type="text" name="country" value="<?php 
                        if(array_key_exists('country',$billing)){
                            echo $billing['country'];
                        };
                    ?>">
            </div>
        </div>     
    </div>


    <h3 class="text-center m-5 ">Shipping Address</h3>
    <div class="row">
        <div class="col-6">
            <label for="address" class=" control-label">ADDRESS</label><br>
            <input class="form-control" type="text" name="shippingaddress" value="<?php 
                    if(array_key_exists('address',$shipping)){
                        echo $shipping['address'];
                    };
                ?>">
        </div>

        <div class="col-6">
            <label for="city" class=" control-label">CITY</label><br>
            <input class="form-control" type="text" name="shippingcity" value="<?php 
                    if(array_key_exists('city',$shipping)){
                        echo $shipping['city'];
                    };
                ?>">
        </div>

        <div class="col-6">
            <label for="state" class=" control-label">STATE</label><br>
            <input class="form-control" type="text" name="shippingstate" value="<?php 
                    if(array_key_exists('state',$shipping)){
                        echo $shipping['state'];
                    };
                ?>">
        </div>

        <div class="col-6">
            <label for="zipcode" class=" control-label">ZIPCODE</label><br>
            <input class="form-control" type="text" name="shippingzipcode" value="<?php 
                    if(array_key_exists('zipcode',$shipping)){
                        echo $shipping['zipcode'];
                    };
                ?>">
        </div>

        <div class="col-6">
            <label for="country" class=" control-label">COUNTRY</label><br>
            <input class="form-control" type="text" name="shippingcountry" value="<?php 
                    if(array_key_exists('country',$shipping)){
                        echo $shipping['country'];
                    };
                ?>">
        </div>
        <div>
            <input type="submit" value="Save" class="btn btn-success m-4 font-weight-bold" style="padding:5px 30px">
            <input type="reset" value="Reset" class="btn btn-success m-4 font-weight-bold" style="padding:5px 30px">
        </div>     
    </div>
</form>
</div>



