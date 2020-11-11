<?php

namespace rymportatiles\Http\Controllers; 
use Illuminate\Http\Request;
use Session;
use rymportatiles\Http\Requests;
use rymportatiles\ProductoModel;
use Redirect;

class ProductoController extends Controller
{

  public function Principal(Request $request)
   {

       $xData = array();
       //************* INICIO - EN CASO DE EDITAR  **************//
       //  $arrayCampos = [ 'id'=>$x_codigo ];
       $xData['DataBanner'] = ProductoModel::ListarBanner();
       $xData['DataProducto'] = ProductoModel::ListarProductoNovedad();
       $xData['DataMarca'] = ProductoModel::Listar_Marcas();
       $xData['DataCategoria'] = ProductoModel::Listar_Categorias();
       $xData['DataCambio'] = ProductoModel::Listar_Cambio();


       //************* FIN - EN CASO DE EDITAR  **************//

      // print_r($xData);
       return view('/welcome', ['wData' => $xData]);

   }  

   public function ProductoNovedad(Request $request)
    {

        $xData = array();



        //************* INICIO - EN CASO DE EDITAR  **************//

        //  $arrayCampos = [ 'id'=>$x_codigo ];
        $xData['DataProducto'] = ProductoModel::ListarProductoNovedad();
        $xData['DataMarca'] = ProductoModel::Listar_Marcas();
        $xData['DataCategoria'] = ProductoModel::Listar_Categorias();
        $xData['DataCambio'] = ProductoModel::Listar_Cambio();

        //************* FIN - EN CASO DE EDITAR  **************//


       // print_r($xData);
        return view('/novedad', ['wData' => $xData]);

    }

    public function ProductoGeneral(Request $request)
    {

        $xData = array();



        //************* INICIO - EN CASO DE EDITAR  **************//

        //  $arrayCampos = [ 'id'=>$x_codigo ];
        $xData['DataProductoGeneral'] = ProductoModel::ListarProductoGeneral();
        $xData['DataMarca'] = ProductoModel::Listar_Marcas();
        $xData['DataCategoria'] = ProductoModel::Listar_Categorias();

        //************* FIN - EN CASO DE EDITAR  **************//


       // print_r($xData);
        return view('productos', ['wData' => $xData]);

    }

    public function ProductoOfertas(Request $request)
     {

         $xData = array();



         //************* INICIO - EN CASO DE EDITAR  **************//

         //  $arrayCampos = [ 'id'=>$x_codigo ];
         $xData['DataProductoOferta'] = ProductoModel::ListarProductoOfertas();
         $xData['DataMarca'] = ProductoModel::Listar_Marcas();
         $xData['DataCategoria'] = ProductoModel::Listar_Categorias();
         $xData['DataCambio'] = ProductoModel::Listar_Cambio();

         //************* FIN - EN CASO DE EDITAR  **************//


        // print_r($xData);
         return view('/ofertas', ['wData' => $xData]);

     }

     public function ProductosPromociones(Request $request)
     {

         $xData = array();



         //************* INICIO - EN CASO DE EDITAR  **************//

         //  $arrayCampos = [ 'id'=>$x_codigo ];
         $xData['DataProductoPromocion'] = ProductoModel::ListarProductoPromocion();
         $xData['DataMarca'] = ProductoModel::Listar_Marcas();
         $xData['DataCategoria'] = ProductoModel::Listar_Categorias();
         $xData['DataCambio'] = ProductoModel::Listar_Cambio();

         //************* FIN - EN CASO DE EDITAR  **************//


        // print_r($xData);
         return view('promociones', ['wData' => $xData]);

     }

     


     public function detailcod($idcab){

       $xData  = array();
       $arrayCampos = ['cod_product'=>$idcab];

       $xData['Datoproduct'] = ProductoModel::Listar_Producto_por_CAB($arrayCampos);
       $xData['DataDetalle'] = ProductoModel::Listar_Caracteristicas_Producto_x_id($arrayCampos);
       $xData['DataMarca'] = ProductoModel::Listar_Marcas(); 
       $xData['DataCategoria'] = ProductoModel::Listar_Categorias();
       $xData['DataCambio'] = ProductoModel::Listar_Cambio();

      //return view('/detail');
      return view('/detail', ['wData' => $xData]);

    }

