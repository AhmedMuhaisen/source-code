<?php

namespace Modules\Petcare\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Modules\Petcare\Entities\Skill;

use App\Http\Controllers\Controller;
use Modules\Petcare\Entities\Trainer;
use Illuminate\Support\Facades\Validator;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers=Trainer::get();
        return view('petcare::trainer.index')->with('trainers',$trainers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $skills= Skill::get();
        return view('petcare::trainer.create')->with('skills',$skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
     $days=array_keys($request->day);

      // foreach($days as $day){
      //   $count=count($request->day[$day]);
      //   for ($i=0; $i <$count ; $i++) { 
      //      dump($request->day[$day][$i]["from"]);
      //  $rules["day[$day][$i][from]"] =['time','required']; // Adjust the validation rules as needed
      //  $rules["day[$day][$i][to]"] =['time','required',"after:day[$day][$i][from]"] ;// Adjust the validation rules as needed
      // //  
      //   }
      // }
   
      
  $rules=array_merge([],[
        'name'=>'required |max:100',
        'email'=>'required | email |max:100 |unique:users',
        'phone'=>'required |max:15 |min:7',
        'country'=>'required |max:100',
        'state'=>'required |max:100',
        'city'=>'required |max:100',
        'address'=>'required |max:100',
        'postal_code'=>'required |max:100',
        'skills'=>'required |max:100',
        'expirinace'=>'required |max:100',
        'password'=>'required|min:6|confirmed |max:100',
        'description'=>'required |max:200',
        'image'=>'required |image |mimes:jpg,png',
        
        // 'day.*.*.to' => 'required|date_format:H:i',

      ]);
       $request->validate($rules);
      $name_image=$request->file('image')->storePublicly('upload/trainer','public');
 
      foreach($request->day as $day=>$intervals){
          $hour_work[]=['day'=>$day,'intervals'=>[$intervals]];
      }
// dd(json_encode($hour_work));
 
     $user= User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'type'=>'trainer',
        'country'=>$request->country,
        'state'=>$request->state,
        'city'=>$request->city,
        'address'=>$request->address,
        'password'=>bcrypt($request->password),
      ]);     
      Trainer::create([
        'user_id'=>$user->id,
        'zip_code'=>$request->postal_code,
        'image'=>$name_image,
        'skills'=>json_encode($request->skills),
        'year_of_experience'=>$request->expirinace,
        'description'=>$request->description,
        'code'=>$request->code,
        'hour_work'=>json_encode($hour_work)
      ]);
      return redirect()->route('trainer.index');
    }



    function chick_time(request $request ,$day,$index){
      $request->validate([
        'day.*.*.from' => 'required|date_format:H:i',
        'day.*.*.to' => 'required|date_format:H:i',
      ]);
    //   $validator = Validator::make($request->all(), [
    //     'date1' => 'required|date|date_after:date2',
    // ]);

    // if ($validator->fails()) {
    //     return response()->json(['errors' => $validator->errors()], 422);
    // }

    // Validation passed, continue with your logic here
    // ...

    // return response()->json(['message' => 'Dates are valid'], 200);

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
      
      $skills= Skill::get();
      $trainer =Trainer::find($id);
      return view('petcare::trainer.edit')->with('trainer',$trainer)->with('skills',$skills);

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
      $trainer=Trainer::find($id);
      $request->validate([
        'name'=>'required |max:100',
        'email'=>'required | email |max:100 |unique:users,email,'.$trainer->user->id,
        'phone'=>'required |max:15 |min:7',
        'country'=>'required |max:100',
        'state'=>'required |max:100',
        'city'=>'required |max:100',
        'address'=>'required |max:100',
        'postal_code'=>'required |max:100',
        'skills'=>'required |max:100',
        'expirinace'=>'required |max:100',
        'password'=>'nullable|min:6|confirmed |max:100',
        'description'=>'required |max:200',
        'image'=>'nullable |image |mimes:jpg,jpeg,png,svg'
      ]);
      if ($request->file('image')) {
        if ($request->old_image) {
          unlink('public/'.$request->old_image);
        }
        $name_image=$request->file('image')->storePublicly('upload/trainer','public');
        $image=$name_image;
      }
      else{$image=$request->old_image;}

     $trainer=Trainer::find($id);
      $trainer->user->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'type'=>'trainer',
        'country'=>$request->country,
        'state'=>$request->state,
        'city'=>$request->city,
        'address'=>$request->address,
        'password'=>bcrypt($request->password),
      ]);     
      $trainer->update([
        'image'=>$image,
      'user_id'=>$trainer->user->id,
      'zip_code'=>$request->postal_code,
      'skills'=>json_encode($request->skills),
      'year_of_experience'=>$request->expirinace,
      'description'=>$request->description,
      'code'=>$request->code
    ]);
    return redirect()->route('trainer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Trainer::find($id)->delete();
        return redirect()->route('trainer.index');
    }
}
