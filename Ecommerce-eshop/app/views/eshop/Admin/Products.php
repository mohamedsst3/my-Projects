<?php
$this->view("eshop/Admin/header", $data);
$this->view("eshop/admin/sidebar", $data);

?>

<!--main content start-->

<section id="main-content">
    <section class="wrapper site-min-height">
<h3><i class="fa fa-angle-right"></i> Products Page</h3>
<div class="row mt">
    <div class="col-lg-12">

        <style type="text/css">
            .add_new {
                width: 400px;
                height: 590px;
                background: #cecccc;
                position: absolute;
                padding: 6px;
                border-radius: 5px;
            }

            .disnone {
                display: none;
            }
            #Edit_rove{
                
                width: 350px;
                height: 630px;
                background: #cecccc;
                position: absolute;
                padding: 6px;
                border-radius: 5px;
                /* top right bottom left */
                
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
                <h4><i class="fa fa-angle-right"></i> Products <button class="btn btn-primary btn-xs" id="btnin" onclick="show_div()"><i class="fa fa-plus"></i>Add New</button></h4>
                    
                <!--  Edit Product -->
                <div class="Edit_cat disnone" id="Edit_rove">
                
                <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                <form class="form-horizontal style-form" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Product Name</label>
                        <div class="col-sm-10">
                            <input id="description_Edit" name="description_Edit" type="text" class="form-control" placeholder="description" required >
                        </div>
                        
                        <br style="clear: both;">
                            <br>
                        <label class="col-sm-2 col-sm-2 control-label">Category</label>
                        <div class="col-sm-10" >
                            <select id="category_Edit" name="category_Edit" class="form-control"  >
                                <option disabled selected>...</option>
                                <?php  if(isset($categories)) : ?>
                                    <?php foreach($categories as $category) : ?>
                                        <option value="<?=$category->id?>"><?= $category->category ?></option>
                                    <?php endforeach; ?>

                                <?php endif;  ?>
                            </select>
                        </div>
                        
                        <br style="clear: both;">
                            <br>
                        <label class="col-sm-2 col-sm-2 control-label">Price</label>
                        <div class="col-sm-10" >
                            <input id="price_Edit" name="price_Edit" type="number" step="0.1" class="form-control"  placeholder="Price" required >
                        </div>
                        
                        <br style="clear: both;">
                            <br>
                        <label class="col-sm-2 col-sm-2 control-label">Quantity</label>
                        <div class="col-sm-10" >
                            <input id="quantity_Edit" name="quantity_Edit" type="text" class="form-control"  placeholder="Quantity" required >
                        </div>
                        
                        <br style="clear: both;">
                        <br>
                        <label class="col-sm-2 col-sm-2 control-label">image One</label>
                        <div class="col-sm-10" >
                            <input id="image_Edit" name="image" onchange="display_image(this.files[0], this.name, 'div_front_imageProduct')"  type="file" class="form-control">
                        </div>

                        <br style="clear: both;">
                        <br>
                        <label class="col-sm-2 col-sm-2 control-label">image2(optional)</label>
                        <div class="col-sm-10" >
                            <input id="image2_Edit" name="image2" onchange="display_image(this.files[0], this.name, 'imag_div')"  type="file" class="form-control">
                        </div>

                        <br style="clear: both;">
                        <br>
                        <label class="col-sm-2 col-sm-2 control-label">image3(optional)</label>
                        <div class="col-sm-10" >
                            <input id="image3_Edit" name="image3" onchange="display_image(this.files[0], this.name, 'imag_div')"  type="file" class="form-control">
                        </div>
                        
                        <br style="clear: both;">
                        <br>
                        <label class="col-sm-2 col-sm-2 control-label">image4(optional)</label>
                        <div class="col-sm-10" >
                            <input id="image4_Edit" name="image4" onchange="display_image(this.files[0], this.name, 'imag_div')"  type="file" class="form-control">
                        </div>
                    </div>
                    <div class="imag_div">
                     <img alt="not found" id="img_prev2"  style="height:70px; width:80px; margin-top:20px;">
                     <img alt="not found"  style="height:70px; width:80px; margin-top:20px;">
                     <img alt="not found"  style="height:70px; width:80px; margin-top:20px;">
                    </div>
                    <br style="clear: both;">
                    <button type="button" id="savebtn_Edit" class="btn btn-info" style="float:right;">Save</button>

                    <button type="button" class="btn btn-warning" id="close_Edit" style="float:left; ">Close</button>

                </form>
                
            </div>
                <!-- End Edit Product -->
                            
                <!-- Add New Product -->
                <div class="add_new disnone" id="somerr">
                
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                    <form class="form-horizontal style-form" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Product Name</label>
                            <div class="col-sm-10">
                                <input id="description" name="description" type="text" class="form-control" placeholder="description" required >
                            </div>
                            
                            <br style="clear: both;">
                                <br>
                            <label class="col-sm-2 col-sm-2 control-label">Category</label>
                            <div class="col-sm-10" >
                                <select id="category" name="category" class="form-control"  >
                                    <option disabled selected>...</option>
                                    <?php  if(isset($categories)) : ?>
                                        <?php foreach($categories as $category) : ?>
                                            <option value="<?=$category->id?>"><?= $category->category ?></option>
                                        <?php endforeach; ?>

                                    <?php endif;  ?>
                                </select>
                            </div>
                            
                            <br style="clear: both;">
                                <br>
                            <label class="col-sm-2 col-sm-2 control-label">Price</label>
                            <div class="col-sm-10" >
                                <input id="price" name="price" type="number" step="0.1" class="form-control"  placeholder="Price" required >
                            </div>
                            
                            <br style="clear: both;">
                                <br>
                            <label class="col-sm-2 col-sm-2 control-label">Quantity</label>
                            <div class="col-sm-10" >
                                <input id="quantity" name="quantity" type="text" class="form-control"  placeholder="Quantity" required >
                            </div>
                            <br style="clear: both;">
                                <br>
                            <label for="Brand" class="col-sm-2 col-sm-2 control-label">Brand</label>
                            <div class="col-sm-10" >
                                <select style="width: 290px; padding:10px;">
                                    <option selected disabled>Brands</option>
                                    <?php foreach($Brands as $brand) : ?>
                                    <option value="<?=$brand->id?>"><?= $brand->Brand_Name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <br style="clear: both;">
                            <br>
                            <label class="col-sm-2 col-sm-2 control-label">image One</label>
                            <div class="col-sm-10" >
                                <input id="image" name="image" type="file" class="form-control">
                            </div>

                            <br style="clear: both;">
                            <br>
                            <label class="col-sm-2 col-sm-2 control-label">image2 (optional)</label>
                            <div class="col-sm-10" >
                                <input id="image2" name="imageone" type="file" class="form-control">
                            </div>

                            <br style="clear: both;">
                            <br>
                            <label class="col-sm-2 col-sm-2 control-label">image3 (optional)</label>
                            <div class="col-sm-10" >
                                <input id="image3" name="imageone" type="file" class="form-control">
                            </div>

                            <br style="clear: both;">
                            <br>
                            <label class="col-sm-2 col-sm-2 control-label">image4 (optional)</label>
                            <div class="col-sm-10" >
                                <input id="image4" name="imageone" type="file" class="form-control">
                            </div>

                        </div>
                        <br style="clear: both;">
                        <button type="button" id="savebtn" class="btn btn-info" style="float:right; margin-top: 60px;">Save</button>

                        <button type="button" class="btn btn-warning" id="close" style="float:left; margin-top: 60px;">Close</button>

                    </form>

                </div>
                    <!-- End Add New Product -->
                <hr>
                <thead>
                    <tr>
                    <th><i class="fa fa-bullhorn"></i> Image</th>
                        <th><i class="fa fa-bullhorn"></i> Product</th>
                        <th><i class=" fa fa-edit"></i> Price</th>
                        <th><i class=" fa fa-edit"></i> Quantity</th>
                        <th><i class=" fa fa-edit"></i> Category</th>
                        <th><i class=" fa fa-edit"></i> date</th>
                        <th><i class=" fa fa-edit"></i> likes</th>
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

