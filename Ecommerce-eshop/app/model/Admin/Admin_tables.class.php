<?php 



class Admin_tables{


    public function create_categories_teble($cats){
        $result = "";
       if(is_array($cats)) {
         
           foreach($cats as $cat_row){
               $parent = "";
               $Edit = $cat_row->id.",'".$cat_row->category."',". $cat_row->parent;
           
               foreach($cats as $cat_row2){
                   if($cat_row->parent == $cat_row2->id){
                       $parent = $cat_row2->category;
                   }
               }
        
            $result .= "<tr>";
            $result .= '
               <td><a href="basic_table.html#">'.$cat_row->category.'</a></td>
               
               <td><a href="basic_table.html#">'.$parent.'</a></td>
   
               <td>
                   <button  onclick="Edit_row('.$Edit.', event)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                   <button  onclick="delete_row('. $cat_row->id .')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
               </td>';
             
            $result .= "</tr>";
           
        }
           
        }else{
         $result .= "<b style='margin-left: 37%;'>No CAtegoties Found</b>";
        }
        return  $result;
       }


       public function create_teble($cats, $categoryModel){
        
        $result = "";
        
       if(is_array($cats)) {
   
           foreach($cats as $product_row){
   
           foreach($categoryModel->GetCategoryById($product_row->category) as $val){
               $product_Edit = $product_row->id .",'". $product_row->image."','".$product_row->image2."','".$product_row->description."','".$product_row->price."','".$product_row->category."','".$product_row->quantity."',";
            $result .= "<tr>";
             $result .='
             <td><div class="div_front_imageProduct"><img src="'. ROOT . $product_row->image.'"  width="100px""></div></td>
   
             <td><a href="basic_table.html#">'.$product_row->description.'</a></td>
   
            <td><a href="basic_table.html#">'.$product_row->price.'</a></td>
   
            <td><a href="basic_table.html#">'.$product_row->quantity.'</a></td> 
   
            <td><a href="basic_table.html#">'. $val->category.'</a></td> 
            
            <td><a href="basic_table.html#">'. numstotime(date_create($product_row->date)).'</a></td>
   
               <td><button id="Enable_disable" onclick="Dis_Ena('.$product_row->id.')" class="btn_dis" >'.$product_row->id.'</button></td>
               <td>
                   <button  onclick="Edit_row_product('.$product_Edit.' event)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
   
                   <button  onclick="delete_row('. $product_row->id .')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
               </td>';
             
            $result .= "</tr>";
           }
       }
           
       }else{
         $result .= "<b style='margin-left: 37%;'>No CAtegoties Found</b>";
        }
        return  $result;
       }
       
}