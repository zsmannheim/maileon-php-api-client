<?php

namespace Maileon\Reports;

use Maileon\Reports\ReportContact;
use Maileon\Xml\AbstractXMLWrapper;

/**
 * This class represents a block containing the timestamp, the contact, and some details.
 *
 * @author Jannik Jochem
 * @author Marcus St&auml;nder | Trusted Mails GmbH |
 * <a href="mailto:marcus.staender@trusted-mails.com">marcus.staender@trusted-mails.com</a>
 */
class Block extends AbstractXMLWrapper
{
    /**
     * @var long
     */
    public $timestamp;

    /**
     * @var ReportContact
     */
    public $contact;

    /**
     * @var long
     */
    public $oldStatus;

    /**
     * @var long
     */
    public $newStatus;

    /**
     * @var String
     */
    public $reason;


    /**
     * @return \em string
     *  containing a human-readable representation of this block
     */
    public function toString()
    {
        return "Block [timestamp=" . $this->timestamp .
        ", contact=" . $this->contact->toString() .
        ", oldstatus=" . $this->oldStatus .
        ", newstatus=" . $this->newStatus .
        ", reason=" . $this->reason . "]";
    }

    /**
     * @return \em csv string
     *  containing a csv pepresentation of this block
     */
    public function toCsvString()
    {
        return "block;" . $this->timestamp .
        ";" . $this->contact->toCsvString() .
        ";" . $this->oldStatus .
        ";" . $this->newStatus .
        ";" . $this->reason;
    }

    /**
     * Initializes this bounce from an XML representation.
     *
     * @param SimpleXMLElement $xmlElement
     *  the XML representation to use
     */
    public function fromXML($xmlElement)
    {
        $this->contact = new ReportContact();
        $this->contact->fromXML($xmlElement->contact);

        if (isset($xmlElement->timestamp)) {
            $this->timestamp = $xmlElement->timestamp;
        }
        if (isset($xmlElement->old_status)) {
            $this->oldStatus = $xmlElement->old_status;
        }
        if (isset($xmlElement->new_status)) {
            $this->newStatus = $xmlElement->new_status;
        }
        if (isset($xmlElement->reason)) {
            $this->reason = $xmlElement->reason;
        }
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
