<?php



class SingleBlog_ajax extends Core\Controller {


    public function AddLike() {

        $Blog_id = $_POST['Blog_id'];
        $user_id = $_POST['user_id'];

        $LikeButtonModel = $this->load_model("LikeButton");

        $data = $LikeButtonModel->AddLike($Blog_id, $user_id);
        echo json_encode($data);
    }



}