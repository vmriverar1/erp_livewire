<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use HasFactory;
    protected $fillable = ['name','address','phone','taxpayer_id'];
}
