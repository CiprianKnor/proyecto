<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Reply;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiscussionRequest;
use DB;
use Auth;
use Exception;

class DiscussionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified'])->only(['create', 'store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$discussions = $query->filterByChannels()->paginate(15);
        $title = $request->title;
        if ($title) {
            $query = Discussion::query();
            $query->where('title', 'like', "%$title%");
            $discussions2 = $query->paginate(16);
            return view('discussions.index', [
                'discussions' => $discussions2
            ]);
        } else {
            $query = Discussion::query();
            $query->orderBy('created_at', 'desc')->get();
            $discussions = $query->filterByChannels()->paginate(16);
        }
        return view('discussions.index', [
            'discussions' => $discussions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionRequest $request)
    {
        //dd("ok")

        if ($request->hasFile('image')) {
            $file = $request->file('image')->getClientOriginalName();
            $files = $request->file('image');
            $name = $files->getClientOriginalName();
            $path = public_path() . '/storage';
            $files->move($path, $name);

            $name = $request->file('image')->getClientOriginalName();

            auth()->user()->discussions()->create([
                'title' => $request->title,
                'content' => $request->content,
                'channel_id' => $request->channel,
                'slug' => str_slug($request->title),
                'url' => $file
            ]);
        } else {
            auth()->user()->discussions()->create([
                'title' => $request->title,
                'content' => $request->content,
                'channel_id' => $request->channel,
                'slug' => str_slug($request->title),
            ]);
        }


        session()->flash('success', 'Discusion posted.');

        return redirect()->route('discussions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        $user = Auth::user();
        return view('discussions.show', [
            'discussion' => $discussion, 'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discussion = Discussion::find($id);

        return view('discussions.edit', ['discussion' => $discussion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        try {
            $discussion = Discussion::find($id);
            $discussion->update($request->all());
            return redirect('discussions');
        } catch (Exception $e) {
            return back()->with('error', 'No se puede poner el titulo de una publicacion existente');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Discussion::findOrFail($id)->delete();
        return redirect('discussions');
    }

    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);

        session()->flash('success', 'Marked as best reply.');

        return redirect()->back();
    }
}
