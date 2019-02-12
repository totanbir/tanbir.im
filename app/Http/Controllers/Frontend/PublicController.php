<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tag;
use App\Blog;
use App\Blog_tag;
use DB;
use Session;
use Purifier;
use Image;
use Cache;

class PublicController extends Controller
{
    public function contact()
    {
    	return view('fontend.contact', [
    		'siteTitle' => 'contact',
    		'SiteData' => 'contact'
    		]);
    }
}
