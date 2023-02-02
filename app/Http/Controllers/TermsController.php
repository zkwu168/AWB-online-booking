<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function freightTerms()
    {
        return view('terms.freightTerms');
    }

    public function itemTerms()
    {
        return view('terms.itemTerms');
    }

    public function guide()
    {
       
        if (app()->getLocale()=="en")
        {
            return view('frontend.pages.guide');
        }
        else
        {
            return view('frontend.pages.guide_cn');
        }

    
    
    }
}
