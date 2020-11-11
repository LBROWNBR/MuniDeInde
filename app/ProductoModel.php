<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;

class ProductoModel extends Model
{

    public static function ListarProductosNovedad (){

        $Resultado = DB::select('SELECT p.cod_product,p.name,pr.price,pr.descuentos,p.stock,por.NOM_FOTO_PORTP,por.NOM_FOTO_PORTS FROM productos p
        LEFT JOIN productos_precios pr ON (pr.cod_product=p.cod_product)
        LEFT JOIN t_productos_fotos_portada por ON (p.cod_product=por.COD_PRODUCT)
        WHERE p.novedad = 1 AND p.eliminado =0 LIMIT 0,8 ');

        return $Resultado;

    }



    public static function ListarProductoGeneral(){
        $Resultado = DB::select ('SELECT p.cod_product,p.name,pr.price,pr.descuentos,p.stock,p.long_description,pr.descuentos,por.NOM_FOTO_PORTP,por.NOM_FOTO_PORTS FROM productos p
        LEFT JOIN productos_precios pr ON (pr.cod_product=p.cod_product)
        LEFT JOIN t_productos_fotos_portada por ON (p.cod_product=por.COD_PRODUCT)
        WHERE p.eliminado =0 LIMIT 0,8 ');

        return $Resultado;
    }

    public static function ListarProductoBanner () {

        $Resultado = DB::select("SELECT * FROM productos WHERE banner = 1 and cod_product in ('000477','001160','001361','001535')");

        return $Resultado;
    }

    public static function ProductoDetalle($arrayCampos = []){

            $Resultado = DB::selectOne("
                SELECT
                p.cod_product,
                p.name,
                p.num_foto,
                p.tmp_codigo_fabricante,
                p.long_description,
                p.especificaciones,
                pc.price,
                pc.tipo_cambio,
                m.nombre,
                p.stock,
                cp.name AS namecate,
                cp.cod AS codcate,
                pc.descuentos
                FROM productos p
                LEFT JOIN productos_precios pc ON (pc.cod_product = p.cod_product)
                LEFT JOIN categorias_de_producto cp ON (cp.cod = p.cod_categoria)
                LEFT JOIN marcas m ON (m.id = p.cod_marca)
                WHERE p.eliminado=0 AND p.cod_product = :cod_product
            ", $arrayCampos);
            return $Resultado;
    }

    public static function ListarComentariosxProducto($arrayCampos = []){
        $Resultado = DB::select ("SELECT COMENTARIO,NOMBRECOMENTO, DATE(FECHACOMENTARIO) AS FECHA,IDPRODUCTO FROM t_productos_comentarios WHERE ESTADO = '0' AND IDPRODUCTO = :IDPRODUCTO  ", $arrayCampos);
        return $Resultado;
    }

    public static function ListarFotoDetallexProducto($arrayCampos = []){
        $Resultado = DB::select ("SELECT * FROM t_productos_fotos_detalle WHERE ID_ESTADO = '1' AND COD_PRODUCT = :COD_PRODUCT  ", $arrayCampos);
        return $Resultado;
    } 

    public static function CaracteristicasProducto($arrayCampos = []){

        $Resultado = DB::select("
        SELECT
        cabecera,
        detalle,
        id_producto
        FROM atributos_de_producto
        WHERE id_producto = :id_producto
        AND eliminado='1'
        ", $arrayCampos);

        return $Resultado;

    }

    public static function ListaProductoRelacionado($arrayCampos = []){

        $Resultado = DB::select("
        SELECT p.cod_product,p.name,pr.price,pr.descuentos,p.stock FROM productos p
        LEFT JOIN productos_precios pr ON (pr.cod_product=p.cod_product)
        WHERE p.eliminado = 0 AND p.cod_categoria = :cod_categoria ", $arrayCampos);

        return $Resultado;

    }
}
