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
<table class="table"> 
    <thead>
      <tr><th>Add New Brand</th></tr>
    </thead>
    <tbody>
  <tr><td>
    <form method="post">
    <label for="brandname">Brand Name</label>
    <input type="text" name="brandname" id="brandname" class="form-control" placeholder="BrandName">
    <br>
    <button type="submit"  class="btn btn-warning">Post</button>
    </form>
    </tbody>
    </td>
    </tr>

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