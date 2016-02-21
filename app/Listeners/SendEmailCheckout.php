<?php

namespace CodeCommerce\Listeners;

use CodeCommerce\Events\CheckoutEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailCheckout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckoutEvent $event
     * @return void
     */
    public function handle(CheckoutEvent $event)
    {
        //echo 'Evento disparado!';


        $user = $event->getUser();

        $order = $event->getOrder();

        Mail::send('emails.order', compact('user', 'order'), function ($message) use ($order, $user) {

            $message->from('contato@codecommerce.dev', 'CodeCommerce');
            $message->to($user->email, $user->name);
            $message->subject('Pedido#' . $order->id . ' | CodeCommerce');

        });
    }
}
