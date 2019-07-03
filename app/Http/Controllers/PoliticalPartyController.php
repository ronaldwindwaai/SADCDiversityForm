<?php

namespace App\Http\Controllers;

use App\PoliticalParty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PoliticalPartyController extends Controller
{
    private $political_designations;

    public function __construct()
    {
        $this->middleware('auth');
        $this->political_designations = ['Government', 'Opposition'];
    }


    public function index()
    {
        if($parties = PoliticalParty::where('user_id','=', Auth::id())->get()){
            return view('political_party.index')->with('politcal_parties',$parties);
        }
        return view('political_party.index')->with('error','No Parliament created.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('political_party.create')->with('political_designations',$this->political_designations);
    }


    public function edit($id)
    {
        $politicalParty = PoliticalParty::findOrFail($id);

        if(Auth::user()->id !== $politicalParty->user_id){

            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }
        return view('political_party.edit')->with('political_party',$politicalParty)->with('political_designations',$this->political_designations);
    }


    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $request->offsetSet('user_id',Auth::id());

        if($politicalParty = Auth::user()->parliaments()->where('user_id','=', Auth::id())->first()->politicalParties()->create($request->all())){
            return redirect()->back()->with('success', 'Successfully added Political Party Record');
        }

        return redirect()->back()->withErrors(['message'=>'Error : Unable to create Political Party Record']);

    }


    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        $politicalParty = PoliticalParty::findOrFail($id);
        if(Auth::user()->id !== $politicalParty->user_id){
            return response()->json('Permission Denied',Response::HTTP_UNAUTHORIZED);
        }

        if($politicalParty->update($request->all())){
            return redirect()->back()->with('success', 'Successfully updated Political Party Record');
        }
        return redirect()->back()->withErrors(['message'=>'Unable to update Political Party Record']);
    }

    public function destroy(Request $request, $id)
    {
        $politicalParty = PoliticalParty::findOrFail($id);

        if(Auth::user()->id !== $politicalParty->user_id){

            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }

        if ($politicalParty->delete()){
            return redirect()->back()->with('success', 'Successfully deleted Political Party Record');
        }
        return redirect()->back()->withErrors(['message'=>'Unable to delete Political Party Record']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'name' => 'required|string|max:80',
            'political_designation' => 'required|string|max:80',
        ];
    }
}