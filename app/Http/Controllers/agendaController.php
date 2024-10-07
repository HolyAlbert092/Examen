<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contacto;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Exception;
use App\Exports\ContactosExport;
use Maatwebsite\Excel\Facades\Excel;

class agendaController extends Controller
{
    public function get()
    {
    	$agenda = contacto::all();
    	return view('index',['agenda' => $agenda]);
    }

    public function create()
    {
    	return view('formulario');
    }

    public function datosGPS(Request $request,$aux)
    {

    	$userAgent = $request->header('User-Agent');
    	$referer =$request->header('Referer');
    	$addrss = $request->colony.' '.$request->pc.', '.$request->city.', '.$request->state.', Mexico';
    	$peticion = Http::withHeaders(['User-Agent'=> $userAgent,'Referer'=>$referer])->get('https://nominatim.openstreetmap.org/search?format=json&limit=10&q='.$addrss);
    		$data = $peticion->json();
    	if($aux == 0)
    	{
    		try
    		{	
    			$lat = $data[0]['lat'];
    			$long = $data[0]['lon'];
    			return view('formulario',['request'=>$request->all(),'lat'=>$lat,'long'=>$long]);
    		}
    		catch(Exception $e)
    		{
    			return redirect()->route('form')->with('mensaje','Error al generar informacion gps');
    		}
    	
    	}
    		
    	else if($aux == 1)
    	{
    		try
    		{
    			
    			$lat = $data[0]['lat'];
    			$long = $data[0]['lon'];
    			return view('editForm',['info'=>$request->all(),'lat'=>$lat,'long'=>$long]);
    		}
    		
    		catch(Exception $e)
    		{
    			return redirect()->route('info',['id' => $request->id])->with('mensaje','Error');
    		}	
    					
    	}
    	
    	
    	
    	
    }

    public function guardar(Request $request)
    {
    	try
    	{
    		$register = contacto::create(
           	[ 'name' => $request->name,
        	  'address' => $request->street,
        	  'number' => $request->number,
        	  'pc' => $request->pc,
       		  'colony' => $request->colony,
        	  'city' => $request->city,
        	  'state'=> $request->state ,
        	  'phone' => $request->phone,
        	  'email' => $request->email,
        	  'lat' => $request->latitud,
        	  'long' =>$request->longitud]);

    	return redirect()->route('home')->with('mensaje','Success');
    	}

    	catch(Exception $e)
    	{
    		return redirect()->route('form')->with('mensaje','Error');
    	}
    }

    public function info($id)
    {
    	try
    	{
    		$info = contacto::findOrFail($id);
    		return view('editForm',['info' => $info]);
    	}
    	catch(Exception $e)
    	{
    		return redirect()->route('home')->with('mensaje','Error');
    	}
    }

    public function actualizar(Request $request,$id)
    {
    	try
    	{
    		$info = contacto::findOrFail($id);
    		$info->update([
    		  'name' => $request->name,
        	  'address' => $request->address,
        	  'number' => $request->number,
        	  'pc' => $request->pc,
       		  'colony' => $request->colony,
        	  'city' => $request->city,
        	  'state'=> $request->state ,
        	  'phone' => $request->phone,
        	  'email' => $request->email,
        	  'lat' => $request->latitud,
        	  'long' =>$request->longitud
    		]);
    		
    		return redirect()->route('home')->with('mensaje','Success');
    	}
    	catch(Exception $e)
    	{
    		return redirect()->route('home')->with('mensaje','Error');
    	}
    }

     public function delete($id)
    {
    	try
    	{
    		$info = contacto::destroy($id);
    		return redirect()->route('home')->with('mensaje','Success');
    	}
    	catch(Exception $e)
    	{
    		return redirect()->route('home')->with('mensaje','Error');
    	}
    }

    public function descargar()
    {
    	  return Excel::download(new ContactosExport, 'contactos.csv');
    }
	    	
    	
    
    
}
