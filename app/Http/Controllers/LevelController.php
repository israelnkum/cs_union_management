<?php

namespace App\Http\Controllers;

use App\Eligible;
use App\Level;
use App\Souvenir;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @param Request $request
     * @return void
     */
    public function create($id , Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $level = new Level();

        $checkLevel = Level::where('name',strtoupper($request->input('levelName')))
            ->get()->count();

        if ($checkLevel>0){
            return redirect('/preferences')->with('error','Class already exist');
        }else{
            $level->name= strtoupper($request->input('levelName'));
            $level->duesAmount= $request->input('duesAmount');
            $level->souvenirAmount= $request->input('souvenirAmount');
            $level->save();


            //add level to eligible
            if ($request->has('souvenirs')){
                $souvenirs = $request->input('souvenirs');
                foreach ($souvenirs as $souvenir) {
                    $eligible = new Eligible();
                    $eligible->level_id = $level->id;
                    $eligible->souvenir_id = substr($souvenir, 0, strpos($souvenir, ","));
                    $eligible->souvenir_name = substr($souvenir, strpos($souvenir, ",") + 1);
                    $eligible->save();
                }

            }

            toastr()->success($level->name.'  added Successfully');
            return redirect('/preferences');
        }
    }


    /*
     * Bulk delete level
     */
    public function  bulkDelete(Request $request){

        $selected_id = $request->input('selected_id');


        foreach ($selected_id as $value){
            $level = Level::find($value);
            $level->delete();
        }

        toastr()->success('success');
        return redirect('/preferences');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        //return $request;

        $level = Level::find($id);

        $level->name= strtoupper($request->input('levelName'));
        $level->duesAmount= $request->input('duesAmount');
        $level->souvenirAmount= $request->input('souvenirAmount');
        $level->save();


        if ($request->has('souvenirs')){
            $souvenirs = $request->input('souvenirs');
            $eligibles = Eligible::all()->where('level_id',$id);

            $allEligible=[];
            foreach ($eligibles as $eligible => $item) {
                array_push($allEligible,$item->souvenir_id);
            }
            $deleteEligibles =array_diff($allEligible,$souvenirs);


           // return $allEligible;
            foreach ($deleteEligibles as $difference){
                Eligible::where('level_id',$id)->where('souvenir_id',$difference)->delete();

            }

            $insertEligibles =array_diff($souvenirs,$allEligible);

            foreach ($insertEligibles as $insertEligible){
                $souvenir = Souvenir::where('id',$insertEligible)->get();

                $newEligible = new Eligible();

                $newEligible->level_id = $id;
                $newEligible->souvenir_id = $souvenir[0]->id;
                $newEligible->souvenir_name = $souvenir[0]->name;

                $newEligible->save();
            }
        }else{
            Eligible::where('level_id',$id)->delete();
        }


        toastr()->success($level->name.'  updated Successfully');
        return redirect('/preferences');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        if ($level->delete()){
            toastr()->success($level->name.'  Deleted Successfully');
            return redirect('/preferences');

        }

    }
}
