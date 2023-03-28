<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consultant;
use App\Models\Ora;
use App\Models\Programare;

use Illuminate\Support\Facades\DB;

class ProgramareController extends Controller
{
    
    public function getOreJson(Consultant $consultant, $data)
    {
       $myconsultant=Consultant::findOrFail($consultant->id);
       $mydata=$data;
       $ore=DB::table('ore')
      ->whereNotExists(function ($query) use ($myconsultant, $mydata)
       {
        $query->select(DB::raw(1))
        ->from('programari')
        ->whereColumn('programari.ora_id','=', 'ore.id')//whereColumn pt join condition obligatoriu si where simplu pt where
        ->where('programari.consultant_id','=', $myconsultant->id)
        ->where('programari.data','=', $mydata);
    } 
    ) ->get();    //use (&$param)
    

       return json_encode($ore);

       /*DB::table('users')
           ->whereExists(function ($query) {
               $query->select(DB::raw(1))
                     ->from('orders')
                     ->whereColumn('orders.user_id', 'users.id');
           })
           ->get();*/
    }

    //arata view-ul programari_noi
    public function create()
    {
        $consultanti=Consultant::orderBy('nume','asc')->get();
        $ore=Ora::orderBy('ora1','asc')->get();
        return view('programari_nou',['consultanti'=>$consultanti, 'intervale'=>$ore]);
    }

    public function store(Request $request)
    {
       //intai validez sa am toate campurile completate telefonul numeric emailul email si 
       //data sa nu fie sambata sau duminica 
       $myconsultant=Consultant::find($request->consultant);
       $myora=Ora::find($request->ora);
       $mydata=$request->data;
       if ($mydata<date("Y-m-d")) 
       return redirect('create_programare')->with('errorMessage','Eroare data nu poate fi din trecut!');
       $d=date('D',strtotime($mydata));
       //echo $d;
       if (($d=='Sat')||($d=='Sun'))
       return redirect('create_programare')->with('errorMessage','Nu se lucreaza sambata si nici duminica!');
       $ore=DB::table('ore')
      ->where('ore.id','=',$myora->id)
      ->whereNotExists(function ($query) use ($myconsultant, $mydata)
       {
        $query->select(DB::raw(1))
        ->from('programari')
        ->whereColumn('programari.ora_id','=', 'ore.id')//whereColumn pt join condition obligatoriu si where simplu pt where
        ->where('programari.consultant_id','=', $myconsultant->id)
        ->where('programari.data','=', $mydata);
    } 
    ) ->get();
        $x=[];
        if ($ore == $x)
         return redirect('/create_programare')->with('errorMessage','Eroare! Ora nu este libera sau nu exista!');
        
         //sa verific si daca ora nu a inceput deja 

         if ($mydata==date("Y-m-d"))
         {
            $myora1=$ore[0]->ora1;
            $mymin1=$ore[0]->min1;
            $oranow=date("h:i:s");
            if ($myora1.':'.$mymin1.':'.'0' <= $oranow )
            return redirect('/create_programare')->with('errorMessage','Eroare! Ora este anterioara momentului programarii!');
        
         }
         

        $programare=new Programare();
        $programare->nume=$request->nume;
        $programare->email=$request->email;
        $programare->telefon=$request->telefon;
        $programare->data=$request->data;
        $programare->ora_id=$request->ora;//de verificat ca id-ul corespunde cu intervalul selectat in form
        $programare->consultant_id=$request->consultant;
        //$programare->datetimestart=data+ora1 min1 din interval ---- de setat se poate initial sa lasam null
        $programare->save();

        return redirect('/create_programare')->with('successMessage','Am creat programarea cu succes!');
    }
}
