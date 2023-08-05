<?php 




class Blog extends Core\Controller {



    public function index() {

        //Get All Category
        $category = $this->load_model("category_mod");
        $category = $category->get_all();
        $data['category'] = $category;

        // Blog Info
        $blog = $this->load_model("Blog_mod");
        $data['Blog_data']= $blog->get_blog_data();
        if($data['Blog_data']){
        foreach($data['Blog_data'] as $blog_d){
        $author = $blog->get_Blog_author($blog_d->author);
        
        }
        $data['author'] = $author;
    }


         //get the Data For The Header
         $user = $this->load_model('Login_mod');
         $user_data = $user->check_login();
         if(is_object($user_data)){
           $data['user_data'] = $user_data;
         }

       
        $data['Page_Title'] = "Blog";

        $this->view("eshop/user/blog", $data);
    }

}