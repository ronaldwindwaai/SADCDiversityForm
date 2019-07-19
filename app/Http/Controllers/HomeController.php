<?php

namespace App\Http\Controllers;

use App\Committee;
use App\MemberParliament;
use App\PoliticalParty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $countries;
    private $types_of_parliaments;
    private $genders;
    private $reserved_political_position_descriptions;
    private $political_designations;
    private $are_you_a_super_admin;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        $this->genders = ['Male','Female','Other'];

        $this->reserved_political_position_descriptions = ['Marginalized Community','Women Representation', 'Religious Representation','Youth Representation', 'Other'];
        $this->countries = ['Angola','Botswana','Democratic Republic of Congo','Eswatini','Lesotho','Malawi',
            'Mozambique','Mauritius','Namibia','Seychelles','South Africa','Tanzania','Zambia','Zimbabwe',];
        $this->types_of_parliaments = ['unicameral','bicameral'];
        $this->political_designations = ['Government', 'Opposition'];




    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->are_you_a_super_admin = Auth::user()->hasRole('super-admin');

        if($this->are_you_a_super_admin){
            return view('home');
        }

        if(Auth::user()->new_account != true){
            if($mps =  MemberParliament::where('user_id','=', Auth::id())->get()){
                return view('mps.index')->with('mps',$mps);
            }
        }

        $political_parties = PoliticalParty::where('user_id','=', Auth::id())->get();
        $committees = Committee::where('user_id','=', Auth::id())->get();

        return view('form-wizard')->with('genders',$this->genders)
            ->with('reserved_political_position_descriptions',$this->reserved_political_position_descriptions)
            ->with('political_parties',$political_parties)
            ->with('committees',$committees)
            ->with('countries',$this->countries)
            ->with('types_of_parliaments',$this->types_of_parliaments)
            ->with('political_designations',$this->political_designations)
            ->with('no_ide_bar',true);

    }
}
