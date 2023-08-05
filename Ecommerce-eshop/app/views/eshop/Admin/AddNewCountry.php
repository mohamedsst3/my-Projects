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
    <label for="Country">Country Name</label>
    <input type="text" name="Country" id="Country" class="form-control" placeholder="Country">
    <br>
    <button type="submit"  class="btn btn-warning">Post</button>
    </form>
    </tbody>
    </td>
    </tr>

</table>
</div>


<?php $this->view("eshop/Admin/footer"); ?>