<?php

namespace app\service;

use app\repository\HomeRepositoryInterface;

class HomeService implements HomeServiceInterface
{
    /**
     * @var HomeRepositoryInterface
     */
    private $homeRepository;

    public function __construct(HomeRepositoryInterface $homeRepository)
    {
        $this->homeRepository = $homeRepository;
    }
}
