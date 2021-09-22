<?php
namespace App\Controller;
use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="app_registration")
     */
    public function registration(Request $request, EntityManagerInterface  $em, 
        UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $form  = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
  
        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user,$user->getPassword());
            $user->setPassword($hash);
        //l'objet $em sera affecté automatiquement grâce à l'injection des dépendances de symfony 4  
           $em->persist($user);
           $em->flush();  
           return $this->redirectToRoute('app_login');
        }
       return $this->render('registration/register.html.twig', 
                           ['form' =>$form->createView()]);
    }

/**
 * @Route("/connexion",name="app_login")
 */
    public function login(AuthenticationUtils  $authenticationUtils)
    {
         // get the login error if there is one
    $error = $authenticationUtils->getLastAuthenticationError();

    // last username entered by the user
    $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render('security/login.html.twig',['lastUsername'=>$lastUsername,
                                                        'error' => $error]);
    }

/**
 * @Route("/deconnexion",name="app_logout")
 */
public function logout()
{
    throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
}

}
