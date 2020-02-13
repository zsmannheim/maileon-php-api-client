<?php

namespace Maileon\Reports;

use Maileon\Xml\AbstractXMLWrapper;

/**
 * This class represents a unique conversion
 *
 * @author Marcus Beckerle | XQueue GmbH | <a href="mailto:marcus.beckerle@xqueue.com">marcus.beckerle@xqueue.com</a>
 */
class UniqueConversion extends AbstractXMLWrapper
{
    /**
     * @var long
     */
    public $contactId;

    /**
     * @var string
     */
    public $contactEmail;

    /**
     * @var string
     */
    public $contactExternalId;

    /**
     * @var double
     */
    public $revenue;

    /**
     * @var long
     */
    public $countTotal;

    /**
     * @return \em string
     *  containing a human-readable representation of this conversion
     */
    public function toString()
    {

        return "UniqueConversion [" .
        "contactId=" . $this->contactId .
        ", contactEmail=" . $this->contactEmail .
        ", revenue=" . $this->revenue .
        ", countTotal=" . $this->countTotal ."]";
    }

    /**
     * Initializes this conversion from an XML representation.
     *
     * @param SimpleXMLElement $xmlElement
     *  the XML representation to use
     */
    public function fromXML($xmlElement)
    {
        if (isset($xmlElement->contact_id)) {
            $this->contactId = $xmlElement->contact_id;
        }
        if (isset($xmlElement->contact_email)) {
            $this->contactEmail = $xmlElement->contact_email;
        }
        if (isset($xmlElement->revenue)) {
            $this->revenue = $xmlElement->revenue;
        }
        if (isset($xmlElement->count_total)) {
            $this->countTotal = $xmlElement->count_total;
        }
    }

    /**
     * @return \em csv string
     *  containing a csv pepresentation of this conversion
     */
    public function toCsvString()
    {
        return $this->contactId .
        ";" . $this->contactEmail .
        ";" . $this->revenue .
        ";" . $this->countTotal;
    }

    /**
     * For future use, not implemented yet.
     *
     * @return \em SimpleXMLElement
     *  containing the XML serialization of this object
     */
    public function toXML()
    {
        // Not implemented yet.
    }
}
