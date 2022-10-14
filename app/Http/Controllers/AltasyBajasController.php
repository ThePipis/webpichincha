<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAltayBajasRequest;
use App\Http\Requests\UpdateAltayBajasRequest;
use App\Models\AltasyBaja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\AltasyBajasExport;
use App\Imports\AltasyBajasImport;
use Maatwebsite\Excel\Facades\Excel;

class AltasyBajasController extends Controller
{

    public function index(Request $request)
    {
     /*    $busqueda = $request->s; */
            $altasybajas = AltasyBaja::orderBy('id','DESC')->where([
            ['servername', '!=', Null],
            [function ($query) use ($request) {
                if (($s = $request->s)) {
                    $query->orWhere('status', 'LIKE', '%' . $s . '%')
                        ->orWhere('servername', 'LIKE', '%' . $s . '%')
                        ->orWhere('ticket', 'LIKE', '%' . $s . '%')
                        ->orWhere('created_by', 'LIKE', '%' . $s . '%')
                        ->orWhere('created_at', 'LIKE', '%' . $s . '%')
                        ->orWhere('ipaddress', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(4);

      /*   $altasybajas=AltasyBaja::where('servername','LIKE','%'.$busqueda.'%')
                                ->orWhere('ticket','LIKE','%'.$busqueda.'%')
                                ->latest('created_at')
                                ->paginate(4); */
        /* $data = [
            'altasybajas'=>$altasybajas,
            'busqueda'=>$busqueda,
        ];*/
        return view('altasybajas.index',compact('altasybajas'));
     /*    ->with('i', ($request->input('page', 1) - 1) * 4); */
    }


    public function create()
    {
        $this->authorize('registrar-altasybajas');
        return view('altasybajas.create');
    }


    public function store(StoreAltayBajasRequest $request)
    {
        $this->authorize('registrar-altasybajas');
        AltasyBaja::create($request->validated());
        return redirect()->route('altasybajas.index');
    }

    public function show(AltasyBaja $altasybaja)
    {
         $this->authorize('registrar-altasybajas');
         return view('altasybajas.show',compact('altasybaja'));
    }

    public function edit(AltasyBaja $altasybaja)
    {
        $this->authorize('registrar-altasybajas');
        return view('altasybajas.edit',compact('altasybaja'));
    }

    public function update(UpdateAltayBajasRequest $request, AltasyBaja $altasybaja)
    {
        $this->authorize('registrar-altasybajas');
        $altasybaja->update($request->validated());
        return redirect()->route('altasybajas.index');
    }

    public function destroy(AltasyBaja $altasybaja)
    {
        $this->authorize('delete-altasybajas');
        $altasybaja->delete();
        return redirect()->route('altasybajas.index');
    }

    public function export()
    {
        $this->authorize('registrar-altasybajas');
        return Excel::download(new AltasyBajasExport, 'AltasyBajas.xlsx');
    }

    public function import()
    {


        $this->authorize('registrar-altasybajas');
      /*   Excel::import(new AltasyBajasImport,request()->file('file')); */
  /*       Excel::import(new AltasyBajasImport,$request->file); */
       /*  Excel::import(new AltasyBajasImport,request()->file('file')); */
        Excel::import(new AltasyBajasImport,request()->file('file'));
        return redirect()->route('altasybajas.index')->with('success', 'Import Altas y Bajas Successfully!');
       /*  return redirect('/')->with('success', 'All good!'); */
    }


}
