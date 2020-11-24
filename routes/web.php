<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Routes para la Página Web
|--------------------------------------------------------------------------
*/

Route::prefix('/')->group(function () {

    Route::get('/', 'WebPageController@index');
    
    Route::get('/registrate', 'WebPageController@registrateFamilia');
    Route::get('/mapeofamilias', 'WebPageController@MapeoFamiliasPobreWeb');
    Route::get('/verDatoFamilia', 'WebPageController@MapeoFamiliaDatos_WebPage');    
    Route::get('/requisitos', 'WebPageController@RequisitosFamilia');
    
    Route::get('/ListarProv', 'WebPageController@UbigeoListarProv');
    Route::get('/ListarDist', 'WebPageController@UbigeoListarDist');
    

    Route::post('/RegistrarRepresFamilia', 'WebPageController@RegistrarRepresentanteFamilia');


});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Routes del Administrador
|--------------------------------------------------------------------------
*/

Route::prefix('/administrador')->group(function () {

    Route::get('/', 'AdminController@Admin_Login');
    Route::post('/AdminValidarLogin', 'AdminController@Admin_ValidarLogin');
    Route::get('/AdminControl', 'AdminController@Admin_Control');
    Route::get('/AdminCerrarSession', 'AdminController@Admin_CerrarSession');

    Route::get('/AdminMiPerfil/{idUsuario}', 'AdminController@Admin_MiPerfil');

    Route::get('/Menu_Inicio', 'AdminMenuController@Admin_MenuInicio');
    Route::get('/Menu_Listar','AdminMenuController@Admin_MenuListar');
    Route::get('/Menu_Formulario','AdminMenuController@Admin_MenuFormulario');
    Route::post('/Menu_Registrar','AdminMenuController@Admin_MenuRegistrar');
    Route::post('/Menu_Eliminar','AdminMenuController@Admin_MenuEliminar');

    Route::get('/Menu_SubMenuNivel01Inicio','AdminMenuController@Admin_MenuSubMenuNivel01Inicio');
    Route::get('/Menu_SubMenuNivel01Listar','AdminMenuController@Admin_MenuSubMenuNivel01Listar');
    Route::get('/Menu_SubMenuNivel01Formulario','AdminMenuController@Admin_MenuSubMenuNivel01Formulario');
    Route::post('/Menu_SubMenuNivel01Registrar','AdminMenuController@Admin_MenuSubMenuNivel01Registrar');
    Route::post('/Menu_SubMenuNivel01Eliminar','AdminMenuController@Admin_MenuSubMenuNivel01Eliminar');

    Route::get('/Menu_SubMenuNivel02Inicio','AdminMenuController@Admin_MenuSubMenuNivel02Inicio');
    Route::get('/Menu_SubMenuNivel02Listar','AdminMenuController@Admin_MenuSubMenuNivel02Listar');
    Route::get('/Menu_SubMenuNivel02Formulario','AdminMenuController@Admin_MenuSubMenuNivel02Formulario');
    Route::post('/Menu_SubMenuNivel02Registrar','AdminMenuController@Admin_MenuSubMenuNivel02Registrar');
    Route::post('/Menu_SubMenuNivel02Eliminar','AdminMenuController@Admin_MenuSubMenuNivel02Eliminar');

    Route::get('/Rol_Inicio', 'AdminRolController@Admin_RolInicio');
    Route::get('/Rol_Listar','AdminRolController@Admin_RolListar');
    Route::get('/Rol_Formulario','AdminRolController@Admin_RolFormulario');
    Route::post('/Rol_Registrar','AdminRolController@Admin_RolRegistrar');
    Route::post('/Rol_Eliminar','AdminRolController@Admin_RolEliminar');

    Route::get('/Rol_PermisosFormulario','AdminRolController@Admin_RolPermisosFormulario');
    Route::post('/Rol_PermisosRegistrar','AdminRolController@Admin_RolPermisosRegistrar');

    Route::get('/Usuario_Inicio', 'AdminUsuarioController@Admin_UsuarioInicio');
    Route::get('/Usuario_Listar','AdminUsuarioController@Admin_UsuarioListar');
    Route::get('/Usuario_Formulario','AdminUsuarioController@Admin_UsuarioFormulario');
    Route::post('/Usuario_Registrar','AdminUsuarioController@Admin_UsuarioRegistrar');
    Route::post('/Usuario_Eliminar','AdminUsuarioController@Admin_UsuarioEliminar');

    Route::get('/Personal_Inicio', 'AdminPersonalController@Admin_PersonalInicio');
    Route::get('/Personal_Listar','AdminPersonalController@Admin_PersonalListar');
    Route::get('/Personal_Formulario','AdminPersonalController@Admin_PersonalFormulario');
    Route::post('/Personal_Registrar','AdminPersonalController@Admin_PersonalRegistrar');
    Route::post('/Personal_Eliminar','AdminPersonalController@Admin_PersonalEliminar');

    Route::get('/Maestras_ListarProvincias','AdminTBLMaestrasController@Admin_MaestrasListarProvincias');
    Route::get('/Maestras_ListarDistritos','AdminTBLMaestrasController@Admin_MaestrasListarDistritos');


    Route::get('/Familia_Inicio', 'AdminFamiliaController@Admin_FamiliaInicio');
    Route::get('/Familia_Listar','AdminFamiliaController@Admin_FamiliaListar');
    Route::get('/Familia_Formulario','AdminFamiliaController@Admin_FamiliaFormulario');
    Route::post('/Familia_Registrar','AdminFamiliaController@Admin_FamiliaRegistrar');
    Route::post('/Familia_Eliminar','AdminFamiliaController@Admin_FamiliaEliminar');

    Route::get('/MapeoFamilia_Inicio', 'AdminFamiliaController@Admin_MapeoFamiliaInicio');
    Route::get('/MapeoFamilia_Datos','AdminFamiliaController@Admin_MapeoFamiliaDatos');
    


});


