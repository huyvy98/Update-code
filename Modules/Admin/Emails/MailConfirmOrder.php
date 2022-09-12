<?php

namespace Modules\Admin\Emails;

use App\Models\Order;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailConfirmOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var
     */
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $order = Order::query()->where('id', $this->data)->first('user_id');
        $userId = User::query()->where('id', $order->user_id)->first('email');
        return $this->from('huy.vytomosia@gmail.com')
            ->to($userId->email)
            ->view('admin::mails.mailConfirmOrder')
            ->subject('Xác nhận thành công đơn hàng của bạn')
            ->with($this->data);
    }
}
