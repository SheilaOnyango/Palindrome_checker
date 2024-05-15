<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PalindromeController extends AbstractController
{
    #[Route('/palindrome', name: "palindrome" )]
    public function checkPalindrome(Request $request)
    {
        $word = $request->query->get('word');

        if ($this->isPalindrome($word)) {
            $message = "Yes, \"$word\" is a palindrome!";
        } else {
            $message = "No, \"$word\" is not a palindrome.";
        }

       return $this->render('palindrome/index.html.twig', [
            'message' => $message,
        ]);
    }

    private function isPalindrome($word)
{
    
    $word = strtolower($word);

    
    $reversedWord = strrev($word);
    

    return $word === $reversedWord;
}

}
