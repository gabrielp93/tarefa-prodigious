<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileFormRequest;
use App\User;
use Hash;
use DB;

class UserController extends Controller
{
    
    public function profile(){

        $name = auth()->user()->name;


        return view('admin.profile.index', compact('name'));
    }

    public function profileUpdate(UpdateProfileFormRequest $request){

        $profileData = $request->all();
        

        $profileData['photo_profile'] = auth()->user()->photo_profile; //atribui o mesmo nome que está no banco
        
        if($request->hasFile('photo_profile') && $request->file('photo_profile')->isValid()){
            if(auth()->user()->photo_profile){
                //$fullName = $profileData['photo_profile'];
                $fullName = auth()->user()->photo_profile;
                unlink(storage_path('app/public/users/'.$fullName));
            }else{
                $name = auth()->user()->id."_".kebab_case(auth()->user()->name);

                $extension = $request->file('photo_profile')->extension();
                $fullName = $name.".".$extension; // cria o nome final
            }
            

            
            $profileData['photo_profile'] = $fullName;
            //dd($profileData['photo']);

            $upload = $request->file('photo_profile')->storeAs('users',$fullName); //armazena a foto

            if(!$upload){
                return redirect()->route('profile')->with('fail','Falha ao Atualizar Foto de Perfil!');
            }
        }

        //dd($profileData['photo']);

        //dd($profileData);
        
        $update = auth()->user()->update($profileData);

        if($update){
            return redirect()->route('profile')->with('success','Perfil Atualizado com Sucesso!');
        }else{
            return redirect()->route('profile')->with('fail','Falha ao Atualizar o Perfil!');
        }

    }

    public function changePassword(){

        return view('admin.profile.changepassword');
    }

    public function passwordConfirm(Request $request){
        //dd($request->all());

        $data = $request->all();

        $actualPwd = auth()->user()->password;
        
        
        if($data['pwd1'] && $data['pwd2'] != null){
            if($data['pwd1'] === $data['pwd2']){
                $pwdToCompare = $data['pwd1'];

                if(Hash::check($pwdToCompare, $actualPwd)){
                    //return redirect()->route('changepwd.store')->with('success','Informe a nova senha!'); 
                    return view('admin.profile.changeConfirm');
                }else{
                    return redirect()->back()->with('fail','Senha errada!');
                }

            }else{
                return redirect()->route('profile.changepwd')->with('fail','Senhas informadas diferentes!');  
            }
        }else{
            return redirect()->route('profile.changepwd')->with('fail','Alguma senha não foi informada!'); 
        }
  

    }

    public function passwordStore(Request $request){
        $data = $request->all();

        $actualPwd = auth()->user()->password;

        //dd($actualPwd);
        
        if($data['pwd1'] && $data['pwd2'] != null){
            if($data['pwd1'] === $data['pwd2']){
                $pwdToCompare = $data['pwd1'];

                if(Hash::check($pwdToCompare, $actualPwd)){
                    return redirect()->back()->with('fail','Nova Senha não pode ser igual a atual!');  
                }else{

                    $newPassword = array('password' => bcrypt($pwdToCompare) );

                    $update = auth()->user()->update($newPassword);

                    if($update){
                        return redirect()->back()->with('success','Senha Atualizada!'); 
                    }else{
                        return redirect()->back()->with('fail','Falha ao Atualizar senha!'); 
                    }

                    
                }

            }else{
                return redirect()->back()->with('fail','Senhas informadas diferentes!');  
            }
        }else{
            return redirect()->back()->with('fail','Alguma senha não foi informada!'); 
        }

    }

    public function deleteAccount(){
        DB::table('users')->where('id','=',auth()->user()->id)->delete();

        return view('site.home.index');
    }
}
