<?php

namespace App\Http\Controllers;

use App\Parliament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ParliamentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $countries;
    private $types_of_parliaments;

    public function __construct()
    {
        $this->middleware('auth');
        $this->countries = ['Angola','Botswana','Democratic Republic of Congo','Eswatini','Lesotho','Malawi',
                            'Mozambique','Mauritius','Namibia','Seychelles','South Africa','Tanzania','Zambia','Zimbabwe',];
        $this->types_of_parliaments = ['Lower House','Upper House','Unicameral','Other'];
    }

    /**
     * Fetch the all parliaments
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($parliaments = Auth::user()->parliaments()->get()){
            return view('parliament.index')->with('parliaments',$parliaments);
        }
        return view('parliament.index')->with('error','No Parliament created.');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parliament.create')
            ->with('countries',$this->countries)
            ->with('types_of_parliaments',$this->types_of_parliaments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Translator  $translator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $parliament = Parliament::findOrFail($id);

        if(Auth::user()->id !== $parliament->user_id){

            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }
        return view('parliament.edit')->with('parliament',$parliament)->with('countries',$this->countries)->
        with('types_of_parliaments',$this->types_of_parliaments);
    }
    /**
     * Fetch the all parliaments
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, $this->rules());

        $request->offsetSet('user_id',Auth::id());

        if($parliament   =   Auth::user()->parliaments()->create($request->all())){
            return redirect()->back()->with('success', 'Successfully added Parliament Record');
        }

        return redirect()->back()->withErrors(['message'=>'Error : Unable to create Parliament Record']);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        $parliament = Parliament::findOrFail($id);

        if(Auth::user()->id !== $parliament->user_id){
            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }

        if($parliament->update($request->all())){
            return redirect()->back()->with('success', 'Successfully updated Parliament Record');
        }
        return redirect()->back()->withErrors(['message'=>'Unable to update Parliament Record']);

    }

    public function destroy(Request $request, $id)
    {
        $parliament = Parliament::findOrFail($id);

        if(Auth::user()->id !== $parliament->user_id){
            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }

        if ($parliament->delete()){
            return redirect()->back()->with('success', 'Successfully deleted Parliament Record');
        }
        return redirect()->back()->withErrors(['message'=>'Unable to delete Parliament Record']);

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
            'country' => 'required|string|max:80',
            'date_of_inaguration' => 'required|date',
            'end_of_term' => 'required|date',
        ];
    }

}