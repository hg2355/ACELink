<?php namespace TT\Auth;

use Sentry;

class Authenticator
{
    public static function login(array $credentials, $listener)
    {
        $email = $credentials['email'];
        $password = $credentials['password'];

        try
        {
            $user = Sentry::getUserProvider()->findByCredentials($credentials);

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

    public static function user($id=null)
    {
        return is_null($id) ? Sentry::getUser() : Sentry::findUserById($id);
    }

}
