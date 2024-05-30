<?php
    namespace App\Controllers;

    use App\Models\Banner;
    use App\Models\Couple;
    use App\Models\Story;
    use App\Models\Host;
    use App\Models\Event;
    use App\Models\Photo;
    use App\Models\Member;

    class Home extends BaseController
    {
        protected $helpers = ["custom"];

        public function index(): string
        {
            $model = new Banner;
            $data["banners"] = $model->get()->getResultArray();

            $model = new Couple;
            $data["couples"] = $model->get()->getResultArray();

            return view('home',$data);
        }

        public function story()
        {
            $model = new Story;
            $data["stories"] = $model->get()->getResultArray();

            return view('story',$data);
        }

        public function hosts()
        {
            $model = new Host;
            $data["hosts"] = $model->orderBy('id','ASC')->get()->getResultArray();

            return view('hosts',$data);
        }

        public function events()
        {
            $model = new Event;
            $data["events"] = $model->orderBy('id','ASC')->get()->getResultArray();

            return view('events',$data);
        }

        public function photos()
        {
            $model = new Photo;
            $data["photos"] = $model->orderBy('id','ASC')->get()->getResultArray();

            return view('photos',$data);
        }

        public function members()
        {
            $model = new Member;
            $data["members"] = $model->where('parent_id',0)->orderBy('id','ASC')->get()->getResultArray();

            return view('members',$data);
        }

        public function member($id)
        {
            $model = new Member;
            $data["members"] = $model->where('parent_id',$id)->orderBy('id','ASC')->get()->getResultArray();
            $data["parent_id"] = $id;

            return view('members',$data);
        }
    }
