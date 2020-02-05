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
            'key'                       =>  'store_phone',
            'value'                     =>  '0123456789',
        ],
        [
            'key'                       =>  'store_address',
            'value'                     =>  '203 East Kazipara, Mirpur, Dhaka-1216.',
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
        [
            'key'                       =>  'storefront_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_meta_keywords',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'storefront_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_features_1_icon',
            'value'                     =>  'icofont-ui-cart',
        ],
        [
            'key'                       =>  'product_features_1_title',
            'value'                     =>  'FREE SHIPPING & RETURN',
        ],
        [
            'key'                       =>  'product_features_1_subtitle',
            'value'                     =>  'Free shipping on all orders over Tk 999.',
        ],
        [
            'key'                       =>  'product_features_2_icon',
            'value'                     =>  'icofont-money-bag',
        ],
        [
            'key'                       =>  'product_features_2_title',
            'value'                     =>  'MONEY BACK GUARANTEE',
        ],
        [
            'key'                       =>  'product_features_2_subtitle',
            'value'                     =>  '100% money back guarantee',
        ],
        [
            'key'                       =>  'product_features_3_icon',
            'value'                     =>  'icofont-support',
        ],
        [
            'key'                       =>  'product_features_3_title',
            'value'                     =>  'ONLINE SUPPORT 24/7',
        ],
        [
            'key'                       =>  'product_features_3_subtitle',
            'value'                     =>  'Lorem ipsum dolor sit amet.',
        ],
        [
            'key'                       =>  'product_carousel_1_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_1_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_1_enable',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_2_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_2_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_2_enable',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_3_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_3_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_carousel_3_enable',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_image',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_subtitle',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_cta_text',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_cta_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_products_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'featured_product_enable',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'recent_products_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'recent_total_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'enable_recent_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_image_1',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_1_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_1_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_image_2',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_2_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_2_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_image_3',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_3_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_3_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_image_4',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_4_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_1_cta_4_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_image_1',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_1_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_1_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_image_2',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_2_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_2_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_image_3',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_3_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_3_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_image_4',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_4_url',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'banner_section_2_cta_4_open_in',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_tab_1_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_tab_1_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_tab_2_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_tab_2_products',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_tab_3_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'product_tab_3_products',
            'value'                     =>  '',
        ],
                [
            'key'                       =>  'enable_products_tabs',
            'value'                     =>  '',
        ]
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
