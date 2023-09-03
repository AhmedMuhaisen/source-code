<?php

namespace Modules\Petcare\Repositories;

use Modules\Petcare\Entities\Service;
use Modules\Petcare\Interfaces\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function getAllServices($is_additional = 0)
    {

        return Service::where('is_additional', $is_additional)->get()->all();
    }

    public function getServiceById($serviceId)
    {
        return Service::findOrFail($serviceId);
    }

    public function deleteService($serviceId)
    {
        Service::destroy($serviceId);
    }

    public function createService(array $serviceDetails)
    {
        
        return Service::create($serviceDetails);
    }

    public function updateService($serviceId, array $newDetails)
    {
        return Service::whereId($serviceId)->update($newDetails);
    }

    public function getFulfilledServices()
    {
        return Service::where('is_fulfilled', true);
    }
}
