<?php

class Single_blog extends Core\Controller{

    public function index($a1){
  
        //Get All Category
        $category = $this->load_model("category_mod");
        $category = $category->get_all();
        $data['category'] = $category;

        // Blog Info
        $class_singelBlog = $this->load_model("SingleBlog");

        $Comment_Model = $this->load_model("Comment");

        $UserModel = $this->load_model("User");

        $single_blog = $class_singelBlog->get_single_blog($a1[1]);

        $blog = $this->load_model("Blog_mod");
        
        //get the blog author
        $data['Blog_data'] = $blog->get_blog_data();
        if($data['Blog_data']  != false):
        foreach($data['Blog_data'] as $blog_d){
        $author = $blog->get_Blog_author($blog_d->author);
        }
        $data['author'] = $author;
         endif;

       

          //Send Comments
          if(isset($_POST['Comment']) && !empty($_POST['Comment']) ){
            if(isset($_SESSION['user_url']) && !empty($_SESSION['user_url'])){
           $comment = $Comment_Model->Save_Comments($_SESSION['user_url'],$_POST['Comment'], $single_blog->id, $UserModel);
           if($comment){
            header("refresh: 0;");
            exit();
           }
          }else{
            header("Location: ".ROOT."Login");
            exit();
          }
        }

        //get Comments From Database
        if($a1[1]){
        $data['Comments'] =  $Comment_Model->Get_Comment($single_blog->id, $UserModel);
        }

             //get the Data For The Header
             $user = $this->load_model('Login_mod');
             $user_data = $user->check_login();
             if(is_object($user_data)){
               $data['user_data'] = $user_data;
             }

        $likesModel = $this->load_model("LikeButton");

        $data['Likes_model'] = $likesModel;

  
        $data['single_blog'] = $single_blog;

        $data['Page_Title'] = "Blog";
      
    $this->view("eshop/user/blog-single", $data);
    }
}