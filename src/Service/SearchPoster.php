<?php
/**
 * Auteur: Khaled Benharrat
 * Date: 15/07/2020
 */

namespace App\Service;

use App\Entity\Poster;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

//src/Service/SearchPoster.php
class SearchPoster extends AbstractController
{
    /**
     * Service Upload file (jpg, jpeg, png)
     * Finds the last available unique name
     */
    public function removeAssociate(Poster $poster)
    {
        $events = $poster->getEvents();
        $partners = $poster->getPartners();
        $projects = $poster->getProjects();
        $members = $poster->getMembers();
        $entityManager = $this->getDoctrine()->getManager();
        if (!empty($events)) {
            foreach ($events as $event) {
                $entityManager->remove($event);
            }
        }
        if (!empty($partners)) {
            foreach ($partners as $partner) {
                $entityManager->remove($partner);
            }
        }
        if (!empty($projects)) {
            foreach ($projects as $project) {
                $entityManager->remove($project);
            }
        }
        if (!empty($members)) {
            foreach ($members as $member) {
                $entityManager->remove($member);
            }
        }
    }
}
