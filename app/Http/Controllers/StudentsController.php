<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use Illuminate\Support\Facades\DB;


class StudentsController extends Controller
{
    public function create(){
        $title ="STUDENT REGISTRATION";
        $url =url('/students');
        $data =compact('url','title');
        return view('create')->with($data);
    }

    // public function store(Request $request){
    //     // echo "<pre>";
    //     // print_r($request->all());
    //     //insert quary
    //     $students =new Students;
    //     $students->Name =$request['Name'];
    //     $students->Email =$request['Email'];
    //     $students->Password =md5($request['Password']);
    //     $students->save();
    //     // echo "student inserted successfully";
    //     return redirect('/students/view');
    // }

    public function store(Request $request){
        
            // insert query
            $name = $request['Name'];
            $email = $request['Email'];
            $password = md5($request['Password']);
        
            DB::insert('INSERT INTO students ("Name", "Email", "Password") VALUES (?, ?, ?)', [$name, $email, $password]);
        
            // echo "student inserted successfully";
            return redirect('/students/view');
        }
        
    // public function view(){
    //     $students = Students::all();
    //     // echo "<pre>";
    //     // print_r($students);
    //     $data =compact('students');
    //     return view('/students-view')->with($data);
    // }

    public function view(){
        $students = DB::select('SELECT * FROM students');
        // $data = compact('students');
        // return view('/students-view')->with($data);
        return view('students-view',['students'=>$students]);

    }
    // public function delete($id){
    //     // echo $id;
    //     // die;
    //     $students =Students::find($id)->delete();
    //     // echo "<pre>";
    //     // print_r($students);
    //     return redirect('students/view');
    // }

    public function delete($id) {
        $students = DB::table('students')->where('id', $id)->delete();
        return redirect('students/view');
    }
    
/*
    public function edit($id){
        $students =Students::find($id);
        if(is_null($students)){
            return redirect('students/view');
        }
        else{
            $title ="UPDATE STUDENT INFO";
            $url =url('/students/update/') ."/". $id;
            $data =compact('students','url','title');
            return view('create')->with($data);
        }
    }

    public function update($id, Request $request){
        $students =Students::find($id);
        $students->Name =$request['Name'];
        $students->Email =$request['Email'];
        $students->save();
        return redirect('/students/view');
    }
*/




    /*
    public function update($id, Request $request) {
         $name = $request['Name'];
         $email = $request['Email'];
         $password =md5($request['Password']);

        $students=DB::select('SELECT * FROM students WHERE id=?',[$id]);
        DB::update('UPDATE students SET Name = ?, Email = ?,Password=?  WHERE id = ?',[  $request->input('Name'), $request->input('Email'), $request->input('Password'),$id]);

        // $query = "UPDATE students SET Name = '$name', Email = '$email', Password = '$password' WHERE id = $id";
        // DB::statement($query);

        return redirect('/students/view');
    }



  
public function update($id, Request $request)
{
    // Fetch student details using raw SQL query
    $student = DB::select('SELECT * FROM students WHERE id = ?', [$id]);

    // Check if student exists
    if (empty($student)) {
        // Handle case when student with given ID is not found
        // For example, you can redirect to a 404 page
        abort(404);
    }

    // Execute raw SQL query to update student's Name, Email, and Password
    DB::update('UPDATE students SET "Name" = ?, "Email" = ?, "Password" = ? WHERE id = ?', [$request->input('Name'), $request->input('Email'), md5($request->input('Password')), $id]);

    // Redirect to the students view page
    return redirect('/students/view');
}

*/

public function edit($id)
{
    $title = "update customer";
    $students = DB::select('SELECT * FROM students WHERE id = ?', [$id]);
    // Check if customer exists
    if (empty($students)) {
        // Handle case when customer with given ID is not found
        // For example, you can redirect to a 404 page
        abort(404);
    }
    $student = $students[0]; // Access the first element of the array
    
    $url = url('/student/update') . "/" . $id;
    $data = compact('student', 'url', 'title');
    return view('create')->with($data);
}

  
  // }
  public function update($id, Request $request)
  {
      // Fetch customer details using raw SQL query
      $student = DB::select('SELECT * FROM students WHERE id = ?', [$id]);
  
      // Check if customer exists
      if (empty($student)) {
          // Handle case when customer with given ID is not found
          // For example, you can redirect to a 404 page
          abort(404);
      }
  
      // Execute raw SQL query to update customer's name and email
      DB::update('UPDATE students SET Name = ?, Email = ?, Password = ? WHERE id = ?', [$request->input('Name'), $request->input('Email'), $request->input('Password'), $id]);

  
      // Redirect to the customer view page
      return redirect('/student/view');
  }
}
