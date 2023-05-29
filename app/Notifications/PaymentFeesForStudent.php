<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Models\ReceiptStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class PaymentFeesForStudent extends Notification
{
    use Queueable;

    private $ReceiptStudent;
    public function __construct(ReceiptStudent $ReceiptStudent)
    {
        //
        $this->ReceiptStudent = $ReceiptStudent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $via = ['database', 'broadcast'];
        if ($notifiable->notify_mail) {
            $via[] = 'mail';
        }
        if ($notifiable->notify_sms) {
            $via[] = 'nexmo';
        }
        return $via;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }


    public function toDataBase($notifiable)
    {
        return [
            'id' => $this->ReceiptStudent->id,
            'title' =>   'تم دفع رسوم دراسية جديدة للطالب :' . $this->ReceiptStudent->student->name,
            'Fees' => 'قيمة القسط المدفوع:' . number_format($this->ReceiptStudent->Debit, 2),
            'url' => route('Invoice_Receipt', $this->ReceiptStudent->id),
            'user' => Auth::user()->name,
            'date' => date("Y-m-d H:i:s"),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id' => $this->ReceiptStudent->id,
            'title' =>   'تم دفع رسوم دراسية جديدة للطالب :' . $this->ReceiptStudent->student->name,
            'Fees' => 'قيمة القسط المدفوع:' . number_format($this->ReceiptStudent->Debit, 2),
            'url' => route('Invoice_Receipt', $this->ReceiptStudent->id),
            'user' => Auth::user()->name,
            'date' => date("Y-m-d H:i:s"),
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
