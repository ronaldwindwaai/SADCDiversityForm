<?php

namespace App\Http\Controllers;

use App\Committee;
use App\MemberParliament;
use App\PoliticalParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class MemberParliamentController extends Controller
{
    private $genders;
    private $reserved_political_position_descriptions;


    /**
     * MemberParliamentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->genders = ['Male','Female','Other'];
        $this->reserved_political_position_descriptions = ['Marginalized Community','Women Representation', 'Religious Representation','Youth Representation', 'Other'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if($mps =  MemberParliament::where('user_id','=', Auth::id())->get()){
            return view('mps.index')->with('mps',$mps);
        }
        return view('mps.index')->with('error','No Member of Parliament created.');
    }

    /**
     * @return mixed
     */
    public function create()
    {
        $political_parties = PoliticalParty::where('user_id','=', Auth::id())->get();
        $committees = Committee::where('user_id','=', Auth::id())->get();
        return view('mps.create')->with('genders',$this->genders)
            ->with('reserved_political_position_descriptions',$this->reserved_political_position_descriptions)
            ->with('political_parties',$political_parties)
            ->with('committees',$committees);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $mp = MemberParliament::findOrFail($id);

        if(Auth::user()->id !== $mp->user_id){

            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }
        return view('mp.edit')->with('Member of Parliament',$mp);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules());
        //->members()->create($request->all())
        $parliament = Auth::user()->parliaments()->where('user_id', '=', Auth::id())->first();

        $request->offsetSet('parliament_id', $parliament->id);
        $request->offsetSet('deputy_id', uniqid());

       // dd($request->all());
        if ($mp   =   Auth::user()->members()->create($request->all())){
            return redirect()->back()->with('success', 'Successfully added Member of Parliament record');
        }

        return redirect()->back()->withErrors(['message'=>'Error : Unable to create Member of Parliament record']);
    }


    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        $mp = MemberParliament::findOrFail($id);

        if(Auth::user()->id !== $mp->user_id){
            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }
        if ($mp->update($request->all())){
            return redirect()->back()->with('success', 'Successfully updated Member of Parliament record');
        }
        // $parliament = $user->parliaments()->create($request->all());

        return redirect()->back()->withErrors(['message'=>'Unable to update Member of Parliament record']);
        
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mp = MemberParliament::findOrFail($id);

        if(Auth::user()->id !== $mp->user_id){

            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }

        if($mp->delete()){
            return redirect()->back()->with('success', 'Successfully deleted Member of Parliament record');
        }
        
        return redirect()->back()->withErrors(['message'=>'Unable to delete Member of Parliament record']);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @return array
     */
    protected function rules()
    {

        return [
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:80',
            'gender' => 'required|string|max:10',
            'erpp' => 'required|string|max:80',
            'eppd' => 'required|string|max:80',
            'political_party_id' => 'required',
        ];
    }
}