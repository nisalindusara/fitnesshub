<?php

$router->get('/portal/equipment', [EquipmentController::class, 'showEquipmentScreen'], 'manage_equipment');
$router->get('/portal/facility-map', [EquipmentController::class, 'showFacilityMapScreen'], 'view_facility_map');
