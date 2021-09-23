<?php

namespace App\Domain\Notification\Service;


use App\Domain\Notification\Dto\User;
use App\Models\User as UserModel;
use Illuminate\Http\Request;

class UserResolverService
{

    public function getApplePaymentUser($request): User
    {
        $user = UserModel::all()->where('adam_id', $request->auto_renew_adam_id);
        return new User($user->id);
    }

}
