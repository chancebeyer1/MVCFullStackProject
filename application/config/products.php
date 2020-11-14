<?php

//These are SKUs used to test if a license key can purchase this SKU family.
//We need one for each SKU family (ex: pc novacare renewal family includes one for each cloud bucket), but not for each individual SKU
$config['validationSKUs'] = [
    'subscription_transfer' => [
        'pc' => '319001STOLS',
        'pc3' => '3190021STOLS',
        'pc5' => '3190031STOLS',
        'server' => '3190011STOLS',
        'be' => '31900471STOLS',
    ],
    'nc_renewal' => [
        'pc' => '610001RPC50OLS',
        'pc3' => '6100021RPC50OLS',
        'pc5' => '6100031RPC50OLS',
        'server' => '6100011RPC100OLS',
        'be' => '61010471RPC100OLS',
        'buf_pc5' => '6100031BUFRPC50OLS',
        'buf_pc10' => '6100081BUFRPC50OLS',
        'buf_server' => '6100011BUFRPC100OLS',
    ],
    'nc_upgrade' => [
        'pc' => '610001RUC50OLS',
        'pc3' => '6100021RUC50OLS',
        'pc5' => '6100031RUC50OLS',
        'server' => '6100011RUC100OLS',
        'be' => '61010471RUC100OLS',
        'buf_pc5' => '6100031BUFRUC50OLS',
        'buf_pc10' => '6100081BUFRUC50OLS',
        'buf_server' => '6100011BUFRUC100OLS',
    ],
    'nc_special_upgrade' => [
        'pc' => '610001RPPC50OLS',
        'pc3' => '6100021RPPC50OLS',
        'pc5' => '6100031RPPC50OLS',
        'server' => '6100011RPPC100OLS',
        'be' => '61010471RPPC100OLS',
        'buf_pc5' => '6100031BUFRPPC50OLS',
        'buf_pc10' => '6100081BUFRPPC50OLS',
        'buf_server' => '6100011BUFRPPC100OLS',
    ]
];

$config['2coProductIds'] = [
    'subscription_transfer' => [
        'pc' => 27040215,
        'pc3' => 27095463,
        'pc5' => 27147067,
        'server' => 27147162,
        'be' => 27147203,
    ],
    'subscription' => [
        'pc' => 26632808,
        'pc3' => 26633214,
        'pc5' => 26633293,
        'server' => 26253335,
        'be' => 26383136,
    ],
    'perpetual' => [
        'pc' => 25982096,
        'pc3' => 26357569,
        'pc5' => 26366963,
        'server' => 27740273,
        'be' => 27740106,
    ],
    'nc_renewal' => [
        'pc' => 27590584,
        'pc3' => 27625646,
        'pc5' => 27625939,
        'server' => 27626178,
        'be' => 27626495,
        'buf_pc5' => 28521424,
        'buf_pc10' => 28597001,
        'buf_server' => 28597583,
    ],
    'nc_upgrade' => [
        'pc' => 27670145,
        'pc3' => 27670368,
        'pc5' => 27670442,
        'server' => 27670514,
        'be' => 27670565,
        'buf_pc5' => 28521713,
        'buf_pc10' => 28597063,
        'buf_server' => 28597638,
    ],
    'nc_special_upgrade' => [
        'pc' => 27701976,
        'pc3' => 27702472,
        'pc5' => 27702733,
        'server' => 27703117,
        'be' => 27703422,
        'buf_pc5' => 28522512,
        'buf_pc10' => 28597110,
        'buf_server' => 28597724,
    ],
    'nc_renewal_3yr' => [
        'pc' => 27752279,
        'pc3' => 27752892,
        'pc5' => 27753387,
        'server' => 27787259,
        'be' => 27788013,
    ],
    'nc_upgrade_3yr' => [
        'pc' => 27752654,
        'pc3' => 27753179,
        'pc5' => 27753620,
        'server' => 27787567,
        'be' => 27788347,
    ],
    'nc_special_upgrade_3yr' => [
        'pc' => 27752495,
        'pc3' => 27753041,
        'pc5' => 27753515,
        'server' => 27787415,
        'be' => 27788209,
    ]
];