     public function DetailProduc(Request $request){

        $xData = array();
       $xData['DataMarca'] = ProductoModel::Listar_Marcas();
       $xData['DataCategoria'] = ProductoModel::Listar_Categorias();

       return view('/detail', ['wData' => $xData]);
     }

     

     public function ValidaSession(){

        if(session('SessDatoCliente') != '' || session('SessDatoCliente') != NULL){

          $valor = 20;

        }else{
          $valor = 0;
        }

       return $valor;
      
     }



    public function cart(Request $request){


         $xData  = array();
       $xData['DataMarca'] = ProductoModel::Listar_Marcas();
       $xData['DataCategoria'] = ProductoModel::Listar_Categorias();

      //return view('/detail');
      return view('/cart',  ['wData' => $xData]); 
    }

    
    public function addToCart($id){
        $product = ProductoModel::Listar_Producto_por_CAB(['cod_product'=>$id]);
        $xData= ProductoModel::Listar_Cambio();

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        $precionormal = $product->precio_soles;
        //$preciodescu = $product->precio_soles - $caldescu;

        // if cart is empty then this the first product
        if(!$cart) { 
               

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "cod_product" => $product->cod_product,
                        "quantity" => 1,
                        "price" => round($precionormal,2),
                        "nombre" => $product->nombre
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
       

        $cart[$id] = [
            "name" => $product->name,
            "cod_product" => $product->cod_product,
            "quantity" => 1,
            "price" => round($precionormal,2),
            "nombre" => $product->nombre
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }


    public function addToCartDetail($id){
        $product = ProductoModel::Listar_Producto_por_CAB(['cod_product'=>$id]);

        if(!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
         $caldescu = ($product->price * $product->descuentos )/100;
               $preciodescu = $product->price - $caldescu;

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "cod_product" => $product->cod_product,
                        "quantity" => 1,
                        "price" => round($preciodescu * $xData->TIPCAM,2),
                        "nombre" => $product->nombre
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

           // return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "cod_product" => $product->cod_product,
            "quantity" => 1,
            "price" => $product->price,
            "nombre" => $product->nombre
        ];

        session()->put('cart', $cart);

         return redirect()->back()->with('success', 'Product added to cart successfully!'); 
    }



    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }


    public function remove($codigo)
    {
        if($codigo) {

            $cart = session()->get('cart');

            if(isset($cart[$codigo])) {

                unset($cart[$codigo]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }



    //==================================

    public function eConfirm(Request $request){


          $xData  = array();
       $xData['DataMarca'] = ProductoModel::Listar_Marcas();
       $xData['DataCategoria'] = ProductoModel::Listar_Categorias();

      //return view('/detail');
      return view('/confirm',  ['wData' => $xData]);  
    }


    public function Contactenos(Request $request)
   {

       $xData = array();
       //************* INICIO - EN CASO DE EDITAR  **************//
       //  $arrayCampos = [ 'id'=>$x_codigo ]; 
       $xData['DataMarca'] = ProductoModel::Listar_Marcas();
       $xData['DataCategoria'] = ProductoModel::Listar_Categorias();

       //************* FIN - EN CASO DE EDITAR  **************//

      // print_r($xData);
       return view('/contactenos', ['wData' => $xData]);

   }  



    //=================  search =======================


    public function UrlSearch_Producto($NomProducto){

      session()->put('SessSearchProd', $NomProducto);

      return Redirect::to('/ResultSearchProd');
    }


    public function ResultSearch_Producto(){

      $NomProd = session()->get('SessSearchProd');

      $xData = array();
      $xData['DataProductobusq'] = ProductoModel::ListarProductoNovedad_x_Nombre($NomProd);
      $xData['DataMarca'] = ProductoModel::Listar_Marcas();
      $xData['DataCategoria'] = ProductoModel::Listar_Categorias();
      $xData['DataCambio'] = ProductoModel::Listar_Cambio();


      return view('/resultSearch', ['wData' => $xData]);
    }
  

}
