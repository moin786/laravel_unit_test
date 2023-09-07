<?php

namespace Peal\CorePackages\Suppliers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name','mobile','email','address','landphone','contact_person','contact_person_mobile','contact_person_email'];
}