$config['new_subscription_pricing']  = [
    'pc'=>[
        '5' => 49.95,
        '50' => 99.95,
        '100' => 169.95,
        '250' => 349.95,
        '500' => 649.95,
        '1000' => 1249.95,
        '2000' => 2449.95,
        '5000' => 6049.95,
    ],
    'pc3'=>[
        '5' => 79.95,
        '50' => 129.95,
        '100' => 199.95,
        '250' => 379.95,
        '500' => 679.95,
        '1000' => 1279.95,
        '2000' => 2479.95,
        '5000' => 6079.95,
    ],
    'pc5'=>[
        '5' => 99.95,
        '50' => 149.95,
        '100' => 219.95,
        '250' => 399.95,
        '500' => 699.95,
        '1000' => 1299.95,
        '2000' => 2499.95,
        '5000' => 6099.95,
    ],
    'server'=>[
        '0' => 199.95,
        '100' => 319.95,
        '250' => 499.95,
        '500' => 799.95,
        '1000' => 1399.95,
        '2000' => 2599.95,
        '5000' => 6199.95,
    ],
    'be'=>[
        '0' => 299.95,
        '100' => 419.95,
        '250' => 599.95,
        '500' => 899.95,
        '1000' => 1499.95,
        '2000' => 2699.95,
        '5000' => 6299.95,
    ],
];

$config['new_perpetual_pricing']  = [
    'pc'=>[
        '0' => 79.95,
        '50' => 139.95,
        '100' => 199.95,
        '250' => 379.95,
        '500' => 679.95,
        '1000' => 1279.95,
        '2000' => 2479.95,
        '5000' => 6079.95,
    ],
    'pc3'=>[
        '0' => 128.95,
        '50' => 188.95,
        '100' => 248.95,
        '250' => 428.95,
        '500' => 728.95,
        '1000' => 1328.95,
        '2000' => 2528.95,
        '5000' => 6128.95,
    ],
    'pc5'=>[
        '0' => 168.95,
        '50' => 228.95,
        '100' => 288.95,
        '250' => 468.95,
        '500' => 768.95,
        '1000' => 1368.95,
        '2000' => 2568.95,
        '5000' => 6168.95,
    ],
    'server'=>[
        '0' => 499.95,
        '100' => 619.95,
        '250' => 799.95,
        '500' => 1099.95,
        '1000' => 1699.95,
        '2000' => 2899.95,
        '5000' => 6499.95,
    ],
    'be'=>[
        '0' => 799.95,
        '100' => 919.95,
        '250' => 1099.95,
        '500' => 1399.95,
        '1000' => 1999.95,
        '2000' => 3199.95,
        '5000' => 6799.95,
    ],
];


$config['cloud_pricing']  = [
    'pc'=>[
        '5' => 49.95,
        '50' => 99.95,
        '100' => 169.95,
        '250' => 349.95,
        '500' => 649.95,
        '1000' => 1249.95,
        '2000' => 2449.95,
        '5000' => 6049.95,
    ],
    'pc3'=>[
        '5' => 79.95,
        '50' => 129.95,
        '100' => 199.95,
        '250' => 379.95,
        '500' => 679.95,
        '1000' => 1279.95,
        '2000' => 2479.95,
        '5000' => 6079.95,
    ],
    'pc5'=>[
        '5' => 99.95,
        '50' => 149.95,
        '100' => 219.95,
        '250' => 399.95,
        '500' => 699.95,
        '1000' => 1299.95,
        '2000' => 2499.95,
        '5000' => 6099.95,
    ],
    'server'=>[
        '100' => 319.95,
        '250' => 499.95,
        '500' => 799.95,
        '1000' => 1399.95,
        '2000' => 2599.95,
        '5000' => 6199.95,
    ],
    'be'=>[
        '100' => 419.95,
        '250' => 599.95,
        '500' => 899.95,
        '1000' => 1499.95,
        '2000' => 2699.95,
        '5000' => 6299.95,
    ],
    'pc_cloud'=>[
        '5' => 0,
        '50' => 50,
        '100' => 120,
        '250' => 300,
        '500' => 600,
        '1000' => 1200,
        '2000' => 2400,
        '5000' => 6000,
    ],
    'pc_cloud_p'=>[
        '0' => 0,
        '50' => 60,
        '100' => 120,
        '250' => 300,
        '500' => 600,
        '1000' => 1200,
        '2000' => 2400,
        '5000' => 6000,
    ],
    'server_cloud'=>[
        '0' => 0,
        '100' => 120,
        '250' => 300,
        '500' => 600,
        '1000' => 1200,
        '2000' => 2400,
        '5000' => 6000,
    ],
];

