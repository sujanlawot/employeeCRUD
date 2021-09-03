<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['employees']=Employee::paginate(3);  
        $data['i']=1;
        return view('employee.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validation
        $this->validate($request, [
            'firstname' => 'required|min:3|max:10',
            'lastname' => 'required|min:3|max:10',
            'email'=>'required|unique:employee,email',
            'mobilenumber'=>'required|unique:employee,mobilenumber',
            'address'=>'required',  
            'gender'=>'required',
            'image'=>'image'            
        ]);

        //Working with Image
        $file = $request->file('image');
        $errmsg=" ";
        if($file!='')
        {
                //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            
            //Move Uploaded File
            $destinationPath = 'asset/image/employee';
            
            if(!$file->move($destinationPath,$filenametostore))
            {
                $filenametostore='';        
                $errmsg='Unable to upload image';
            }    
        }
        else
        {
                $filenametostore='';        
        }
        
        

         $person=Employee::create([
                'firstname'=> $request->input('firstname'),
                'lastname'=> $request->input('lastname'),
                'email'=>$request->input('email'),
                'mobilenumber'=>$request->input('mobilenumber'),
                'gender'=>$request->input('gender'),
                'image'=>$filenametostore,
                'address'=>$request->input('address')                
            ]);

         return redirect()->route('employee.create')->with("success","Inserted Successfully\n".$errmsg);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['employee']=Employee::find($id);
        return view('employee.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['employee']=Employee::find($id);
        return view('employee.edit',$data);
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
        //Validation
        $this->validate($request, [
            'firstname' => 'required|min:3|max:10',
            'lastname' => 'required|min:3|max:10',
            'address'=>'required',  
            'gender'=>'required',
            'image'=>'image'            
        ]);
         $employee=Employee::find($id);
        
         if($employee->mobilenumber!=$request->input('mobilenumber'))
         {
            $request->validate(['mobilenumber'=>'required|unique:employee,mobilenumber']);
         }
         if($employee->email!=$request->input('email'))
         {
                $request->validate(['email'=>'required|unique:employee,email']);  
         }
        
         $errmsg=' ';
        //Working with Image
        $file = $request->file('image');
        if($file!="")
        {
            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
            
            //Move Uploaded File
            $destinationPath = 'asset/image/employee';
            
            if(!$file->move($destinationPath,$filenametostore))
            {
                $filenametostore='';    
                $errmsg="But Unable to upload image";    
            }    
            else
            {
              if($employee->image!="")
              {
                $usersImage = public_path("asset/image/employee/{$employee->image}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }  
              }
            }
        }
        else
        {
            $filenametostore=$employee->image;
        }
        $employee->firstname= $request->input('firstname');
        $employee->lastname= $request->input('lastname');
        $employee->email=$request->input('email');
        $employee->mobilenumber=$request->input('mobilenumber');
        $employee->gender=$request->input('gender');
        $employee->address=$request->input('address');
        $employee->image=$filenametostore;
        $employee->save();         
         
        return redirect()->route('employee.index')->with("success","Updated Successfully\n".$errmsg);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
              if($employee->image!="")
              {
                $usersImage = public_path("asset/image/employee/{$employee->image}"); // get previous image from folder
                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                    unlink($usersImage);
                }  
              }
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Remove Successfully');
    }
}
