<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model{


	protected $table="absensi_users";
	protected $primaryKey = "id";
	public $timestamps = false;

}