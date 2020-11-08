<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('test');
    }
    public function prev()
    {
      $style = array(
          'border' => 2,
          'vpadding' => 'auto',
          'hpadding' => 'auto',
          'fgcolor' => array(0,0,0),
          'bgcolor' => false, //array(255,255,255)
          'module_width' => 1, // width of a single module in points
          'module_height' => 1 // height of a single module in points
      );

      PDF::SetTitle('Hello World');
      PDF::AddPage();
      PDF::Write(0, 'Hello World');
      PDF::Text(20, 85, 'QRCODE M');
      PDF::write2DBarcode('www.tcpdf.org', 'QRCODE,M', 20, 90, 50, 50, $style, 'N');
      $html = "<h1>Hello World!</h1>";
      PDF::writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
      // PDF::Output('hello_world.pdf','D')
      // return response()->file();
      PDF::Output();
      // PDF::Output('hello_world.pdf','I');
      // return Response::make(base64_decode( PDF::Output('hello_world.pdf','D') ), 200, [
      //     'Content-Type' => 'application/pdf',
      //     'Content-Disposition' => 'inline; filename="'.$filename.'"',
      // ]);
      // return response()->file();
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
}
