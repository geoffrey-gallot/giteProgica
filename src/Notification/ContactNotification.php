<?php

namespace App\Notification;

use Twig\Environment;
use App\Entity\Contact;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

class ContactNotification
{
    private MailerInterface $mailer;
    private Environment $environment;

    public function __construct(MailerInterface $mailer, Environment $environment)
    {
        $this->mailer = $mailer;
        $this->environment = $environment;
    }

    public function notify(Contact $contact)
    {
        $message = (new TemplatedEmail())
            ->from('noreply@server.com')
            ->to('contact@agence.fr')
            ->replyTo($contact->getEmail())
            ->subject("demande de contact")
            ->htmlTemplate('notification/contact.html.twig')
            ->context(['contact' => $contact]);
        $this->mailer->send($message);
    }
}