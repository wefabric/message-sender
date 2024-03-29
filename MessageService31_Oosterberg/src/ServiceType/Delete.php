<?php

declare(strict_types=1);

namespace Wefabric\MessageSender\MessageService31_Oosterberg\ServiceType;

use SoapFault;
use Wefabric\MessageSender\BaseService\BaseService;
use Wefabric\MessageSender\MessageService31_Oosterberg\StructType\CustomInfo;
use Wefabric\MessageSender\MessageService31_Oosterberg\StructType\Message;
use Wefabric\MessageSender\MessageService31_Oosterberg\StructType\MessageRequest;
use Wefabric\MessageSender\MessageService31_Oosterberg\StructType\MessageRequestResponse;
use Wefabric\MessageSender\MessageService31_Oosterberg\StructType\MessageResponse;
use Wefabric\MessageSender\MessageService31_Oosterberg\StructType\Security;
use WsdlToPhp\PackageBase\AbstractSoapClientBase;

/**
 * This class stands for Delete ServiceType
 * @subpackage Services
 */
class Delete extends BaseService
{
	/**
	 * Sets the Security SoapHeader param
	 * @param Security $security
	 * @param string $namespace
	 * @param bool $mustUnderstand
	 * @param ?string $actor
	 * @return Delete
	 *@uses AbstractSoapClientBase::setSoapHeader()
	 */
	public function setSoapHeaderSecurity(Security $security, string $namespace = BaseService::SecurityNS, bool $mustUnderstand = false, ?string $actor = null): self
	{
		return $this->setSoapHeader($namespace, 'Security', $security, $mustUnderstand, $actor);
	}
	/**
     * Sets the CustomInfo SoapHeader param
     * @uses AbstractSoapClientBase::setSoapHeader()
     * @param CustomInfo $customInfo
     * @param string $namespace
     * @param bool $mustUnderstand
     * @param string|null $actor
     * @return Delete
     */
    public function setSoapHeaderCustomInfo(CustomInfo $customInfo, string $namespace = 'https://www.ketenstandaard.nl/WS/MessageService/3.1', bool $mustUnderstand = false, ?string $actor = null): self
    {
        return $this->setSoapHeader($namespace, 'CustomInfo', $customInfo, $mustUnderstand, $actor);
    }
    /**
     * Method to call the operation originally named DeleteMessage
     * Meta information extracted from the WSDL
     * - SOAPHeaderNames: CustomInfo
     * - SOAPHeaderNamespaces: https://www.ketenstandaard.nl/WS/MessageService/3.1
     * - SOAPHeaderTypes: \Wefabric\MessageSender\MessageService31_Oosterberg\StructType\CustomInfo
     * - SOAPHeaders: required
     * @uses AbstractSoapClientBase::getSoapClient()
     * @uses AbstractSoapClientBase::setResult()
     * @uses AbstractSoapClientBase::saveLastError()
     * @param MessageRequest $parameters
     * @return MessageResponse|bool
     */
    public function DeleteMessage(MessageRequest $parameters)
    {
        try {
            $this->setResult($resultDeleteMessage = $this->getSoapClient()->__soapCall('DeleteMessage', [
                $parameters,
            ], [], [], $this->outputHeaders));
        
            return $resultDeleteMessage;
        } catch (SoapFault $soapFault) {
            $this->saveLastError(__METHOD__, $soapFault);
        
            return false;
        }
    }
    /**
     * Returns the result
     * @see AbstractSoapClientBase::getResult()
     * @return MessageResponse
     */
    public function getResult()
    {
	    $result = parent::getResult();
	    $message = null;
	    if($result->MessageResult) {
		    $message = new Message($result->Message->MsgProperties, $result->Message->MsgContent);
	    }
	    return new MessageResponse(true, $message);
	}
}
