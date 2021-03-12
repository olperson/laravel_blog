<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
	
	
	/*
	 * 两种请求方法https://e.g./img?type={img,json}
	 */
	public function imgs(Request $request)
	{
		
		$str = explode("\n", file_get_contents('sinetxt.txt', FILE_USE_INCLUDE_PATH));
		$k = rand(0, count($str));
		$sina_img = $this->str_re($str[$k]);
		$size_arr = array('large', 'mw1024', 'mw690', 'bmiddle', 'small', 'thumb180', 'thumbnail', 'square');
		$size = !empty($_GET['size']) ? $_GET['size'] : 'large';
		$server = rand(1, 4);
		if (!in_array($size, $size_arr)) {
			$size = 'large';
		}
		$url = 'https://wx' . $server . '.sinaimg.cn/' . $size . '/' . $sina_img . '.jpg';
		$result = array("code" => "200", "acgurl" => "$url");
		//Type Choose参数代码
		$type = $request->get('type');
//		dd($type);
		//格式解析
		switch ($type) {
			
			case 'json':
				$path = "$url";
				$pathinfo = pathinfo($path);
				$imageInfo = getimagesize($url);
				$result['width'] = "$imageInfo[0]";
				$result['height'] = "$imageInfo[1]";
				$result['size'] = "$pathinfo[extension]";
				header('Content-type:text/json');
				echo json_encode($result);
				break;
			
			case 'img':
				$img = file_get_contents($url, true);
				header("Content-Type: image/jpeg;");
				echo $img;
				break;
			
			default:
				return view('agcimages');
		}
		
	}
	
	function str_re($str)
	{
		$str = str_replace(' ', "", $str);
		$str = str_replace("\n", "", $str);
		$str = str_replace("\t", "", $str);
		$str = str_replace("\r", "", $str);
		return $str;
	}
	
	
}
