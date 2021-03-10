<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	use HasFactory;
	
	protected $table = 'contents';
	protected $primaryKey = '_id';
	public $timestamps = false;
	
	public function tree()
	{
		$create = $this->orderBy('_order', 'asc')->get();
		//传参
		return $this->getTree($create, '_type', '_pid', '_id', '0');
	}
	
	public function getTree($data, $file_type, $filed_pid, $filed_id, $pid)
	{
		$arr = array();
		//遍历数据并排序
		foreach ($data as $k => $v) {
			if ($v->$filed_pid == $pid) {
				$arr[] = $data[$k];
				foreach ($data as $m => $n) {
					if ($n->$filed_pid == $v->$filed_id) {
						$data[$m][$file_type] = '\\' . $data[$m][$file_type];
						$arr[] = $data[$m];
					}
					
				}
			}
		}
		return $arr;
	}
	
}
