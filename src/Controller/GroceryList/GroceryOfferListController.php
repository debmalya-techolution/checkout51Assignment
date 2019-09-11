<?php


namespace App\Controller\GroceryList;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class GroceryOfferListController extends AbstractController
{
    public $grocery_items;
    public $request;
    const GROCERY_DATA = "https://api.myjson.com/bins/gm1ft";

    public function __construct() {
        $this->grocery_items = file_get_contents(self::GROCERY_DATA);
        $this->request= Request::createFromGlobals();
    }

    /**
     * Give list of grocery items having offers
     *
     * @return Response
     */
    public function offerList()
    {
        $list = json_decode($this->grocery_items);
        $filterType = $this->request->query->get('filter');

        if ($filterType == 'Descending') {
            usort($list->offers, array($this, "cmpDescending"));
        } else {
            usort($list->offers, array($this, "cmpAscending"));
        }
        return $this->render('groceryOfferList/list.html.twig',
                                    [
                                        'items' => $list->offers,
                                        'filterType'=>$filterType
                                    ]
        );
    }

    /**
     * @param $a
     * @param $b
     *
     * @return Array Objects in ascending manner
     */
    private function cmpAscending($a, $b)
    {
        return strcmp($a->cash_back, $b->cash_back);
    }

    /**
     * @param $a
     * @param $b
     *
     * @return Array Objects in descending manner
     */
    private function cmpDescending($a, $b)
    {
        return strcmp($b->cash_back, $a->cash_back);
    }
}