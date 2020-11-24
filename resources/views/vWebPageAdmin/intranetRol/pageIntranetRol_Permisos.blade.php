@php

//echo '<pre>';
//print_r($wData);
//echo '</pre>';

$ObjMenu      = $wData['DataMenu'];
$ObjSubMenuN1 = $wData['DataSubMenuN1'];
$ObjSubMenuN2 = $wData['DataSubMenuN2'];

$ObjRol = $wData['DataRol'];
if($ObjRol){
  $id_rol     = $ObjRol->ID_ROL;
  $nom_rol    = $ObjRol->NOM_ROL;
}else{
  $id_rol     = '';
  $nom_rol    = '';
}


$Array_MenuSub2_x_Rol = array();
$ObjRolMenus = $wData['DataRolMenus'];

foreach ($ObjRolMenus as $xyzMenus_Rol){
    $Array_MenuSub2_x_Rol[]  = $xyzMenus_Rol->ID_MENUSUB02;
}

@endphp

<form>

    <div class="row">

        <div class="col-md-12 col-lg-12">

            <input type="hidden" class="form-control" id="txhCodRol_F" style="width: 60px;" value="{{$id_rol}}" >

            <h3>ROL : "{{$nom_rol}}"</h3>
            <hr style="border-top: 2px solid #3c8dbc;">


            <div style="padding: 0px 0px 0px 0px;" >


                @php
                if($ObjMenu) foreach ($ObjMenu as $Menus):
                    $M_id_menu   = $Menus->ID_MENU;
                    $M_desc_menu = $Menus->DESC_MENU;
                    $M_icono_menu = $Menus->ICONO;
                @endphp

                <div class="btn btn-block btn-social btn-bitbucket">
                  <label style="font-size: 17px;">
                  @php
                    echo $M_icono_menu;
                  @endphp
                  </label>

                  {{$M_desc_menu}}
                </div>

                        @php

                            if($ObjSubMenuN1) foreach ($ObjSubMenuN1 as $MenuSubN1):

                                $N1_id_menu        = $MenuSubN1->ID_MENU;
                                $N1_id_menusub01   = $MenuSubN1->ID_MENUSUB01;
                                $N1_desc_menusub01 = $MenuSubN1->DESC_MENUSUB01;
                                $N1_icono          = $MenuSubN1->ICONO;

                                if($M_id_menu == $N1_id_menu){

                        @endphp



                              <ul class="todo-list ui-sortable">
                                <li>
                                    <div class="card border shadow-none p-3 overflow-hidden font-weight-semibold mb-4 br-3" style="background-color: #71c6b26b; color: #3c3b3b;">
                                        <div class="card-status card-status-left bg-success br-bl-7 br-tl-7"></div>
                                        <div style="font-size: 16px;">@php
                                        echo $N1_icono;
                                        @endphp {{$N1_desc_menusub01}}</div>

                                    </div>
                                </li>
                              </ul>


                              @php

                                    $itemSubMenuN2 = 0;

                                    if($ObjSubMenuN2) foreach ($ObjSubMenuN2 as $MenuSubN2):

                                        $N2_id_menusub01   = $MenuSubN2->ID_MENUSUB01;
                                        $N2_id_menusub02   = $MenuSubN2->ID_MENUSUB02;
                                        $N2_desc_menusub02 = $MenuSubN2->DESC_MENUSUB02;
                                        $N2_icono          = $MenuSubN2->ICONO;

                                        $itemSubMenuN2++;

                                        if($N1_id_menusub01 == $N2_id_menusub01){

                                            $key = array_search($N2_id_menusub02, $Array_MenuSub2_x_Rol); //$key = 0
                                            if (false !== $key){
                                                $checked_submenu2 = 'checked="checked"';
                                            }else{
                                                $checked_submenu2 = '';
                                            }

                                @endphp

                                <div style="padding: 0px 0px 0px 15px; background-color: #F4F4F4;">


                                    <ul style="margin-bottom: 1px; margin-top: 1px; list-style: none; overflow: auto;">
                                      <li>

                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="checkbox_submenu{{$itemSubMenuN2}}" id="checkbox_submenu{{$itemSubMenuN2}}" value="{{$N2_id_menusub02}}" {{$checked_submenu2}} />

                                            <span class="custom-control-label">{{$N2_desc_menusub02}}</span>
                                        </label>

                                      </li>
                                    </ul>

                                </div>

                                @php
                                        }
                                    endforeach;
                                @endphp


                        @php
                                }
                            endforeach;
                        @endphp



                @php
                endforeach;
                @endphp

                <input type="hidden" name="Tot_SubMenu" id="Tot_SubMenu" value="{{$itemSubMenuN2}}">


            </div>




        </div>
    </div>
</form>
