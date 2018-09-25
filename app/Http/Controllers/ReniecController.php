<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*del vendor*/
//use Sunra\PhpSimple\HtmlDomParser;

/*propio*/
use App\Sunra\PhpSimple\HtmlDomParser;

class ReniecController extends Controller
{
    //
    public function index(Request $request){

        if(!$request->ajax()){
            //return redirect()->route('index');
            return "fallo";
        }

        $dni=(int)$request->dni;

        $consulta = HtmlDomParser::file_get_html( 'http://aplicaciones007.jne.gob.pe/srop_publico/Consulta/Afiliado/GetNombresCiudadano?DNI='.$dni )->plaintext;

        $partes=explode('|',$consulta);

        $respuesta=[
            "dni"=>(string)$dni,
            "apat"=>$partes[0],
            "amat"=>$partes[1],
            "nombres"=>$partes[2]
        ];

        return response()->json($respuesta);
    }
}
