<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use DB;

class dev extends Controller
{   
    //all data  or home page 
    public function home(){
        $db = DB::table('pdf')->get();
        return view("pages.home",['datas' => $db]);
    }
    //download action
    public function download($id){
        $pdf_file = DB::table('pdf')->where('id',$id)->first()->pdf_file_name;
        return Storage::download('public/pdfs/'.$pdf_file);
    }

    // adding form
    public function add_page(){
        return view("pages.add");
    }

    // adding action
    public function add(Request $request){
        // validate
        $validated = $request->validate([
            'name' => 'required|unique:pdf,name',// name have to be uniqe in the table->column(name)
            'file' => 'required|mimes:pdf',
        ]);
        // request from forms
        $name = $request->name;
        $pdf_file = $request->file('file');// get file
        $pdf_extension = $request->file('file')->extension();// get file extension       
        //store the pdf to public/pdfs directory
        Storage::putFileAs("public/pdfs" ,$pdf_file, "$name.$pdf_extension" );
        // store name and file name into database table
        DB::table("pdf")->insert([
            "name" => $name,
            "pdf_file_name" => "$name.$pdf_extension"
        ]);
        // and redirect to home page with a flash massage
        return redirect('/')->with('massage',"new pdf file added successfully");

    }

    // editing form
    public function edit_page($id){
        $db = DB::table('pdf')->where('id',$id)->first();
        return view("pages.edit",['data'=>$db]);
    }

    //update action
    public function update(Request $request){ // validate
        $validated = $request->validate([
            'name' => 'required|unique:pdf,name,'.$request->id.',id', //unique:table,column,except,idColumn
            // validating name --> if same name exist send massage but ingnor the current id name
            'file' => 'mimes:pdf',
        ]);      
        // request from forms
        $name = $request->name; // name given
        $pdf_file = $request->file('file');
        $db = DB::table('pdf')->where("id",$request->id)->first(); 
        if ($pdf_file == null) {//if no pdf file given           
            if($db->name == $name){//if name given and match previous name
                // and redirect to / route with success massage
                return redirect('/')->with('massage',"pdf file updated successfully");
            }//if current and previous name dont match
            //update storage pdf file name                                            
            Storage::move("public/pdfs/$db->pdf_file_name","public/pdfs/$name".".pdf");            
            //update new name in database
            DB::table("pdf")->where("id",$request->id)->update([
            "name" => $name,
            "pdf_file_name" => "$name.pdf"            
        ]); 
            // and redirect to / route with success massage
            return redirect('/')->with('massage',"pdf file updated successfully");
        }//if pdf file give
        // take extension
        $pdf_extension = $request->file('file')->extension();
        // delete previous stored pdf file from public/pdf directory 
        Storage::delete("public/pdfs/$db->pdf_file_name");
        //store the new pdf to public/pdfs directory
        Storage::putFileAs("public/pdfs" ,$pdf_file, "$name.$pdf_extension" );
        //update new name and file name into database table
        DB::table("pdf")->where("id",$request->id)->update([
            "name" => $name,
            "pdf_file_name" => "$name.$pdf_extension"
        ]);
        // and redirect to / route with success massage
        return redirect('/')->with('massage',"pdf file updated successfully");

    }

    //delete action
    public function delete($id){
        //get the file name from database through id
        $pdf_file_name = DB::table('pdf')->where('id',$id)->first()->pdf_file_name;
        // delete name and pdf_file_name from database
        DB::table('pdf')->where('id',$id)->delete();
        //now delete file from storage
        Storage::delete("public/pdfs/$pdf_file_name");
        // and redirect to / route with success massage
        return redirect('/')->with('massage',"pdf file deleted successfully");
        
    }
}

