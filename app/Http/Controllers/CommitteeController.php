<?php

namespace App\Http\Controllers;

use App\Committee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use Symfony\Component\HttpFoundation\Response;

class CommitteeController extends Controller
{
    private $message;

    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        try {
            if ($committees = Auth::user()->parliaments()->where('user_id', '=', Auth::id())->first()->committees()->get()) {
                return view('committee.index')->with('committees', $committees);
            }
        } catch (\Exception $e) {
            return view('committee.index')->with('error', $e);
        } catch (\Throwable $e) {
            $e = new FatalThrowableError($x);
            return view('committee.index')->with('error', $e);
        }

        return view('committee.index')->with('error', 'No committees created.');


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('committee.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Translator $translator
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $committee = Committee::findOrFail($id);

        if (Auth::user()->id !== $committee->user_id) {

            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }
        return view('committee.edit')->with('committee', $committee);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        $request->offsetSet('user_id', Auth::id());

        if ($committee = Auth::user()->parliaments()->where('user_id', '=', Auth::id())->first()->committees()->create($request->all())) {
            return redirect()->back()->with('success', 'Successfully added committee record');
        }

        return redirect()->back()->withErrors(['message' => 'Error : Unable to create committee record']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules());

        $committee = Committee::findOrFail($id);

        if (Auth::user()->id !== $committee->user_id) {
            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }

        if ($committee->update($request->all())) {
            return redirect()->back()->with('success', 'Successfully updated committee record');
        }
        return redirect()->back()->withErrors(['message' => 'Unable to update committee record']);
    }

    public function destroy(Request $request, $id)
    {
        $committee = Committee::findOrFail($id);

        if (Auth::user()->id !== $committee->user_id) {
            return response()->view('errors.404', 'Permission Denied', HTTP_UNAUTHORIZED);
        }

        if ($committee->delete()) {
            return redirect()->back()->with('success', 'Successfully deleted committee record');
        }
        return redirect()->back()->withErrors(['message' => 'Unable to delete committee record']);
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
        ];
    }
}