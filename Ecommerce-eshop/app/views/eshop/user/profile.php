<?php 

$this->view("eshop/user/header", $data); 

//show($orders);

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
<!-- WHITE PANEL - TOP USER -->
<div style="width: 500px; margin-left: 100px;">
<div  style=" background: #eee; border-radius: 10px; width: 400px; margin:auto; ">
<section id="main-content"> 
    <section class="wrapper" >   <!-- top Right Bottom Left -->
        <div class="white-panel pn">
        <div class="container">
            <div class="white-header" style="padding: 10px; width: 200px;">
                <h5>TOP USER</h5>
                <p style="margin-left:100px;"><img src="<?=ROOT . $data['user_data']->image?>" class="img-circle" width="100"></p>
                </div>
                <p style="padding:10px;"><b><?= $data['user_data']->name?></b></p>
                <div class="row" style="padding:10px;">
                    <div class="col-md-2">
                        <p class="small mt">MEMBER SINCE</p>
                        <p style="color: blue;"><?=  numstotime(date_create(($data['user_data']->date)));?></p>
                    </div>
                    <div class="col-md-6">
                        <p class="small mt">TOTAL SPEND</p>
                        <p style="color: blue;">$ 47,60</p>
                    </div>
                </div>
                </div>
             </div>
</section>

</section>
</div>
</div>
<?php if(is_array($orders)) : ?>

<div style="width: 600px; margin:20px;">
        <table class="table">
            <thead>
                <tr><th>Order no</th><th>Order date</th><th>amount</th><th>Delivery Address</th><th>City/State</th><th>Mobile Phone</th><th>...</th></tr>
            </thead>
            <tbody onclick="show_detailes(event)">
            <?php foreach($orders as $ord => $row) : ?>
                <tr style="position: relative;">
              <td><?= $row->id ?></td>
              <td><?= numstotime(date_create($row->date));?></td>
              <td><?= $row->total ?></td>
              <td><?= $row->delevery ?></td>
              <td><?= $row->country . "/" . $row->states ?></td>
              <td><?= $row->mobile_phone ?></td>
              <td>
                <i class="fa fa-arrow-down"></i>
               
                    <div class="js-order-details details hide" style="background: #aaa;">
                    <?php if(is_array($orders[$ord]->details)) : ?>
                    
                    <table class="table">
                        <thead>
                           <tr>
                            <th>order</th> <th>Description</th><th>quantity</th><th>Total</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php foreach($orders[$ord]->details as $details) : ?>
                            <tr>
                            <td><?=$details->order_id ?></td>
                                <td><?= $details->description ?></td>
                                <td><?=$details->qty ?></td>
                                <td><?=$details->total ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
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

<?php else : ?>
    <div>This user has No Orders Yet</div>
<?php endif; ?>


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

<?php $this->view("eshop/user/footer"); ?>
