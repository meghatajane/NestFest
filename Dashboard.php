<?php
    namespace App\Controllers;

    use App\Models\User;
    use App\Models\Photo;
    use App\Models\Pg;
    use App\Models\Mess;

    class Dashboard extends BaseController
    {
        protected $helpers = ["custom"];

        public function __construct()
        {
            $session = session();
            $this->userdata = $session->get('userdata');
        }

        public function index(): string
        {
            $session = session();
            if($session->get('userdata')){
                if($session->get('userdata')['role'] == 1) {
                    $model = new Pg;
                    $total_pgs = $model->where('is_approved',1)->get()->getResultArray();
                    $data["total_pgs"] = count($total_pgs);

                    $model = new Mess;
                    $total_messes = $model->where('is_approved',1)->get()->getResultArray();
                    $data["total_messes"] = count($total_messes);

                    $model = new User;
                    $total_users = $model->where('role !=',1)->get()->getResultArray();
                    $data["total_users"] = count($total_users);

                    return view('admin/dashboard',$data);
                } else if($session->get('userdata')['role'] == 2) {
                    $model = new Pg;
                    $total_messes = $model->where('created_by',$this->userdata['id'])->get()->getResultArray();
                    $data["total_pgs"] = count($total_messes);

                    return view('admin/pg_dashboard',$data);
                } else if($session->get('userdata')['role'] == 3) {
                    $model = new Mess;
                    $total_messes = $model->where('created_by',$this->userdata['id'])->get()->getResultArray();
                    $data["total_messes"] = count($total_messes);

                    return view('admin/mess_dashboard',$data);
                } else {
                    $model = new Pg;
                    $total_pgs = $model->where('is_approved',1)->get()->getResultArray();
                    $data["total_pgs"] = count($total_pgs);

                    $model = new Mess;
                    $total_messes = $model->where('is_approved',1)->get()->getResultArray();
                    $data["total_messes"] = count($total_messes);
                    
                    return view('admin/student_dashboard',$data);
                }
            } else {
                return redirect("sign-in");
            }
        }

        public function remove_photo()
        {
            $model = new Photo;
            $photo = $model->select("avatar")->where("id",$this->request->getVar('id'))->first();
            if($photo) {
                $model->delete($this->request->getVar('id'));
                if($photo["avatar"] != "" && file_exists("public/uploads/pg/".$photo["avatar"]))
                    unlink("public/uploads/pg/".$photo["avatar"]);
            }
            echo json_encode(array("status" => 200));
            exit;
        }

        public function profile()
        {
            if(isset($this->userdata['id'])){
                $model = new User;
                $data["profile"] = $model->where('id',$this->userdata['id'])->first();
                return view('admin/profile',$data);
            } else {
                return redirect("/");
            }
        }

        public function submit_profile()
        {
            if(isset($this->userdata['id'])){
                $post = $this->request->getVar();

                $post["qrcode"] = $post["old_qrcode"];
                if($_FILES['qrcode']['name'] != "") {
                    $file = $this->request->getFile("qrcode");
                    $name = $file->getName();
                    $ext = $file->getClientExtension();

                    // Get random file name
                    $post["qrcode"] = $file->getRandomName(); 

                    // Store file in public/uploads/ folder
                    $file->move("public/uploads/qrcode/", $post["qrcode"]);

                    if($post["old_qrcode"] != "" && file_exists("public/uploads/qrcode/".$post["old_qrcode"]))
                        unlink("public/uploads/qrcode/".$post["old_qrcode"]);
                }
                $post["avatar"] = $post["old_avatar"];
                if($_FILES['avatar']['name'] != "") {
                    $file = $this->request->getFile("avatar");
                    $name = $file->getName();
                    $ext = $file->getClientExtension();

                    // Get random file name
                    $post["avatar"] = $file->getRandomName(); 

                    // Store file in public/uploads/ folder
                    $file->move("public/uploads/qrcode/", $post["avatar"]);
                }
                if($post["password"] == "") {
                    unset($post["password"]);
                } else {
                    $post["password"] = md5($post["password"]);
                }
                $model = new User;
                $model->update($this->userdata['id'],$post);

                return redirect("profile");
            } else {
                return redirect("/");
            }
        }
    }
