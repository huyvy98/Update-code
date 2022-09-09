<?php

namespace Modules\User\Emails;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\User\Contracts\Repositories\Mysql\ProductRepository;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $productData;

    /**
     * @param $productData
     */
    public function __construct($productData)
    {
        $this->productData = $productData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('huy.vytomosia@gmail.com')
            ->view('user::mails.mailnotify')
            ->subject('Cảm ơn bạn đã đặt hàng. Vui lòng chờ xác nhận')
            ->with($this->productData);
    }
}
