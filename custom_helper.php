<?php 
	use App\Models\Setting;

	function setting($key)
	{
		$model = new Setting;
		$row = $model->select("setting_val")->where("setting_key",$key)->first();
		return $row["setting_val"];
	}

	function preview($data)
	{
		echo "<pre>";
		print_r ($data);
		exit;
	}