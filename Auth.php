<?php
    namespace App\Controllers;

    use App\Models\User;

    class Auth extends BaseController
    {
        protected $helpers = ["custom"];



        public function index(): string
        {
            $data["page_title"] = "Super Admin Portal";
            $data["role"] = 1;
            return view('auth/landing',$data);
        }

        public function admin(): string
        {
            $data["page_title"] = "Super Admin Portal";
            $data["role"] = 1;
            return view('auth/sign_in',$data);
        }

        public function pg_sign_in(): string
        {
            $data["page_title"] = "PG Portal";
            $data["role"] = 2;
            return view('auth/sign_in',$data);
        }

        public function mess_sign_in(): string
        {
            $data["page_title"] = "Mess Portal";
            $data["role"] = 3;
            return view('auth/sign_in',$data);
        }

        public function student_sign_in(): string
        {
            $data["page_title"] = "Student Portal";
            $data["role"] = 4;
            return view('auth/sign_in',$data);
        }

        public function sign_up($role = "")
        {
            if($role == 2) {
                $data["page_title"] = "PG Portal";
                $data["role"] = 2;
                return view('auth/sign_up',$data);
            } else if($role == 3) {
                $data["page_title"] = "Mess Portal";
                $data["role"] = 3;
                return view('auth/sign_up',$data);
            } else if($role == 4) {
                $data["page_title"] = "Student Portal";
                $data["role"] = 4;
                return view('auth/sign_up',$data);
            }
        }
        
        public function forget_password()
        {
            $session = session();
            $post = $this->request->getVar();
            if(isset($post["submit"])) {
                $model = new User;
                $email = $model->select("id,name,email")->where("email",$post["email"])->first();
                if($email) {
                    $data["otp"] = rand(1000,9999);    
                    $data["to"] = $email["email"];    
                    $data["username"] = $email["name"];    
                    
                    $model->update($email["id"],array("otp" => $data["otp"]));
                    return view('send_email',$data);
                    
                } else {
                    $session->setFlashData('error','Email not found.');
                    return redirect("forget-password");    
                }
            }
            $data["page_title"] = "Forget Password";
            return view('auth/forget_password',$data);
        }
        
        public function reset_password()
        {
            $session = session();
            $post = $this->request->getVar();
            if(isset($post["submit"])) {
                $model = new User;
                $email = $model->select("id,name,email,otp")->where("otp",$post["otp"])->first();
                if($email) {
                    $model->update($email["id"],array("otp" => 0,"password" => md5($post["password"])));
                    
                    $session->setFlashData('error','Password changed successfully.');
                    return redirect("/");  
                } else {
                    $session->setFlashData('error','OTP does not match.');
                    return redirect("reset-password");    
                }
            }
            $data["page_title"] = "Reset Password";
            return view('auth/reset_password',$data);
        }

        public function submitSignIn()
        {
            $session = session();
            $post = $this->request->getVar();
            
            $model = new User;
            $row = $model->where('email',$post['email'])->where('password',md5($post['password']))->where("role",$post["role"])->first();
            if($row) {
                if($row['is_active'] == 1) {
                    $session->set('userdata',$row);
                    return redirect('dashboard');
                } else {
                    $session->setFlashData('error','Your account has been deactived by admin.');
                    return redirect("/");    
                }
            } else {
                $session->setFlashData('error','Email or password is incorrect.');
                return redirect("/");
            }
        }

        public function submitSignUp()
        {
            $session = session();
            $post = $this->request->getVar();

            $model = new User;
            $email = $model->where('email',$post["email"])->get()->getResultArray();
            $uname = $model->where('name',$post["name"])->get()->getResultArray();
            if(count($email) == 0 && count($uname) == 0) {
                $insert_data = array(
                    "name" => $post["name"],
                    "email" => $post["email"],
                    "phone" => $post["phone"],
                    "password" => md5($post["password"]),
                    "role" => $post["role"],
                    "created_at" => date("Y-m-d H:i:s"),
                    "updated_at" => date("Y-m-d H:i:s"),
                );
                $model->insert($insert_data);

                $session->setFlashData('error','Your account has been created successfully.');
                if($post["role"] == 2) {
                    return redirect("pg-sign-in");
                } else if($post["role"] == 3) {
                    return redirect("mess-sign-in");
                } else {
                    return redirect("student-sign-in");
                }
            } else if(count($email) == 1 && count($uname) == 0) {
                $session->setFlashData('error','Email already exist.');
                if($post["role"] == 2) {
                    return redirect("pg-sign-in");
                } else if($post["role"] == 3) {
                    return redirect("mess-sign-in");
                } else {
                    return redirect("student-sign-in");
                }
            } else if(count($email) == 0 && count($uname) == 1) {
                $session->setFlashData('error','Name already exist.');
                if($post["role"] == 2) {
                    return redirect("pg-sign-in");
                } else if($post["role"] == 3) {
                    return redirect("mess-sign-in");
                } else {
                    return redirect("student-sign-in");
                }
            } else {
                $session->setFlashData('error','Name & Email are already exist.');
                if($post["role"] == 2) {
                    return redirect("pg-sign-in");
                } else if($post["role"] == 3) {
                    return redirect("mess-sign-in");
                } else {
                    return redirect("student-sign-in");
                }
            }
        }

        public function logout()
        {
            $session = session();
            $userdata = $session->get("userdata");

            return redirect('/');
            // $session->destroy();
            // if($userdata['role'] == 1) {
            //     return redirect('sign-in');   
            // } else if($userdata['role'] == 2) {
            //     return redirect('pg-sign-in');   
            // } else if($userdata['role'] == 3) {
            //     return redirect('mess-sign-in');   
            // } else {
            //     return redirect('student-sign-in');   
            // }
        }
    }