$config['nc_renewal_pricing']  = [
    'pc'=>[
        '0' => 29.95,
        '50' => 74.98,
        '100' => 134.98,
        '250' => 314.98,
        '500' => 614.98,
        '1000' => 1214.98,
        '2000' => 2414.98,
        '5000' => 6014.98,
    ],
    'pc3'=>[
        '0' => 49.95,
        '50' => 84.98,
        '100' => 144.98,
        '250' => 324.98,
        '500' => 624.98,
        '1000' => 1224.98,
        '2000' => 2424.98,
        '5000' => 6024.98,
    ],
    'pc5'=>[
        '0' => 69.95,
        '50' => 94.98,
        '100' => 154.98,
        '250' => 334.98,
        '500' => 634.98,
        '1000' => 1234.98,
        '2000' => 2434.98,
        '5000' => 6034.98,
    ],
    'server'=>[
        '0' => 124.95,
        '100' => 182.48,
        '250' => 362.48,
        '500' => 662.48,
        '1000' => 1262.48,
        '2000' => 2462.48,
        '5000' => 6062.48,
    ],
    'be'=>[
        '0' => 199.95,
        '100' => 219.98,
        '250' => 399.98,
        '500' => 699.98,
        '1000' => 1299.98,
        '2000' => 2499.98,
        '5000' => 6099.98,
    ],
    'buf_pc5'=>[
        '0' => 29.95,
        '50' => 74.98,
        '100' => 134.98,
        '250' => 314.98,
        '500' => 614.98,
        '1000' => 1214.98,
        '2000' => 2414.98,
        '5000' => 6014.98,
    ],
    'buf_pc10'=>[
        '0' => 49.95,
        '50' => 84.98,
        '100' => 144.98,
        '250' => 324.98,
        '500' => 624.98,
        '1000' => 1224.98,
        '2000' => 2424.98,
        '5000' => 6024.98,
    ],
    'buf_server'=>[
        '0' => 124.95,
        '100' => 182.48,
        '250' => 362.48,
        '500' => 662.48,
        '1000' => 1262.48,
        '2000' => 2462.48,
        '5000' => 6062.48,
    ],
];

$config['nc_3yr_renewal_pricing']  = [
    'pc'=>[
        '0' => 79.95,
        '50' => 201.98,
        '100' => 363.98,
        '250' => 849.98,
        '500' => 1659.98,
        '1000' => 3279.98,
        '2000' => 6519.98,
        '5000' => 16239.98,
    ],
    'pc3'=>[
        '0' => 134.95,
        '50' => 229.48,
        '100' => 391.48,
        '250' => 877.48,
        '500' => 1687.48,
        '1000' => 3307.48,
        '2000' => 6547.48,
        '5000' => 16267.48,
    ],
    'pc5'=>[
        '0' => 187.95,
        '50' => 255.98,
        '100' => 417.98,
        '250' => 903.98,
        '500' => 1713.98,
        '1000' => 3333.98,
        '2000' => 6573.98,
        '5000' => 16293.98,
    ],
    'server'=>[
        '0' => 289.95,
        '100' => 468.98,
        '250' => 954.98,
        '500' => 1764.98,
        '1000' => 3384.98,
        '2000' => 6624.98,
        '5000' => 16344.98,
    ],
    'be'=>[
        '0' => 479.95,
        '100' => 563.98,
        '250' => 1049.98,
        '500' => 1859.98,
        '1000' => 3479.98,
        '2000' => 6719.98,
        '5000' => 16439.98,
    ],
    'buf_pc5'=>[
        '0' => 128.95,
        '50' => 226.48,
        '100' => 388.48,
        '250' => 874.48,
        '500' => 1684.48,
        '1000' => 3304.48,
        '2000' => 6544.48,
        '5000' => 16264.48,
    ],
    'buf_pc10'=>[
        '0' => 134.95,
        '50' => 229.48,
        '100' => 391.48,
        '250' => 877.48,
        '500' => 1687.48,
        '1000' => 3307.48,
        '2000' => 6547.48,
        '5000' => 16267.48,
    ],
    'buf_server'=>[
        '0' => 289.95,
        '100' => 468.98,
        '250' => 954.98,
        '500' => 1764.98,
        '1000' => 3384.98,
        '2000' => 6624.98,
        '5000' => 16344.98,
    ],
];



