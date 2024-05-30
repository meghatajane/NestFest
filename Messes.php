<?php
    namespace App\Controllers;

    use App\Models\User;
    use App\Models\Mess;
    use App\Models\Photo;
    use App\Models\Mess_booking;
    use App\Models\Feedback;
    use App\Models\Tiffin;

    class Messes extends BaseController
    {
        protected $helpers = ["custom"];

        public function __construct()
        {
            $session = session();
            $this->userdata = $session->get('userdata');
        }

        public function index(): string
        {
            //preview($this->userdata);
            if(isset($this->userdata['id'])){
                /* $model = new Mess;
                $data["messes"] = $model->where('created_by',$this->userdata['id'])->orderBy('id',"desc")->get()->getResultArray(); */
                if($this->userdata["role"] == 3) {
                    $model = new Mess;
                    $data["messes"] = $model->where('created_by',$this->userdata['id'])->orderBy('id',"desc")->get()->getResultArray();   
                } else {
                    $model = new Mess;
                    $data["messes"] = $model->where('is_approved',1)->orderBy('id',"desc")->get()->getResultArray(); 
                }
                $data["userdata"] = $this->userdata;

                return view("admin/mess/list",$data);
            } else {
                return redirect("/");
            }
        }

        public function new()
        {
            $session = session();
            if($session->get("userdata")){
                $data["mess"] = array();

                return view("admin/mess/add_edit",$data);
            } else {
                return redirect("/");
            }
        }

        public function create()
        {
            $session = session();

            $post = $this->request->getVar();
            $post['created_by'] = $this->userdata['id'];
            $post['updated_by'] = 0;
            $post['created_at'] = date('Y-m-d H:i:s');
            $post['updated_at'] = "0000-00-00 00:00:00";
            $model = new Mess;
            if($model->insert($post)) {
                $parent_id = $model->getInsertID();

                $photos = [];
                $total = count($_FILES['photos']['name']);
                for($i = 0; $i < $total; $i++)
                {
                    $tmpFilePath = $_FILES['photos']['tmp_name'][$i];
                    if($tmpFilePath != "")
                    {
                        $info1 = pathinfo($_FILES['photos']['name'][$i]);
                        $ext = $info1['extension'];
                        $avatar = time() . rand(10000,99999) . "." . $ext; 
                        $newFilePath = "public/uploads/mess/" . $avatar;
                        if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                            $photos[] = array(
                                "parent_id" => $parent_id,
                                "photo_type" => 2,
                                "avatar" => $avatar
                            );
                        }
                    }
                }
                if($photos) {
                    $model = new Photo;
                    $model->insertBatch($photos);
                }
            }
            return redirect('messes');
        }

        public function edit($id)
        {
            $session = session();
            if($session->get("userdata")){
                $model = new Mess;
                $data["mess"] = $model->where('id',$id)->first();
                if($data["mess"]) {
                    if($data["mess"]["created_by"] == $this->userdata["id"]) {
                        $model = new Photo;
                        $data["photos"] = $model->select("id,avatar")->where(array("parent_id" => $id,"photo_type" => 2))->get()->getResultArray();
                        return view("admin/mess/add_edit",$data);
                    } else {
                        return redirect("messes");        
                    }
                }
            } else {
                return redirect("/");
            }
        }

        public function update($id)
        {
            $session = session();
            
            $photos = [];
            $total = count($_FILES['photos']['name']);
            for($i = 0; $i < $total; $i++)
            {
                $tmpFilePath = $_FILES['photos']['tmp_name'][$i];
                if($tmpFilePath != "")
                {
                    $info1 = pathinfo($_FILES['photos']['name'][$i]);
                    $ext = $info1['extension'];
                    $avatar = time() . rand(10000,99999) . "." . $ext; 
                    $newFilePath = "public/uploads/mess/" . $avatar;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $photos[] = array(
                            "parent_id" => $id,
                            "photo_type" => 2,
                            "avatar" => $avatar
                        );
                    }
                }
            }
            $post = $this->request->getVar();
            $post['updated_by'] = $this->userdata['id'];
            $post['updated_at'] = date('Y-m-d H:i:s');
            $model = new Mess;
            if($model->update($id,$post)) {
                if($photos) {
                    $model = new Photo;
                    $model->insertBatch($photos);
                }
            }
            return redirect('messes');
        }

        public function show($id)
        {
            $model = new Pg;
            if($model->where('id',$id)->delete()) {
                return redirect('messes');
            }
        }

        public function photos($id)
        {
            echo $id;
        }

        public function pending_pgs()
        {
            if(isset($this->userdata['id'])){
                $model = new Mess;
                $data["messes"] = $model->where('is_approved',0)->get()->getResultArray();

                return view("admin/mess/pending_list",$data);
            } else {
                return redirect("/");
            }
        }

        public function approve_pg($id)
        {
            $model = new Mess;
            $model->update($id,array("is_approved" => 1));

            return redirect("pending-messes");
        }

        public function reject_pg($id)
        {
            $model = new Mess;
            $model->update($id,array("is_approved" => 2));

            return redirect("pending-messes");
        }

        // public function pg_view($id)
        // {
        //     $model = new Mess;
        //     $data["mess"] = $model->where('id',$id)->first();
        //     if($data["mess"]) {
        //         $model = new Photo;
        //         $data["photos"] = $model->select("id,avatar")->where(array("parent_id" => $id,"photo_type" => 2))->get()->getResultArray();
        //         return view("admin/mess/view",$data);
        //     }
        // }

        public function mess_list()
        {
            if(isset($this->userdata['id'])){
                $post = $this->request->getVar();
                
                $data["search_price"] = "";
                $data["search_capacity"] = "";
                $where = "1 = 1";
                if(isset($post["submit"])) {
                    if($post["price"] != "") {
                        $where .= " AND `rent` <= '".$post["price"]."'";
                        $data["search_price"] = $post["price"];
                    }
                    if($post["capacity"] != "") {
                        $where .= " AND `capacity` <= '".$post["capacity"]."'";
                        $data["search_capacity"] = $post["capacity"];
                    }
                }
                $model = new Mess;
                $data["messes"] = $model->where('is_approved',1)->where($where)->orderBy('id',"desc")->get()->getResultArray();
                if($data["messes"]) {
                    $model = new Feedback;
                    foreach($data["messes"] as $key => $val) {
                        $rate = $model->selectSum("rate")->where('pg_mess_id',$val["id"])->where("feedback_type",2)->get()->getRowArray();
                        if($rate && !empty($rate["rate"])) {
                            $count = $model->where('pg_mess_id',$val["id"])->where("feedback_type",2)->get()->getResultArray();
                            $data["messes"][$key]['rate'] = $rate["rate"]/count($count);
                        } else {
                            $data["messes"][$key]['rate'] = 0;
                        }
                    }
                }
                $names = array();
                foreach ($data["messes"] as $key => $val)
                {
                    $names[$key] = $val["rate"];
                }
                array_multisort($names, SORT_DESC, $data["messes"]);
                return view("admin/mess/approved_messes",$data);
            } else {
                return redirect("/");
            }       
        }

        public function mess_view($id)
        {
            if(isset($this->userdata['id'])){
                $data["is_applied"] = 0;
                $model = new Mess;
                $data["mess"] = $model->where('id',$id)->first();
                if($data["mess"]) {
                    $model = new Photo;
                    $data["photos"] = $model->select("id,avatar")->where(array("parent_id" => $id,"photo_type" => 2))->get()->getResultArray();

                    $model = new Mess_booking;
                    $booking = $model->select("status,payment_status")->where('mess_id',$id)->where('created_by',$this->userdata['id'])->get()->getRowArray();
                    if($booking) {
                        if($booking["status"] == 1 && $booking["payment_status"] == 1) {
                            $data["is_applied"] = 1;
                        } else {
                            $data["is_applied"] = 2;
                        }
                    }
                    return view("admin/mess/view",$data);
                }
            } else {
                return redirect("/");
            }
        }

        public function apply_mess()
        {
            $documents = [];
            $total = count($_FILES['documents']['name']);
            for($i = 0; $i < $total; $i++)
            {
                $tmpFilePath = $_FILES['documents']['tmp_name'][$i];
                if($tmpFilePath != "")
                {
                    $info1 = pathinfo($_FILES['documents']['name'][$i]);
                    $ext = $info1['extension'];
                    $avatar = time() . rand(10000,99999) . "." . $ext; 
                    $newFilePath = "public/uploads/booking/" . $avatar;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $documents[] = array(
                            "item_id" => ($i+1),
                            "avatar" => $avatar
                        );
                    }
                }
            }
            $post = $this->request->getVar();
            $amount = 0;

            $model = new Mess;
            $mess = $model->select('rent')->where('id',$post["mess_id"])->first();
            if($mess) {
                $amount = $mess["rent"];
            }
            $insert_data = array(
                "mess_id" => $post["mess_id"],
                "mess_amount" => $amount,
                "status" => 0,
                "payment_status" => 0,
                "documents" => json_encode($documents),
                "screenshot" => "",
                "created_by" => $this->userdata['id'],
                "updated_by" => 0,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            );
            $model = new Mess_booking;
            $model->insert($insert_data);

            return redirect("mess-bookings");
        }

        public function mess_bookings()
        {
            if(isset($this->userdata['id'])){
                $model = db_connect();
                $booking = $model->table("mess_bookings mb");
                $booking = $booking->join("messes m","m.id=mb.mess_id");
                $booking = $booking->select("mb.id,mb.mess_id,mb.mess_amount,mb.status,mb.payment_status,mb.documents,mb.screenshot,mb.created_at,m.name AS mess_name");
                $booking = $booking->where("mb.created_by",$this->userdata['id']);
                $data["bookings"] = $booking->get()->getResultArray();   
                if($data["bookings"]) {
                    foreach($data["bookings"] as $key => $val) {
                        $qrcode = "";
                        $model = new Mess;
                        $mess = $model->select('created_by')->where('id',$val["mess_id"])->first();
                        if($mess) {
                            $model = new User;
                            $user  = $model->select('qrcode')->where('id',$mess["created_by"])->first();
                            if($user) {
                                if($user["qrcode"] != "")
                                    $qrcode = base_url("public/uploads/qrcode/".$user["qrcode"]);
                            }
                        }
                        $data["bookings"][$key]["qrcode"] = $qrcode;
                    }
                }
                return view("admin/mess/booking",$data); 
            } else {
                return redirect("/");
            }
        }

        public function make_payment()
        {
            $post = $this->request->getVar();

            $screenshot = "";
            if($_FILES['screenshot']['name'] != "") {
                $file = $this->request->getFile("screenshot");
                $name = $file->getName();
                $ext = $file->getClientExtension();

                // Get random file name
                $screenshot = $file->getRandomName(); 

                // Store file in public/uploads/ folder
                $file->move("public/uploads/booking/screenshot", $screenshot);

                $model = new Mess_booking;
                $model->update($post["booking_id"],array("screenshot" => $screenshot,"payment_status" => 1,"updated_by" => $this->userdata['id'],"updated_at" => date("Y-m-d H:i:s")));

                return redirect("mess-bookings");
            }
        }

        public function mess_feedback()
        {
            $post = $this->request->getVar();

            $insert_data = array(
                "pg_mess_id" => $post["mess_feedback_id"],
                "feedback_type" => 2,
                "rate" => $post["rate"],
                "comment" => $post["comment"],
                "created_by" => $this->userdata['id'],
                "updated_by" => 0,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            );
            $model = new Feedback;
            $model->insert($insert_data);

            return redirect("mess-list");    
        }

        public function my_mess_bookings()
        {
            if(isset($this->userdata['id'])){
                $model = new Mess;
                $mymesses = $model->select("id")->where("created_by",$this->userdata['id'])->get()->getResultArray();
                $ids = [];
                if($mymesses) {
                    foreach($mymesses as $val) {
                        $ids[] = $val["id"];
                    }
                } 
                $data["bookings"] = [];
                if(!empty($ids)) {
                    // $model = db_connect();
                    // $booking = $model->table("pg_bookings pb");
                    // $booking = $booking->join("pgs p","p.id=pb.pg_id");
                    // $booking = $booking->join("users u","u.id=pb.created_by");
                    // $booking = $booking->select("pb.id,pb.pg_id,pb.pg_amount,pb.status,pb.payment_status,pb.documents,pb.screenshot,pb.created_at,p.name AS pg_name,u.name AS requested_by");
                    $model = db_connect();
                    $booking = $model->table("mess_bookings mb");
                    $booking = $booking->join("messes m","m.id=mb.mess_id");
                    $booking = $booking->join("users u","u.id=mb.created_by");
                    $booking = $booking->select("mb.id,mb.mess_id,mb.mess_amount,mb.status,mb.payment_status,mb.documents,mb.screenshot,mb.created_at,m.name AS mess_name,u.name AS requested_by");
                    // $booking = $booking->where("mb.created_by",$this->userdata['id']);
                    $booking = $booking->whereIn("mb.mess_id",$ids);
                    $data["bookings"] = $booking->get()->getResultArray();
                }
                return view("admin/mess/my_booking",$data);
            } else {
                return redirect("/");
            }
        }

        public function watch_mess_docs()
        {
            $photos = [];
            $screenshot = "";

            $model = new Mess_booking;
            $photo = $model->select("documents,screenshot")->where("id",$this->request->getVar("booking_id"))->first();
            if($photo) {
                if($photo["documents"] != "") {
                    $photos = json_decode($photo["documents"],true);
                    foreach($photos as $key => $val) {
                        $photos[$key]["avatar"] = base_url("public/uploads/booking/".$val["avatar"]);
                    }
                }
                if($photo["screenshot"] != "") {
                    $screenshot = base_url("public/uploads/booking/screenshot/".$photo["screenshot"]);      
                }
            }
            echo json_encode(array("photos" => $photos,"screenshot" => $screenshot));
            exit;
        }

        public function approve_mess_request($id)
        {
            $model = new Mess_booking;
            $model->update($id,array("status" => 1));
            return redirect("my-mess-bookings");
        }

        public function reject_mess_request($id)
        {
            $model = new Mess_booking;
            $model->update($id,array("status" => 2));
            return redirect("my-mess-bookings");
        }

        public function mess_feedbacks()
        {
            if(isset($this->userdata['id'])){
                $model = new Mess;
                $mypgs = $model->select("id")->where("created_by",$this->userdata['id'])->get()->getResultArray();
                $ids = [];
                if($mypgs) {
                    foreach($mypgs as $val) {
                        $ids[] = $val["id"];
                    }
                } 
                $data["feedbacks"] = [];
                if(!empty($ids)) {
                    $model = db_connect();
                    $booking = $model->table("feedbacks f");
                    $booking = $booking->join("pgs p","p.id=f.pg_mess_id");
                    $booking = $booking->join("users u","u.id=f.created_by");
                    $booking = $booking->select("f.id,f.rate,f.comment,f.created_at,u.name AS commented_by");
                    $booking = $booking->whereIn("f.pg_mess_id",$ids);
                    $booking = $booking->where("f.feedback_type",2);
                    $data["feedbacks"] = $booking->get()->getResultArray();
                }
                return view("admin/mess/feedback",$data);
            } else {
                return redirect("/");
            }
        }
        
        public function messes_tiffin($id)
        {
            $session = session();
            
            $model = db_connect();
            $booking = $model->table("mess_bookings mb");
            $booking = $booking->join("users u","u.id=mb.created_by");
            $booking = $booking->select("u.id,u.name");
            $booking = $booking->where("mb.mess_id",$id);
            $data["students"] = $booking->get()->getResultArray();
            
            $model = db_connect();
            $entry = $model->table("mess_tiffins mt");
            $entry = $entry->join("users u","u.id=mt.student_id");
            $entry = $entry->select("mt.*,u.id,u.name");
            $entry = $entry->where("mt.mess_id",$id);
            $entry = $entry->orderBy("mt.id","desc");
            $data["entries"] = $entry->get()->getResultArray();
            
            $data["mess_id"] = $id;
            return view("admin/mess/tiffin_list",$data);
        }
        
        public function new_tiffin_entry()
        {
            $session = session();
            $post = $this->request->getVar();

            $insert_data = array(
                "mess_id" => $post["mess_id"],
                "student_id" => $post["student_id"],
                "date" => $post["date"],
                "amount" => $post["amount"],
                "total_tiffin" => $post["total_tiffin"],
                "created_by" => $session->get('userdata')["id"],
                "updated_by" => 0,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => date("Y-m-d H:i:s")
            );
            $model = new Tiffin;
            $model->insert($insert_data);

            return redirect("messes");
        }
    }