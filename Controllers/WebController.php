<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use File;



//NORMAL CLASS DEFINE AND CONNECTION TO OTHERS

class WebController extends Controller
{
    public function index()
    {
        $users=User::get()->toArray();
        //echo "<pre>";
        //print_r($users);
        //die;
        return view('web',['users'=>$users]);
       // return view('hello');
      
      
    }
    



//INSER INFORMATION IN DATABASE
    
    public function userdata(Request $request)
    {
        $data=$request->all();
        //echo "<pre>";
        //print_r($data);
        //die;
        if(!empty($data))
        {
           $imgname='';
           if($request->hasFile('image'))
            {
               $file=$request->file('image');
               $filename=$file->getClientOriginalName();
               $extension=$file->getClientOriginalExtension();
               $imgname=uniqid().$filename;
               $destinationPath=public_path('/img/');
               $file->move($destinationPath,$imgname);

               
            }
             
            try
            {
                $user=new User();
                $user->name=$data['name'];
                $user->email=$data['email'];
                $user->phone=$data['phone'];
                $user->image=$imgname;
                $user->save();


                //User::create(['NAME'=>$data['name'],'EMAIL'=>$data['email'],'PHONE'=>$data['phone']]);
            }

            catch(\Exception $e)
            {
                $request->session()->flash('alert-danger', $e->getMessage());
                return redirect()->back();

            }

            $message='Data insert successfully!';
            $request->session()->flash('alert-success', $message);
            return redirect()->back();
            
        }
        
        else
   
        {
                 return redirect()->back();
        }
    }





//SEARC TO DATA UPDATE OR DELETE IN DATABASE    
   
public function editusers($ID)
   {
       $userdata=User::where('id',$ID)->first()->toArray();
       return view('editusers',['userdata'=>$userdata]);
   }





//DATA UPDATE TO DATABASE

   public function updateusers(Request $request)
  {
      $data=$request->all();
      if($request->hasFile('image'))
      {
        $oldimage=User::where('id',$data['user_id'])->value('image');
        $fullpath=public_path('/img/').$oldimage;
        File::delete($fullpath);




         $file=$request->file('image');
         $filename=$file->getClientOriginalName();
         $extension=$file->getClientOriginalExtension();
         $imgname=uniqid().$filename;
         $destinationPath=public_path('/img/');
         $file->move($destinationPath,$imgname);

         
      }
      else
      {
         $imgname=User::where('id',$data['user_id'])->value('image');
      }
      
      try
      { 
          User::where('id',$data['user_id'])->update(['name'=>$data['name'],
                                                      'email'=>$data['email'], 
                                                      'phone'=>$data['phone'],
                                                      'image'=>$imgname]);

         $request->session()->flash('alert-success', 'Data Update Succes');
      }
      catch(\Exception $e)
      {
        $request->session()->flash('alert-denger', 'Data Update faild');
      }
      return redirect()->to('/');
  } 




//DATA DELETE TO DATABASE

  public function deleteusers(Request $request,$ID)
  {
      
      try
      { 
          User::where('id',$ID)->delete();

          $request->session()->flash('alert-success', 'Data Delete Succes');
      }
      catch(\Exception $e)
      {
        $request->session()->flash('alert-danger', 'Data Delete faild');
      }
      return redirect()->back();
  } 
       

   
}