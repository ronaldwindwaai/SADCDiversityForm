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
    private $member_of_parliaments;
    private $political_parties;
    private $committees;


    /**
     * MemberParliamentController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->genders = ['Male', 'Female', 'Other'];
        $this->reserved_political_position_descriptions = ['Marginalized Community', 'Women Representation', 'Religious Representation', 'Youth Representation', 'Other'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        if ($this->are_you_a_super_admin()) {
            $this->member_of_parliaments = MemberParliament::with('parliament')->get();
        } else {
            $this->member_of_parliaments = MemberParliament::with('politicalParty')->where('user_id', '=', Auth::id())->get();
        }

        if ($this->member_of_parliaments) {
            return view('mps.index')->with('mps', $this->member_of_parliaments)->with('admin', $this->are_you_a_super_admin());
        }
        return view('mps.index')->with('error', 'No Member of Parliament created.');
    }

    /**
     * @return mixed
     */
    public function create()
    {

        if ($this->are_you_a_super_admin()) {
            $this->political_parties = PoliticalParty::all();
            $this->committees = Committee::all();
        } else {
            $this->political_parties = PoliticalParty::where('user_id', '=', Auth::id())->get();
            $this->committees = Committee::where('user_id', '=', Auth::id())->get();
        }

        return view('mps.create')->with('genders', $this->genders)
            ->with('reserved_political_position_descriptions', $this->reserved_political_position_descriptions)
            ->with('political_parties', $this->political_parties)
            ->with('committees', $this->committees);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $mp = MemberParliament::findOrFail($id);
        if ($this->are_you_a_super_admin()) {
            $this->political_parties = PoliticalParty::all();
            $this->committees = Committee::all();
        } else {
            $this->political_parties = PoliticalParty::where('user_id', '=', Auth::id())->get();
            $this->committees = Committee::where('user_id', '=', Auth::id())->get();
        }

        if (Auth::user()->id !== $mp->user_id && !$this->are_you_a_super_admin()) {

            return response()->view('errors.404', 'Permission Denied', Response::HTTP_UNAUTHORIZED);
        }
        return view('mps.edit')->with('Member of Parliament', $mp)->with('mp', $mp)
            ->with('genders', $this->genders)
            ->with('reserved_political_position_descriptions', $this->reserved_political_position_descriptions)
            ->with('political_parties', $this->political_parties)
            ->with('committees', $this->committees);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if (!$this->are_you_a_super_admin()) {
            if ($this->validate($request, $this->rules())) {
                //->members()->create($request->all())
                if($parliament = Auth::user()->parliaments()->where('user_id', '=', Auth::id())->first()){
                    $request->offsetSet('user_id', Auth::id());
                    //dd($parliament )
                      //dd($request->all());
                    if ($mp = $parliament->members()->create($request->all())) {
                        return redirect()->back()->with('success', 'Successfully added Member of Parliament record');
                    }
                    return redirect()->back()->withErrors(['message' => 'General Error : Unable to create Member of Parliament']);
                }
                return redirect()->back()->withErrors(['message' => 'Error : Unable to create Member of Parliament record']);
            }
        }
        return redirect()->back()->withErrors(['message' => 'Error : Unable to create Member of Parliament record or you are a Super Admin']);
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

        if (Auth::user()->id !== $mp->user_id && !$this->are_you_a_super_admin()) {
            return response()->view('errors.404', 'Permission Denied', Response::HTTP_UNAUTHORIZED);
        }
        if ($mp->update($request->all())) {
            return redirect()->back()->with('success', 'Successfully updated Member of Parliament record');
        }
        // $parliament = $user->parliaments()->create($request->all());

        return redirect()->back()->withErrors(['message' => 'Unable to update Member of Parliament record']);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mp = MemberParliament::findOrFail($id);

        if (Auth::user()->id !== $mp->user_id && !$this->are_you_a_super_admin()) {

            return response()->view('errors.404', 'Permission Denied', Response::HTTP_UNAUTHORIZED);
        }

        if ($mp->delete()) {
            return redirect()->back()->with('success', 'Successfully deleted Member of Parliament record');
        }

        return redirect()->back()->withErrors(['message' => 'Unable to delete Member of Parliament record']);
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
            'political_party_id' => 'required',
        ];
    }
}