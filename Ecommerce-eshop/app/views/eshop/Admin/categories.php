<?php
$this->view("eshop/Admin/header", $data);
$this->view("eshop/admin/sidebar", $data);

?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> Category Page</h3>
        <div class="row mt">
            <div class="col-lg-12">

                <style type="text/css">
                    .add_new {
                        width: 400px;
                        height: 450px;
                        background: #cecccc;
                        position: absolute;
                        padding: 6px;
                        border-radius: 5px;
                    }

                    .disnone {
                        display: none;
                    }
                   
                    .Edit{
                        width: 350px;
                        height: 400px;
                        background: #cecccc;
                        position: absolute;
                        padding: 6px;
                        border-radius: 5px;
                    }

                    .btn_dis{
                        background: orange;
                        color: aliceblue;
                        border-radius: 5px;
                        padding: 3px;
                        border: none;

                    }

                </style>

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <h4><i class="fa fa-angle-right"></i> Products Category <button class="btn btn-primary btn-xs" id="btnin" onclick="show_div()"><i class="fa fa-plus"></i>Add New</button></h4>
                                 
                                <!--  Edit Category -->
                                <div class="Edit disnone" id="Edit_cat">
                                <h4 class="mb"><i class="fa fa-pencil"></i> Form Edit</h4>
                                <form class="form-horizontal style-form" method="post">
                                <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
                                <div class="col-sm-10">
                                <input id="Edit_inp" type="text" class="form-control">
                                </div>

                                <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                                    <form class="form-horizontal style-form" method="post">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
                                        
                                            <div class="col-sm-10" >
                                <select id="Edit_parent" name="Edit_parent" class="form-control"  >
                                    <option disabled selected>...</option>
                                    <?php  if(isset($category)) : ?>
                                        <?php foreach($category as $cat) : ?>
                                            <option value="<?=$cat->id?>"><?= $cat->category ?></option>
                                        <?php endforeach; ?>

                                    <?php endif;  ?>
                                </select>
                            </div>
                        </div>

                                <button type="button" id="Update_btn"  class="btn btn-info" style="float:right; margin-top: 67%;">Update</button>
                                </form>
                                </div>
                                <!-- End Edit Category -->

                                <!-- Add New Category -->
                                <div class="add_new disnone" id="somerr">
                              
                                    <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                                    <form class="form-horizontal style-form" method="post">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
                                            <div class="col-sm-10">
                                                <input id="category" name="category" type="text" class="form-control">
                                            </div>
                                        </div>

                                        <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                                    <form class="form-horizontal style-form" method="post">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Category Name</label>
                                            <div class="col-sm-10" >

                                            <select id="parent" name="parent" class="form-control"  >
                                                <option disabled selected>...</option>
                                                <?php  if(isset($category)) : ?>
                                                    <?php foreach($category as $cat) : ?>
                                                        <option value="<?=$cat->id?>"><?= $cat->category ?></option>
                                                    <?php endforeach; ?>

                                                <?php endif;  ?>
                                            </select>
                                        </div>
                                    </div>
                                        
                                        <br style="clear: both;">
                                        <button type="button" id="savebtn" class="btn btn-info" style="float:right; margin-top: 67%;">Save</button>

                                        <button type="button" class="btn btn-warning" id="close" style="float:left; margin-top: 60%;">Close</button>

                                    </form>
                                  
                                </div>
                                 <!-- End Add New Category -->
                                <hr>
                                <thead>
                                    <tr>
                                        <th><i class="fa fa-bullhorn"></i> Company</th>
                                        <th><i class="fa fa-bullhorn"></i> Parent</th>
                                        <th><i class=" fa fa-edit"></i> Status</th>
                                        <th><i class=" fa fa-edit"></i> Action</th>
                                    </tr>
                                </thead>
                                <tbody  id="table_body">
                               
                                <?php
                                

                              echo $rows;

                                ?>


                                </tbody>
                            </table>
                        </div><!-- /content-panel -->
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->

            </div>
        </div>

    </section>
    <!--/wrapper -->
</section><!-- /MAIN CONTENT -->

<script>

function Dis_Ena(id){
    send_data({
    data_type: "Enadbel_disable",
    id:id,
    });

}

let saveBtn = document.querySelector("#savebtn");

  

    function Edit_row(id, category, parent, e){


        let Edit_page = document.querySelector("#Edit_cat");

        let Edit_inp = document.querySelector("#Edit_inp");

        if(Edit_page.classList.contains("disnone")){
        Edit_page.classList.remove("disnone");
        Edit_inp.focus();

        }else{

        Edit_page.classList.add("disnone");

        }

    
     Edit_page.style.left = (e.clientX - 600) + "px";
     Edit_page.style.top =  (e.clientY - 150)+ "px";
     
    let Update_btn = document.querySelector("#Update_btn");

    let Edit_parent = document.querySelector("#Edit_parent");
     Edit_parent.value = parent;
     

    Update_btn.onclick = function() {
        
    let cat_name = Edit_inp.value.trim();
    Edit_page.classList.add("disnone");
    send_data({
    data_type: "Edit_row",
    id:id,
    category:cat_name,
    parent:Edit_parent.value,
    });
    }
    
    }

    function delete_row(id){
    send_data({
    data_type: "delete_row",   
    id:id
    });

    }


saveBtn.onclick = function() {

let category_inp = document.querySelector("#category");
if (category_inp.value.trim() == "") {
    alert("The input is empty");
}

let parent = document.querySelector("#parent");
if (parent.value.trim() == "") {
    alert("The input is empty");
}


know.classList.add("disnone");

let category = category_inp.value.trim();

    //first get the data from the input
send_data({
    category: category,
    parent:parent.value,
    data_type: "add_category"
    });

} 


function send_data(data) {

    var ajax = new XMLHttpRequest();

     //third send the response to the hadle_result function
    ajax.addEventListener("readystatechange", function()  {
        if (ajax.readyState == 4 && ajax.status == 200) {
          hadle_result(ajax.responseText); // get the response text from the php files
        }
    });
    //second post the data to ajax controller page as json
    ajax.open("POST", "<?=ROOT?>Ajax_category", true);
    //this Same with ajax.responseText 
    ajax.send(JSON.stringify(data));
}

function hadle_result(result) {
 alert(result);
 if(result != ""){
    //fourth parse the response 
    var obj = JSON.parse(result);
    if(obj !=  ""){
        
        // alert(obj.message);
        //fifth put the data in the container
        var table = document.querySelector("#table_body");
        table.innerHTML = obj.data;

    }else{
        alert("No Data");
   }
  }
}

</script>

<?php
$this->view("eshop/Admin/footer");
