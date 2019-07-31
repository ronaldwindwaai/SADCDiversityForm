<?php

namespace App\Http\Controllers;

use App\Committee;
use App\Parliament;
use App\PoliticalParty;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FormWizardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     */
    public function wizard(Request $request)
    {
        $this->validate($request, $this->rules());

        $user_id = Auth::id();

        $parliament = new Parliament;

        $parliament->user_id =  $user_id;
        $parliament->name = $request->parliament_name;
        $parliament->country = $request->country;
        $parliament->parliament_type = $request->parliament_type;
        $parliament->date_of_inaguration = $request->date_of_inaguration;
        $parliament->end_of_term = $request->end_of_term;

        $parliament->save();

        $committee = new Committee();

        $committee->user_id =  $user_id;
        $committee->parliaments_id =  $parliament->id;
        $committee->name = $request->committee_name;

        $committee->save();

        $political_party = new PoliticalParty();

        $political_party->user_id =  $user_id;
        $political_party->parliament_id =  $parliament->id;
        $political_party->name = $request->parliament_party_name;
        $political_party->political_designation = $request->political_designation;

        $political_party->save();

        $this->update_user();

        return redirect()->back()->with('success', 'Successfully added');
    }
    protected function store_parliament()
    {

    }
    protected function store_committee()
    {

    }
    protected function store_political_party()
    {

    }

    protected function update_user()
    {
        $user = User::find(Auth::id());

        $user->new_account = false;

        $user->save();
    }
    protected function rules()
    {

        return [
            'parliament_name' => 'required|string',
            'country' => 'required|string',
            'parliament_type' => 'required|string',
            'date_of_inaguration' => 'required|date',
            'end_of_term' => 'required|date',
            'parliament_party_name' => 'required',
        ];
    }
}