let saveBtn = document.querySelector("#savebtn");


    function Dis_Ena(id){
        send_data({
        data_type: "Enadbel_disable",
        id:id,
        });

    }
  
    function delete_row(id){
    let form = new FormData();
    form.append("id", id);
    form.append('data_type',  "delete_row");
    send_data_files(form);

    }



    function display_image(file, name, element){
        let index = 0;
        if(name == "image2"){
            index = 0;
        }else
        if(name == "image3"){
            index = 1;
        }else
        if(name == "image4"){
            index = 2;
        }

        var image_holder = document.querySelector("." + element);
        var  images = image_holder.querySelectorAll("IMG");// Call by tag
        images[index].src = URL.createObjectURL(file); //image index one or three 
    }

    
/**
 * Edit_Product_data
 */


 //Edit Products Page 
function Edit_row_product(id, image, image2, desc, price, cat, quan, e) {
    
    let Edit_page = document.querySelector("#Edit_rove");
     Edit_page.style.left = (e.clientX - 600) + "px";
     Edit_page.style.top =  (e.clientY - 150)+ "px";


    if(Edit_page.classList.contains("disnone")){
        Edit_page.classList.remove("disnone");
       
    }else{
        Edit_page.classList.add("disnone");
    }

    let image_one = document.querySelector("#img_prev");

let div_image2 = document.querySelector("#img_prev2");
div_image2.src = "http://localhost/Ecommerce-eshop/public/" + image2;
    

let description_inp_Edit = document.querySelector("#description_Edit");

let price_inp_Edit = document.querySelector("#price_Edit");

let category_inp_Edit = document.querySelector("#category_Edit");

let image_inp_Edit = document.querySelector("#image_Edit");

let quantity_Edit = document.querySelector("#quantity_Edit");

description_inp_Edit.value = desc;

price_inp_Edit.value = price;

category_inp_Edit.value = cat;

quantity_Edit.value = quan;


let EditBtn = document.getElementById("savebtn_Edit");

EditBtn.onclick = function () {

if (description_inp_Edit.value.trim() == "") {
   return alert("The description is empty");
}

if (price_inp_Edit.value.trim() == "") {
   return alert("The price is not valid");
}

if (category_inp_Edit.value.trim() == "") {
   return alert("The category is not valid");
}

// if (quantity_Edit.value.trim() == "") {
//    return alert("The image is not valid");
// }

// if (image_inp_Edit.files.length < 1) {
//    return alert("The image is not valid");
// }

know.classList.add("disnone");

var data = new FormData();

let image_inp2_Edit = document.querySelector("#image2_Edit");


let image_inp3_Edit = document.querySelector("#image3_Edit");


let image_inp4_Edit = document.querySelector("#image4_Edit");


data.append("desc", description_inp_Edit.value.trim());

data.append('quantity', quantity_Edit.value.trim());

data.append('price', price_inp_Edit.value.trim());

data.append('category',category_inp_Edit.value.trim());

data.append('image',image_inp_Edit.files[0]);

data.append('image2',image_inp2_Edit.files[0]);

data.append('image3',image_inp3_Edit.files[0]);

data.append('image4',image_inp4_Edit.files[0]);

data.append("id", id);

data.append('data_type',  "Edit_product");

send_data_files(data);

Edit_page.classList.add("disnone");
}

}

