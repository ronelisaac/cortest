<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SopaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        echo $request->name;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function buscar(Request $request)
    {
      $word = 'OIE';
        $soup=$request->soup;   
        $words =array();
        $len = strlen($word)-1;
        $found = 0;
        for($i=0, $rows = count($soup); $i<$rows; $i++) {
            for($j=0, $cols = count($soup[$i]); $j < $cols; $j++) {
                #busca de arriba hacia abajo
                if( $i+$len<$rows ) {
                    $down ="";
                    for($k=0; $k<=$len; $k++) {
                        $down .= $soup[$i+$k][$j];
                    }
                    if($down==$word) {
                        $match = true;
                        $found ++;
                    }
                }
                
                #busca de abajo hacia arriba
                if($i-$len >=0) {
                    $up = "";
                    for($k=0; $k<=$len; $k++){
                        $up .= $soup[$i-$k][$j];
                    }
                    if($up==$word){
                        $match = true;
                        $found ++;
                    }
                }
                
                #busca en diagonal derecha de abajo hacia arrbia 
                if( $i-$len>=0 and $j+$len<$cols ) {
                    $upRight ="";
                    for($k=0; $k<=$len; $k++) {
                        $upRight .= $soup[$i-$k][$j+$k];
                    }
                    if($upRight==$word) {
                        $match = true;
                        $found ++;
                    }
                }
         
                #busca de izquierda a derecha
                if( $j+$len<$cols ){
                    $right ="";
                    for($k=0; $k<=$len; $k++){
                        $right .= $soup[$i][$j+$k];
                    }
                    if($right==$word) {
                        $match = true;
                        $found ++;
                    }
                }

                #busca en la diagonal derecha hacia abajo
                if( $i+$len<$rows and $j+$len<$cols ) {
                    $rightDown ="";
                    for($k=0; $k<=$len; $k++) {
                        $rightDown .= $soup[$i+$k][$j+$k];
                    }
                    if($rightDown==$word) {
                        $match = true;
                        $found ++;
                    }
                }

                #busca hacia la izquierda
                if( $j-$len>=0 ){
                    $left ="";
                    for($k=0; $k<=$len; $k++){
                        $left .= $soup[$i][$j-$k];
                    }
                    if($left==$word){
                        $match = true;
                        $found ++;
                    }
                }

                #busca en la diagonal izquierda hacia abajo
                if( $i+$len<$rows and $j-$len>=0 ){
                    $downLeft ="";
                    for($k=0; $k<=$len; $k++){
                        $downLeft .= $soup[$i+$k][$j-$k];
                    }
                    if($downLeft==$word){
                        $match = true;
                        $found ++;
                    }
                }

                #busca en la diagonal izquierda hacia arriba
                if( $j-$len>=0 and $i-$len>=0 ){
                    $leftUp ="";
                    for($k=0; $k<=$len; $k++){
                        $leftUp .= $soup[$i-$k][$j-$k];
                    }
                    if($leftUp==$word){
                        $match = true;
                        $found ++;
                    }
                }
         
            }
        }
         
        echo $found;
    }

}
