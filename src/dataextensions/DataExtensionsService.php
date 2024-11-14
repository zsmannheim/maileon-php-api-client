<?php

namespace de\xqueue\maileon\api\client\dataextensions;

use de\xqueue\maileon\api\client\AbstractMaileonService;
use de\xqueue\maileon\api\client\json\JSONSerializer;
use de\xqueue\maileon\api\client\MaileonAPIResult;

class DataExtensionsService extends AbstractMaileonService
{
    const MIME_TYPE = "application/vnd.maileon.api+json";

    public function getDataTypes(): MaileonAPIResult
    {
        return $this->get("dataextensions/datatypes", [], self::MIME_TYPE);
    }

    //TODO currently returns 403 Status code
    // with user has no privileges for requested method as resultXml
    public function deleteDataExtensionById(string $dataExtensionId)
    {
        $queryParameters = [
            'id' => $dataExtensionId
        ];

        return $this->delete('dataextensions/', $queryParameters);
    }

    public function getDataExtensionById(string $dataExtensionId)
    {
        return $this->get("dataextensions/" . $dataExtensionId, [], self::MIME_TYPE);
    }

    public function createDataExtension($dataExtension)
    {
        return $this->post('dataextensions', JSONSerializer::json_encode($dataExtension), [], self::MIME_TYPE);
    }

    public function updateDataExtension($dataExtensionId, $dataExtension)
    {
        return $this->put("dataextensions/" . $dataExtensionId, JSONSerializer::json_encode($dataExtension), [], self::MIME_TYPE);
    }

    public function manageRecords($dataExtensionId, $record, $importOption)
    {
        $queryParameters = [
            'importOption' => $importOption,
        ];

        return $this->post("dataextensions/" . $dataExtensionId, JSONSerializer::json_encode($record), $queryParameters, self::MIME_TYPE);
    }
}