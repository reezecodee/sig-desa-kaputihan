<?php

namespace App\Services;

use App\Repositories\LocationRepository;

class LocationService
{
    protected $locationRepository;

    public function __construct(LocationRepository $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    public function store($data) 
    {
        try{
            $coordinates = explode(', ', $data['koordinat']);
            $data['latitude'] = $coordinates[0];
            $data['longitude'] = $coordinates[1];

            $this->locationRepository->store($data);
        }catch(\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    public function getlocations()
    {
        return $this->locationRepository->lists();
    }

    public function delete($id)
    {
        try {
            return $this->locationRepository->destroy($id);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