//Add New Product
saveBtn.onclick = function() {

let description_inp = document.querySelector("#description");
if (description_inp.value.trim() == "") {
   return alert("The description is empty");
}

let price_inp = document.querySelector("#price");
if (price_inp.value.trim() == "") {
   return alert("The price is not valid");
}

let category_inp = document.querySelector("#category");
if (category_inp.value.trim() == "") {
   return alert("The category is not valid");
}


let quantity = document.querySelector("#quantity");
if (quantity.value.trim() == "") {
   return alert("The quantity is not valid");
}

let image_inp = document.querySelector("#image");
if (image_inp.files.length < 1) {
   return alert("The image is not valid");
}

know.classList.add("disnone");

var data = new FormData();

let image_inp2 = document.querySelector("#image2");
if (image_inp2.files.length > 0) {
        data.append('image2',image_inp2.files[0]);
}


let image_inp3 = document.querySelector("#image3");
if (image_inp3.files.length > 0) {
      data.append('image3',image_inp3.files[0]);
}

let image_inp4 = document.querySelector("#image4");
if (image_inp4.files.length > 0) {

    data.append('image4',image_inp4.files[0]);
}


data.append("desc", description_inp.value.trim());

data.append('quantity', quantity.value.trim());

data.append('price', price_inp.value.trim());

data.append('category',category_inp.value.trim());

data.append('image',image_inp.files[0]);

data.append('data_type',  "add_product");


send_data_files(data); 


}

async function send_data(data) {

    var ajax = new XMLHttpRequest();

     //third send the response to the hadle_result function
    ajax.addEventListener("readystatechange", function()  {
        if (ajax.readyState == 4 && ajax.status == 200) {
          hadle_result(ajax.responseText);
        }
    });
    //second post the data to ajax controller page as json
    ajax.open("POST", "<?=ROOT?>Ajax_product", true);
    //this Same with ajax.responseText 
    ajax.send(JSON.stringify(data));

}


async function send_data_files(formdata) {

var ajax = new XMLHttpRequest();

ajax.addEventListener("readystatechange", function()  {
    if (ajax.readyState == 4 && ajax.status == 200) {
      hadle_result(ajax.responseText);
    }
});

ajax.open("POST", "<?=ROOT?>Ajax_product", true);

ajax.send(formdata);

}
 

function hadle_result(result) {
 console.log(result);
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
