<?php

namespace App\Service\Client;

use App\Http\Resources\API\client\Brands\BrandsResource;
use App\Http\Resources\API\client\Category\CategoryResource;
use App\Http\Resources\API\client\PartsShopResource;
use App\Models\BrandAuto;
use App\Models\Category;
use App\Models\Tag;

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
            ->with('images')
            ->active()
            ->categoryFilter($data)
            ->tagsFilter($data)
            ->newest($data)
            ->sortPriceAsc($data)
            ->sortPriceDesc($data)
            ->paginate(12, ['*'], 'page', $data['page']);

        $partsForCategory = BrandAuto::find($brand->id)
            ->parts()
            ->active()
            ->categoryFilter($data)
            ->tagsFilter($data)
            ->with('tags')
            ->get();

        if (count($partsForCategory) < 1) {
            $parts      = [];
            $categories = [];
            $tags       = [];

            return $this->ResultFilters($parts, $brand, $categories, $tags);
        }

        $tags = $this->getTagsFromParts($partsForCategory, $brand);

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

    public function getTagsFromParts($parts, $brand)
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

            $tags = Tag::where('model_id', $brand->id)->select('id', 'title', 'model_id')->get();

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