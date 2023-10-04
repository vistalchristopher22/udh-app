<?php

namespace App\Services;

use App\Models\Document;

final class DocumentProcessService
{
    public static function getProcessCoordinates(Document $document): array
    {
        $serviceCoordinates = [];

        foreach ($document->how_to_complete as $index => $howToComplete) {
            $latLng = json_decode($howToComplete?->office->location);
            $serviceCoordinates[($index + 1) . '. ' . $howToComplete?->office?->name] = [
                'lat' => $latLng->lat,
                'lng' => $latLng->lng,
            ];
        }

        return $serviceCoordinates;
    }
}
