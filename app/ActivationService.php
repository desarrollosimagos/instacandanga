<?php

namespace App;


use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    protected $resendAfter = 24;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {

        if ($user->activated || !$this->shouldSend($user)) {
            return;
        }

        $token = $this->activationRepo->createActivation($user);

        $link = route('user.activate', $token);
		$telefono =$user->phone;
        //$message = sprintf('http://sms.bva.org.ve/send.php?p=%s&c=%s', $telefono,$token);

        //$page = file_get_contents($message);



        $message = sprintf('Su codigo de verificación es el siguiente: %s  ,Use el siguiente enlace para activar su cuenta: https://mrd.net.ve/user/activation/%s', $token);

        $this->mailer->raw($message, function (Message $m) use ($user) {
            $m->to($user->email)->subject('Correo de Activación.');
        });



    }

    public function activateUser($token)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }

    private function shouldSend($user)
    {
        $activation = $this->activationRepo->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }

}