<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portf;
use App\Http\Requests\StorePortfRequest;
use App\Http\Requests\UpdatePortfRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portf = Portf::all();
        return view('admin.portfo.index', compact('portf'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.portfo.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePortfRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePortfRequest $request)
    {
        $data = $request->validated();
        $portf = new Portf();
        $portf->fill($data);
        if (isset($data['image'])) {
            $portf->image = Storage::put('uploads', $data['image']);
        }


        $portf->slug = Str::slug($data['repo_title'], '-');
        $portf->save();

        return redirect()->route('admin.dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portf  $portf
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $portfo = Portf::where('slug', $slug)->first();
        return view('admin.portfo.show', compact('portfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portf  $portf
     * @return \Illuminate\Http\Response
     */
    public function edit(Portf $portf)
    {

        return view('admin.portfo.edit', compact('portf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePortfRequest  $request
     * @param  \App\Models\Portf  $portf
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePortfRequest $request, Portf $portf)
    {
        $data = $request->validated();
        $portf->slug = Str::slug($data['repo_title'], '-');

        if (empty($data['set_image'])) {

            if ($portf->image) {
                Storage::delete($portf->image);
                $portf->image = null;
            }
        } else {
            if (isset($data['image'])) {

                if ($portf->image) {
                    Storage::delete($portf->image);
                }

                $portf->image = Storage::put('uploads', $data['image']);
            }
        }
        $portf->update($data);
        return redirect()->route('admin.dashboard', $portf);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portf  $portf
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portf $portf)
    {
        if ($portf->image) {
            Storage::delete($portf->image);
        }
        $portf->delete();
        return to_route('admin.dashboard');
    }
}
