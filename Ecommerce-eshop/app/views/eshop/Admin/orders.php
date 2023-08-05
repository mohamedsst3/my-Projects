<?php 

$this->view("eshop/Admin/header", $data);

$this->view("eshop/admin/sidebar", $data); 

?>

<style>
    .details{
        background-color: #eee;
        box-shadow: 0px 0px 10px #aaa;
        width: 100%;
        position: absolute;
        min-height: 100px;
        Left: 0px;
        padding: 10px;
        z-index: 2;
    }
    .hide{

        display: none;
    }

</style>

<div style="width: 900px; margin:auto; padding: 100px;">
<table class="table" style="position:relative;">

          <thead>
            <tr><th>Order no</th><th>Customer</th><th>Order date</th><th>amount</th><th>Delivery Address</th><th>City/State</th><th>Mobile Phone</th><th>...</th></tr>
            </thead>
            <tbody onclick="show_detailes(event)">
            <?php foreach($orders as $ord => $row) : ?>
                <tr style="position: relative;">
              <td><?= $row->id ?></td>
              <?php  foreach($row->user as $k => $v) : ?>
              <td><?= $v->name ?></td>
              <?php endforeach; ?>
              <td><?= numstotime(date_create($row->dat));?></td>
              <td><?= $row->tota ?></td>
              <td><?= $row->delever ?></td>
              <td><?= $row->countr . "/" . $row->states ?></td>
              <td><?= $row->mobile_phon ?></td>
              <td>
                <i class="fa fa-arrow-down"></i>

                    <div class="js-order-details details hide" style="background: #aaa;">
                    <?php if(is_array($orders[$ord]->details)) : ?>
                    
                    <table class="table" >
                        <?php foreach($orders[$ord]->details as $details) : ?>
                        <tr><th>order_id</th><td><?=$details->order_id ?></td></tr>
                        <tr><th>Quantity</th><td><?=$details->qty ?></td></tr>
                        </table>
                    <table class="table">
                        <tr><th>Description</th><td><?= $details->description ?></td></tr>
                        <tr><th>total</th> <td><?=$details->total ?></td></tr>
                        <tr><th>amount</th><td><?= $details->amount; ?></td></tr>
                     
                        <?php endforeach; ?>
                        </table>
                      
               
                <?php else: ?> 
                    <div>NO DATA</div>
                <?php endif; ?>
                </div>

            </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

</div>

<script>

    function show_detailes(e){
    let arrow = document.querySelector(".js-order-details");
    let row = e.target.parentNode;
    let all = e.currentTarget.querySelectorAll(".js-order-details");
    console.log(all);
    arrow.style.left = (e.clientX - 600) + "px";
    arrow.style.top =  (e.clientY - 220)+ "px";
    let details = row.querySelector(".js-order-details");
    for(let i = 0; i < all.length; i++){ 
     if(all[i] != details){
    all[i].classList.add("hide");
     }
    }
        if(details.classList.contains("hide")){
        details.classList.remove("hide");
        }else{
            details.classList.add("hide");

        }
    // alert(arrow.parentNode.nodeName);
    }
</script>

<?php $this->view("eshop/Admin/footer"); ?>