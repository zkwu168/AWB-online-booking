<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'shipment_create',
            ],
            [
                'id'    => 18,
                'title' => 'shipment_edit',
            ],
            [
                'id'    => 19,
                'title' => 'shipment_show',
            ],
            [
                'id'    => 20,
                'title' => 'shipment_delete',
            ],
            [
                'id'    => 21,
                'title' => 'shipment_access',
            ],
            [
                'id'    => 22,
                'title' => 'importer_info_create',
            ],
            [
                'id'    => 23,
                'title' => 'importer_info_edit',
            ],
            [
                'id'    => 24,
                'title' => 'importer_info_show',
            ],
            [
                'id'    => 25,
                'title' => 'importer_info_delete',
            ],
            [
                'id'    => 26,
                'title' => 'importer_info_access',
            ],
            [
                'id'    => 27,
                'title' => 'cargo_create',
            ],
            [
                'id'    => 28,
                'title' => 'cargo_edit',
            ],
            [
                'id'    => 29,
                'title' => 'cargo_show',
            ],
            [
                'id'    => 30,
                'title' => 'cargo_delete',
            ],
            [
                'id'    => 31,
                'title' => 'cargo_access',
            ],
            [
                'id'    => 32,
                'title' => 'team_create',
            ],
            [
                'id'    => 33,
                'title' => 'team_edit',
            ],
            [
                'id'    => 34,
                'title' => 'team_show',
            ],
            [
                'id'    => 35,
                'title' => 'team_delete',
            ],
            [
                'id'    => 36,
                'title' => 'team_access',
            ],
            [
                'id'    => 37,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 38,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 39,
                'title' => 'shipment_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'faq_management_access',
            ],
            [
                'id'    => 41,
                'title' => 'faq_category_create',
            ],
            [
                'id'    => 42,
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => 43,
                'title' => 'faq_category_show',
            ],
            [
                'id'    => 44,
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => 45,
                'title' => 'faq_category_access',
            ],
            [
                'id'    => 46,
                'title' => 'faq_question_create',
            ],
            [
                'id'    => 47,
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => 48,
                'title' => 'faq_question_show',
            ],
            [
                'id'    => 49,
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => 50,
                'title' => 'faq_question_access',
            ],
            [
                'id'    => 51,
                'title' => 'shipment_status_create',
            ],
            [
                'id'    => 52,
                'title' => 'shipment_status_edit',
            ],
            [
                'id'    => 53,
                'title' => 'shipment_status_show',
            ],
            [
                'id'    => 54,
                'title' => 'shipment_status_delete',
            ],
            [
                'id'    => 55,
                'title' => 'shipment_status_access',
            ],
            [
                'id'    => 56,
                'title' => 'country_create',
            ],
            [
                'id'    => 57,
                'title' => 'country_edit',
            ],
            [
                'id'    => 58,
                'title' => 'country_show',
            ],
            [
                'id'    => 59,
                'title' => 'country_delete',
            ],
            [
                'id'    => 60,
                'title' => 'country_access',
            ],
            [
                'id'    => 61,
                'title' => 'payment_create',
            ],
            [
                'id'    => 62,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 63,
                'title' => 'payment_show',
            ],
            [
                'id'    => 64,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 65,
                'title' => 'payment_access',
            ],
            [
                'id'    => 66,
                'title' => 'shipment_tracking_create',
            ],
            [
                'id'    => 67,
                'title' => 'shipment_tracking_edit',
            ],
            [
                'id'    => 68,
                'title' => 'shipment_tracking_show',
            ],
            [
                'id'    => 69,
                'title' => 'shipment_tracking_delete',
            ],
            [
                'id'    => 70,
                'title' => 'shipment_tracking_access',
            ],
            [
                'id'    => 71,
                'title' => 'shipment_pickup_type_create',
            ],
            [
                'id'    => 72,
                'title' => 'shipment_pickup_type_edit',
            ],
            [
                'id'    => 73,
                'title' => 'shipment_pickup_type_show',
            ],
            [
                'id'    => 74,
                'title' => 'shipment_pickup_type_delete',
            ],
            [
                'id'    => 75,
                'title' => 'shipment_pickup_type_access',
            ],
            [
                'id'    => 76,
                'title' => 'content_management_access',
            ],
            [
                'id'    => 77,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 78,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 79,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 80,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 81,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 82,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 83,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 84,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 85,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 86,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 87,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 88,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 89,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 90,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 91,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 92,
                'title' => 'local_service_provider_create',
            ],
            [
                'id'    => 93,
                'title' => 'local_service_provider_edit',
            ],
            [
                'id'    => 94,
                'title' => 'local_service_provider_show',
            ],
            [
                'id'    => 95,
                'title' => 'local_service_provider_delete',
            ],
            [
                'id'    => 96,
                'title' => 'local_service_provider_access',
            ],
            [
                'id'    => 97,
                'title' => 'address_book_create',
            ],
            [
                'id'    => 98,
                'title' => 'address_book_edit',
            ],
            [
                'id'    => 99,
                'title' => 'address_book_show',
            ],
            [
                'id'    => 100,
                'title' => 'address_book_delete',
            ],
            [
                'id'    => 101,
                'title' => 'address_book_access',
            ],
            [
                'id'    => 102,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
