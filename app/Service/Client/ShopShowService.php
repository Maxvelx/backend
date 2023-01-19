<?php

namespace App\Service\Client;

use App\Http\Resources\API\client\Brands\BrandsResource;
use App\Http\Resources\API\client\Category\CategoryResource;
use App\Http\Resources\API\client\PartsShopResource;
use App\Models\BrandAuto;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ShopShowService
{

    private $partsID;
    private $tagsID;
    private $tagsArray;


    /**
     * @param $brand
     * @param $data
     *
     */
    public function filter($brand, $data)
    {
        $parts = BrandAuto::find($brand->id)
            ->parts()
            ->active()
            ->categoryFilter($data)
            ->tagsFilter($data)
            ->sortPriceAsc($data)
            ->sortPriceDesc($data)
            ->newest($data)
            ->paginate(12, ['*'], 'page', $data['page']);

        $partsForCategory = BrandAuto::find($brand->id)
            ->parts()
            ->active()
            ->categoryFilter($data)
            ->tagsFilter($data)
            ->get();

        if ( count($partsForCategory) < 1) {
            return response(status: 204);
        }

        $tags = $this->getTagsFromParts($partsForCategory);

        $categories = $this->getCategoryFromParts($partsForCategory);

        return $this->ResultFilters($parts, $brand, $categories, $tags);
    }

    public function getCategoryFromParts($parts)
    {
        foreach ($parts as $part) {
            $this->partsID[] = $part->category_id;
        }
        $count = array_count_values($this->partsID);

        $categories = Category::whereIn('id', $this->partsID)->get();

        foreach ($count as $key => $item) {
            foreach ($categories as $category) {
                if ($category->id === $key) {
                    $category['count'] = $item;
                }
            }
        }

        return $categories;
    }

    public function getTagsFromParts($parts)
    {
        $tags = [];
        foreach ($parts as $part) {
            if (count($part->tags) > 0) {
                $this->tagsArray[] = $part->tags;
            }
        }
        if ($this->tagsArray) {
            foreach ($this->tagsArray as $tagsArr) {
                foreach ($tagsArr as $tag) {
                    $this->tagsID[] = $tag->id;
                }
            }

            $count = array_count_values($this->tagsID);

            $tags = Tag::whereIn('id', $this->tagsID)->get();

            foreach ($count as $key => $item) {
                foreach ($tags as $tag) {
                    if ($tag->id === $key) {
                        $tag['count'] = $item;
                    }
                }
            }
        }

        return $tags;
    }

    public function ResultFilters($parts, $brand, $categories, $tags)
    {
        return PartsShopResource::collection($parts)->additional([
            'brand'      => new BrandsResource($brand),
            'categories' => CategoryResource::collection($categories),
            'tags'       => $tags,
        ]);
    }
}