<?php

namespace App\Http\Controllers\Auth;

use Socialite;
use Auth;
use App\Models\User;
use App\Models\Oauth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OauthController extends Controller
{
  public function redirectToProvider($id, Oauth $oauthModul)
  {
      return $oauthModul->getUsedSocial($id);

  }

  /**
   * Возвращает информацию из соц сети.
   *
   * @return Response
   */
   public function handleProviderCallback($id, Oauth $oauthModul)
   {
    $socialite = $oauthModul->getSocialCallback($id);
    $filter_oauth = $oauthModul->getFilterSocialite($socialite, $id);
    //dd($filter_oauth);
    $oauthModul->getCreateUserOrAddSocial($filter_oauth);
    return redirect('home');


      // dd($socialite = Socialite::with(Config('auth.socialite.'.$id))->user());
/**       $socialite = Socialite::with(Config('auth.socialite.'.$id))->user();
       $user = User::whereEmail($socialite->getEmail())->first();

       if(!$user){
           $user = new User;
           $user->email = ($socialite->getEmail() != null)?$socialite->getEmail():'';
           $user->name = ($socialite->getName() != null)?$socialite->getName():'';
           $user->avatar = ($socialite->getAvatar() != null)?$socialite->getAvatar():'';
           $user->save();
       }

       Auth::loginUsingId($user->id);
       return redirect()->route('recept.index');
       **/
  }
}
