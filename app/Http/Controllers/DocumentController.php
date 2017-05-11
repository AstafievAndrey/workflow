<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Category;
use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('document.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('document.create',[ "categories"=> \App\Models\Category::all() ]);
    }
    
    /**
    * 
    *
    * @return array
    */
    private function messages()
    {
        return [
            'name.required' => 'Заполните название поля',
            'description.required'  => 'Дайте описание документа',
            'document.required'  => 'Прикрепите файл',
            'document.mimes'  => 'Не верный формат файла. Выберите верный файл',
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'document' => 'required|file|mimes:pdf,doc,docx',
            'categories'=>'required|array|min:1',
            'categories.*'=>'required|string|distinct',
        ], $this->messages());
        
        if ($validator->fails()) {
            return redirect('documents/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $document = new Document;
        $document->name = $request->name;
        $document->description = $request->description;
        $document->filepath = $request->document->store('documents','public');
        $document->data = $request->document;
        $document->save();
        $document->categories()->attach($request->categories);
        return redirect('documents/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }
}