$config['nc_special_upgrade_pricing']  = [
    'pc'=>[
        '0' => 49.95,
        '50' => 84.98,
        '100' => 144.98,
        '250' => 324.98,
        '500' => 624.98,
        '1000' => 1224.98,
        '2000' => 2424.98,
        '5000' => 6024.98,
    ],
    'pc3'=>[
        '0' => 79.95,
        '50' => 99.98,
        '100' => 159.98,
        '250' => 339.98,
        '500' => 639.98,
        '1000' => 1239.98,
        '2000' => 2439.98,
        '5000' => 6039.98,
    ],
    'pc5'=>[
        '0' => 99.95,
        '50' => 109.98,
        '100' => 169.98,
        '250' => 349.98,
        '500' => 649.98,
        '1000' => 1249.98,
        '2000' => 2449.98,
        '5000' => 6049.98,
    ],
    'server'=>[
        '0' => 249.95,
        '100' => 244.98,
        '250' => 424.98,
        '500' => 724.98,
        '1000' => 1324.98,
        '2000' => 2524.98,
        '5000' => 6124.98,
    ],
    'be'=>[
        '0' => 399.95,
        '100' => 319.98,
        '250' => 499.98,
        '500' => 799.98,
        '1000' => 1399.98,
        '2000' => 2599.98,
        '5000' => 6199.98,
    ],
    'buf_pc5'=>[
        '0' => 49.95,
        '50' => 84.98,
        '100' => 144.98,
        '250' => 324.98,
        '500' => 624.98,
        '1000' => 1224.98,
        '2000' => 2424.98,
        '5000' => 6024.98,
    ],
    'buf_pc10'=>[
        '0' => 79.95,
        '50' => 99.98,
        '100' => 159.98,
        '250' => 339.98,
        '500' => 639.98,
        '1000' => 1239.98,
        '2000' => 2439.98,
        '5000' => 6039.98,
    ],
    'buf_server'=>[
        '0' => 249.95,
        '100' => 244.98,
        '250' => 424.98,
        '500' => 724.98,
        '1000' => 1324.98,
        '2000' => 2524.98,
        '5000' => 6124.98,
    ],
];

$config['nc_3yr_special_upgrade_pricing']  = [
    'pc'=>[
        '0' => 99.95,
        '50' => 211.98,
        '100' => 373.98,
        '250' => 859.98,
        '500' => 1669.98,
        '1000' => 3289.98,
        '2000' => 6529.98,
        '5000' => 16249.98,
    ],
    'pc3'=>[
        '0' => 164.95,
        '50' => 244.48,
        '100' => 406.48,
        '250' => 892.48,
        '500' => 1702.48,
        '1000' => 3322.48,
        '2000' => 6562.48,
        '5000' => 16282.48,
    ],
    'pc5'=>[
        '0' => 217.95,
        '50' => 270.98,
        '100' => 432.98,
        '250' => 918.98,
        '500' => 1728.98,
        '1000' => 3348.98,
        '2000' => 6588.98,
        '5000' => 16308.98,
    ],
    'server'=>[
        '0' => 389.95,
        '100' => 518.98,
        '250' => 1004.98,
        '500' => 1814.98,
        '1000' => 3434.98,
        '2000' => 6674.98,
        '5000' => 16394.98,
    ],
    'be'=>[
        '0' => 679.95,
        '100' => 663.98,
        '250' => 1149.98,
        '500' => 1959.98,
        '1000' => 3579.98,
        '2000' => 6819.98,
        '5000' => 16539.98,
    ],
    'buf_pc5'=>[
        '0' => 148.95,
        '50' => 236.48,
        '100' => 398.48,
        '250' => 884.48,
        '500' => 1694.48,
        '1000' => 3314.48,
        '2000' => 6554.48,
        '5000' => 16274.48,
    ],
    'buf_pc10'=>[
        '0' => 164.95,
        '50' => 244.48,
        '100' => 406.48,
        '250' => 892.48,
        '500' => 1702.48,
        '1000' => 3322.48,
        '2000' => 6562.48,
        '5000' => 16282.48,
    ],
    'buf_server'=>[
        '0' => 389.95,
        '100' => 518.98,
        '250' => 1004.98,
        '500' => 1814.98,
        '1000' => 3434.98,
        '2000' => 6674.98,
        '5000' => 16394.98,
    ],
];
