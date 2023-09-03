<?php

namespace Modules\Petcare\Interfaces;

interface ServiceRepositoryInterface 
{
    public function getAllServices();
    public function getServiceById($ServiceId);
    public function deleteService($ServiceId);
    public function createService(array $ServiceDetails);
    public function updateService($ServiceId, array $newDetails);
    public function getFulfilledServices();
}
