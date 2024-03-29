<?php

/**
 * Class Sendpulse_Integration_Adminhtml_IntegrationController
 */
class Sendpulse_Integration_Adminhtml_IntegrationController extends Mage_Adminhtml_Controller_Action
{
    public $API_USER_ID = '6db3b0a98394f0c9218d204f69415edf';
    public $API_SECRET = '571bf02fcd780bff4bc848e1c2806b78';
    public $PATH_TO_ATTACH_FILE = '/Applications/MAMP/htdocs/test.local/app/code/local/Sendpulse/Integration/src/';

    /**
     * just for check connection, development mode
     *
     * @return array
     */
    public function connectAction()
    {
        /** @var Sendpulse_Integration_Model_Client $SPApiClient */
        $SPApiClient = Mage::getModel('sendpulseintegration/client', $this->API_USER_ID, $this->API_SECRET);
        $params = $this->getRequest()->getParams();
        // Get Mailing Lists list example
        $response = $SPApiClient->authorization($params['account_email']);
        Mage::app()->getResponse()->setBody($response);
    }


    /**
     * user authorization
     *
     * @return array
     */
    public function authorizationAction()
    {
        /** @var Sendpulse_Integration_Model_Client $SPApiClient */
        $SPApiClient = Mage::getModel('sendpulseintegration/authorization', null);
        $params = $this->getRequest()->getParams();
        // Get Mailing Lists list example
        $response = $SPApiClient->authorization($params['account_email']);
        Mage::app()->getResponse()->setBody(implode(',',json_decode(json_encode($response), True)));
    }


    /**
     * user registration
     *
     * @return array
     */
    public function registrationAction()
    {

    }

    /**
     * export customers
     */
    public function exportAction()
    {
        Mage::app()->getResponse()->setBody(implode(',',json_decode(json_encode(array(1,2,3,4)), True)));
    }

}
