<?php
    namespace App\Controllers;

    use App\Models\User;

    class Users extends BaseController
    {
        protected $helpers = ["custom"];

        public function index(): string
        {
            $session = session();
            if($session->get("userdata")){
                $model = new User;
                $data["users"] = $model->where('role !=',1)->orderBy('id',"desc")->get()->getResultArray();

                return view("admin/user/list",$data);
            } else {
                return redirect("/");
            }
        }

        public function new()
        {
            $session = session();
            if($session->get("userdata")){
                $data["state"] = array();

                $model = new Country;
                $data["countries"] = $model->orderBy('name','asc')->get()->getResultArray();

                return view("admin/state/add_edit",$data);
            } else {
                return redirect("/");
            }
        }

        public function create()
        {
            $session = session();

            $post = $this->request->getVar();
            $insert_data = array(
                'name' => $post['name'],
                'country_id' => $post['country_id'],
                'is_active' => $post['is_active'],
                'created_by' => $session->get('userdata')['id'],
                'updated_by' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => "0000-00-00 00:00:00"
            );
            $model = new State;
            $model->insert($insert_data);

            return redirect('states');
        }

        public function edit($id)
        {
            $session = session();
            if($session->get("userdata")){
                $model = new User;
                $data["user"] = $model->where('id',$id)->first();
                if($data["user"]) {
                    return view("admin/user/add_edit",$data);
                }
            } else {
                return redirect("/");
            }
        }

        public function update($id)
        {
            $session = session();

            $post = $this->request->getVar();
            $update_data = array(
                'name' => $post['name'],
                'phone' => $post['phone'],
                'email' => $post['email'],
                'is_active' => $post['is_active'],
                'updated_at' => date('Y-m-d H:i:s')
            );
            $model = new User;
            $model->update($id,$update_data);

            return redirect('users');
        }

        public function show($id)
        {
            $model = new State;
            if($model->where('id',$id)->delete()) {
                return redirect('users');
            }
        }
    }