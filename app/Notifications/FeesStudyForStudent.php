<?php

namespace App\Notifications;

use App\Models\Fee_invoice;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class FeesStudyForStudent extends Notification
{
    use Queueable;

    private  $Fee_invoice;

    public function __construct(Fee_invoice $Fee_invoice)
    {
        //
        $this->Fee_invoice = $Fee_invoice;
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
            'id' => $this->Fee_invoice->id,
            'title' =>   'تم اضافة رسوم دراسية جديدة للطالب:' . $this->Fee_invoice->student->name,
            'Fees' => 'قيمة الرسوم الدراسية:' . number_format($this->Fee_invoice->amount, 2),
            'url' => route('FeesInvoices.index', $this->Fee_invoice->id),
            'user' => Auth::user()->name,
            'date' => date("Y-m-d H:i:s"),
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id' => $this->Fee_invoice->id,
            'title' =>   'تم اضافة رسوم دراسية جديدة للطالب:' . $this->Fee_invoice->student->name,
            'Fees' => 'قيمة الرسوم الدراسية:' . number_format($this->Fee_invoice->amount, 2),
            'url' => route('FeesInvoices.index', $this->Fee_invoice->id),
            'user' => Auth::user()->name,
            'date' => date("Y-m-d H:i:s"),
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
