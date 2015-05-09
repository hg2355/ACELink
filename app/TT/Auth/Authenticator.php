<?php namespace TT\Auth;

use Sentry;
use Session;

class Authenticator
{
    public static function login(array $credentials, $listener)
    {
        $email = $credentials['email'];
        $password = $credentials['password'];

        try
        {
            $user = Sentry::findUserByCredentials($credentials,false);
            
            $userType = Session::get('user_type');

            if( strcmp($userType,'admin') === 0&& ! $user->isAdmin() )
            {
                $listener->setMsg('messages.not_admin');
                return false;
            }

            else if( strcmp($userType,'teacher') === 0&& ! $user->isTeacher() )
            {
                $listener->setMsg('messages.not_teacher');
                return false;
            }

            else if( strcmp($userType,'parent') === 0 && ! $user->isParent() )
            {
                $listener->setMsg('messages.not_parent');
                return false;
            }

            Sentry::login($user,false);

            $listener->setMsg('messages.valid_login',['email'=> $user->email]);
            return true;
        }
        catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
        {
            $listener->setMsg('messages.login_required');
            return false;
        }
        catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
        {
            $listener->setMsg('messages.password_required');
            return false;
        }
        catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
        {
            $listener->setMsg('messages.wrong_password');
            return false;
        }
        catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
        {
            $listener->setMsg('messages.user_not_found');
            return false;
        }
        catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
        {
            $listener->setMsg('messages.user_not_activated');
            return false;
        }
        catch(\Exception $ex)
        {
            \Log::error($ex);

            $listener->setMsg('messages.oops');
            return false;
        }
    }

    public static function auth()
    {
        return Sentry::check();
    }

    public static function logout()
    {
        return Sentry::logout();
    }

    public static function user()
    {
        return Sentry::getUser();
    }

}
