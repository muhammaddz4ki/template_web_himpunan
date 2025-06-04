<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class ResetPasswordNotification extends BaseResetPassword
{
    /**
     * Build the mail message.
     *
     * @param  string  $url
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Notifikasi Reset Kata Sandi'))
            ->line(Lang::get('Anda menerima email ini karena kami menerima permintaan reset kata sandi untuk akun Anda.'))
            ->action(Lang::get('Reset Kata Sandi'), $url)
            ->line(Lang::get('Tautan reset kata sandi ini akan kedaluwarsa dalam :count menit.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
            ->line(Lang::get('Jika Anda tidak meminta reset kata sandi, abaikan email ini.'));
    }
}
