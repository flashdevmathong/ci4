<?php
namespace App\Models;
use CodeIgniter\Model;

class USerModel extends Model{
    protected $table = 'snpuser';
    protected $primaryKey = 'mid';
    protected $allowedFields = ['name','surname','musername','mpassword','tel','email','dep','mlevel','picture'];

}