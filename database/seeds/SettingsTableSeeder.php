<?php

use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SettingsTableSeeder extends Seeder
{
    /**
     * @var array
     */
    protected $settings = [
        [
            'key'                       =>  'store_name',
            'value'                     =>  'Laracart',
        ],
        [
            'key'                       =>  'store_tagline',
            'value'                     =>  'Trasted Online Shop in Bangladesh',
        ],
        [
            'key'                       =>  'store_email',
            'value'                     =>  'info@example.com',
        ],
        [
            'key'                       =>  'store_email_two',
            'value'                     =>  'info@example.com',
        ],
        [
            'key'                       =>  'store_phone_two',
            'value'                     =>  '0123456789',
        ],
        [
            'key'                       =>  'store_phone',
            'value'                     =>  '0123456789',
        ],
        [
            'key'                       =>  'store_address',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'store_address_two',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'mail_from_address',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'mail_from_name',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'mail_host',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'mail_port',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'mail_username',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'mail_password',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'free_shipping_label',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'free_shipping_min_amount',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'free_shipping_enabled',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'local_pickup_label',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'local_pickup_cost',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'local_pickup_enabled',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'cod_label',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'cod_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'cod_enabled',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'ssl_commrz_label',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'ssl_commrz_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'ssl_commrz_store_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'ssl_commrz_store_password',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'ssl_commrz_enabled',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_slider',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_terms_page',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_privacy_page',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_footer_address',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_copyright_text',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_primary_menu',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_category_menu_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_category_menu',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_footer_menu_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_footer_menu',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_facebook_link',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_twitter_link',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_instagram_link',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_linkedin_link',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_google_link',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_youtube_link',
            'value'                     =>  '',
        ],
    ];
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Setting::truncate();

        foreach ($this->settings as $index => $setting)
        {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        // $this->command->info('Inserted '.count($this->settings). ' records');
    }
}
