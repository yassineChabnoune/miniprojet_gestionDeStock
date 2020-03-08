<?php


namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    protected function buildFailedValidationResponse(Request $request, array $errors)
    {
        return response(["success" => false, "message" => $errors], 401);
    }
    public  function info(Request $request)
    {
        $prod = Produit::all();
        return view('prod', compact("prod"));
    }
    public  function ajoutterP(Request $request)
    {
        $this->validate($request,[
            "nom" =>"required|unique:produits",
            "prix" =>"required",
            "quantite" =>"required",


        ],
            [
                "nom.required" =>"Le champ d'nom du produit  est obligatoire.",
                "nom.unique" =>"Le nom du produit est féja utilisé.",
                "prix.required" =>"Le champ de prix est obligtoire. ",
                "quantite.required" =>"Le champ de l'quantite est obligatoire. ",

            ]
        );
        $nom = $request->input('nom');
        $prix = $request->input('prix');
        $quantite = $request->input('quantite');

        $data=array('nom'=>$nom,'prix'=>$prix,'quantite'=>$quantite );
        DB::table('produits')->insert($data);
        return 1;
    }
    public function ajoutterPinfo(Request $request)
    {
        $prod = Produit::all();
        return view('ajoutterStock',compact('prod'));
    }
    public  function ajoutterS(Request $request)
    {
        $q = $request->input('q');
        $nom = $request->input('nom');
        $quantite = $request->input('quantite');
        $som = $q + $quantite;
       echo "<script> alert('$som');</script>";
        DB::table('produits')
            ->where('nom', $nom)
            ->update(array('quantite' => $som ));
         return redirect('ajoutterStock');;
    }
    }
