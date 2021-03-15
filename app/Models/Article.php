<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	use HasFactory;
	
	static $unguarded = true;
	public $timestamps = false;
	protected $table = 'article';
	protected $primaryKey = 'art_id';
	
	public function getList()
	{
		$arts = $this->orderBy('art_id', 'desc');
		return $arts;
	}
}
