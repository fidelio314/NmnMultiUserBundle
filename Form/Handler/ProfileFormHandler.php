<?php

namespace Nmn\MultiUserBundle\Form\Handler;

use FOS\UserBundle\Form\Handler\ProfileFormHandler as BaseProfileFormHandler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Model\UserManagerInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Mailer\MailerInterface;
use Nmn\MultiUserBundle\Manager\UserDiscriminator;
use Symfony\Component\Form\FormInterface;

class ProfileFormHandler extends BaseProfileFormHandler
{    
    protected $userDiscriminator;

    public function __construct(FormInterface $form, Request $request, UserManagerInterface $userManager, UserDiscriminator $userDiscriminator)
    {
        $this->userDiscriminator = $userDiscriminator;
        $form = $userDiscriminator->getProfileForm();
                
        parent::__construct($form, $request, $userManager);
    }
    
}