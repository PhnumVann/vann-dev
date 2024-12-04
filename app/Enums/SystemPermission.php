<?php

namespace App\Enums;

enum SystemPermission : string
{
    case createCar = 'create_car';
    case viewCar = 'view_car';
    case updateCar = 'update_car';
    case deleteCar = 'delete_car';

    case createRental = 'create_rental';
    case viewRental = 'view_rental';
    case updateRental = 'update_rental';
    case deleteRental = 'delete_rental';

    case createCustomer = 'create_customer';
    case viewCustomer = 'view_customer';
    case updateCustomer = 'update_customer';
    case deleteCustomer = 'delete_customer';

    case createMaintenance = 'create_maintenance';
    case viewMaintenance = 'view_maintenance';
    case updateMaintenance = 'update_maintenance';
    case deleteMaintenance = 'delete_maintenance';
}
