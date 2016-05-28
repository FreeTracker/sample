<?php

namespace App\Models;
use Socialite;
use App\Models\User;
use App\Models\Session;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Oauth extends Model
{
    public function getUsedSocial($id)
    {
        if(Config('auth.socialite.'.$id) != null)
        {
            return Socialite::with(Config('auth.socialite.'.$id))->redirect();
        } else
        {
          return redirect()->route('recept.index');
        }
    }

    public function getSocialCallback($id)
    {
        return Socialite::with(Config('auth.socialite.'.$id))->user();
    }

    public function getFilterSocialite($socialite, $id)
    {

        if($id == 'vk'){
            $user = array(
                'id'      => $socialite['uid'],
                'social'  => Config('auth.socialite.'.$id),
                'name'    => $socialite['first_name']." ".$socialite['last_name'],
                'email'   => $socialite['email'],
                'sex'     => $socialite['sex'],
                'date'    => isset($socialite['bdate'])?date('d.m.Y', strtotime($socialite['bdate'])):null,
                'avatar'  => $socialite['photo']
            );

            return $user;
        } elseif($id == 'ya') {
          if($socialite['sex'] == 'male') $sex = 2; elseif($socialite['sex'] == 'female') $sex = 1; else $sex['sex'] = 0;
            $user = array(
                'id'      => $socialite['id'],
                'social'  => Config('auth.socialite.'.$id),
                'name'    => $socialite['first_name']." ".$socialite['last_name'],
                'email'   => $socialite['default_email'],
                'sex'     => $sex,
                'date'    => isset($socialite['birthday'])?date('d.m.Y', strtotime($socialite['birthday'])):null,
                'avatar'  => $socialite->getAvatar()
            );
            return $user;
        } elseif($id == 'ok'){
            $user = array(
                'id' => $socialite['uid'],
                'social'  => Config('auth.socialite.'.$id),
                'name'    => $socialite['name'],
                'email'   => '',
                'sex'     => '',
                'date'    => isset($socialite['birthday'])?date('d.m.Y', strtotime($socialite['birthday'])):null,
                'avatar'  => $socialite->getAvatar()
            );
            return $user;
        } else {
            return $socialite;
        }
    }

    public function getCreateUserOrAddSocial($oauth)
    {
        $row_a = DB::table('oauth_users')->where('social_id', $oauth['id'])->where('social_portal', $oauth['social']);
        if(Auth::check()) {
            if($row_a->count() == '0'){
                DB::table('oauth_users')->insert([
                    'user_id'       => Auth::id(),
                    'main'          => 0,
                    'social_portal' => $oauth['social'],
                    'social_id'     => $oauth['id'],
                ]);

            }
        } else {
            if($row_a->count() != '0'){
                $row_b = $row_a->first();
                Auth::loginUsingId($row_b->user_id);
            } else {
                $row_c = DB::table('users')->where('email', $oauth['email'])->count();
                if($row_c == 0){
                  $row_c = new User;
                  $row_c->email = $oauth['email'];
                  $row_c->name = $oauth['name'];
                  $row_c->avatar = $oauth['avatar'];
                  $row_c->save();
                  DB::table('oauth_users')->insert([
                      'user_id'       => $row_c->id,
                      'main'          => 1,
                      'social_portal' => $oauth['social'],
                      'social_id'     => $oauth['id'],
                  ]);
                Auth::loginUsingId($row_c->id);
                }
            }
        }
        return redirect('home');
    }

}
