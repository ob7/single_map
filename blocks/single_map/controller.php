<?php
namespace Concrete\Package\SingleMap\Block\SingleMap;

use Concrete\Core\Block\BlockController;
use Concrete\Core\File\File;
use Concrete\Core\Page\Page;
use Concrete\Core\Editor\LinkAbstractor;

class Controller extends BlockController
{
    protected $btTable = 'btSingleMap';
    protected $btInterfaceWidth = '800';
    protected $btInterfaceHeight = '600';
    protected $btWrapperClass = 'ccm-ui';
    protected $btDefaultSet = 'multimedia';

    public function getBlockTypeName()
    {
        return t('Single Map');
    }

    public function getBlockTypeDescription()
    {
        return t('Embed a single google map with options');
    }

    public function add()
    {
    }

    public function edit()
    {
        $bf = null;
        if ($this->getFileID() > 0) {
            $bf = $this->getFileObject();
        }
        $this->set('bf', $bf);
		$this->set('content', LinkAbstractor::translateFrom($this->content));
    }

    public function on_start()
    {
        $this->requireAsset('googleMapsAPI');
	  }

    public function view()
    {
    }

    public function save($data)
    {
        $address = $data['addressLine1'] . ', ' . $data['addressLine2'] . ', ' . $data['city'] . ', ' . $data['state'] . ', ' . $data['zip'] . ', ' . $data['country'];
        $addressLocation = $this->geocode($address);
        $data['lat'] = $addressLocation[0];
        $data['lng'] = $addressLocation[1];
        $data['fulladdress'] = $addressLocation[2];
        $data['address'] = $address;

        parent::save($data);
    }


    /**
     * @return int
     */
    public function getFileID()
    {
        return $this->fID;
    }

    /**
     * @return int
     */
    public function getFileObject()
    {
        return File::getByID($this->fID);
    }

    // function to geocode address, it will return false if unable to geocode address
    public function geocode($address){
        // url encode the address
        $address = urlencode($address);
        // google map geocode api url
        $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";
        // get the json response
        $resp_json = file_get_contents($url);
        // decode the json
        $resp = json_decode($resp_json, true);
        // response status will be 'OK', if able to geocode given address 
        if($resp['status']=='OK'){
            // get the important data
            $lati = $resp['results'][0]['geometry']['location']['lat'];
            $longi = $resp['results'][0]['geometry']['location']['lng'];
            $formatted_address = $resp['results'][0]['formatted_address'];
            // verify if data is complete
            if($lati && $longi && $formatted_address){
                // put the data in the array
                $data_arr = array();
                array_push(
                    $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
					      );

				        return $data_arr;

			      }else{
				        return false;
			      }

		    }else{
			      return false;
		    }
	  }

}
