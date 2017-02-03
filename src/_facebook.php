<?php
namespace PMVC\PlugIn\dynamic_ads;

${_INIT_CONFIG}[_CLASS] = __NAMESPACE__.'\facebook';

class facebook
{
    function __invoke($rows)
    {
        $csv = \PMVC\plug('csv');
        $default = $this->getDefault();
        $results = [];
        foreach ($rows as $r) {
            $results[] = \PMVC\arrayReplace(
                $default,
                $r
            );
        }
        return $csv->array_to_csv($results);
    }

    /**
     * @see https://developers.facebook.com/docs/marketing-api/dynamic-product-ads/product-catalog
     * Debug
     *    - https://business.facebook.com/ads/product_feed/debug/
     * google_product_category
     *    - https://support.google.com/merchants/answer/6324436
     *    - https://www.google.com/basepages/producttype/taxonomy-with-ids.en-GB.txt
     */
    public function getDefault()
    {
        return [
            'id'=>null,
            'availability'=>'in stock',
            'condition'=>'new',
            'description'=>null,
            'image_link'=>null,
            'link'=>null,
            'title'=>null,
            'price'=>null,
            'gtin'=>null,
            'mpn'=>null,
            'brand'=>null,
            'google_product_category'=>null
        ];
    }
}
